package main

import (
	"database/sql"
	"encoding/json"
	"fmt"
	"html/template"
	"log"
	"net/http"

	_ "github.com/go-sql-driver/mysql"
)

type Category struct {
	ID   int
	Name string
}

type Option struct {
	QuestionID int
	Name       string
}

type Question struct {
	ID             int
	Question_text  string
	Correct_answer string
	Options        []Option
}

// setup database connection
func setupDatabase() *sql.DB {
	dsn := "wiem:wiem@tcp(db:3306)/shared_db"
	db, err := sql.Open("mysql", dsn)
	if err != nil {
		log.Fatalf("Failed to connect to MySQL: %v", err)
	}
	if err := db.Ping(); err != nil {
		log.Fatalf("Could not establish a connection: %v", err)
	}
	fmt.Println("Successfully connected to the database.")
	return db
}

// Function to serve static files
func serveStaticFiles() {
	http.Handle("/css/", http.StripPrefix("/css/", http.FileServer(http.Dir("templates/css"))))
	http.Handle("/js/", http.StripPrefix("/js/", http.FileServer(http.Dir("templates/js"))))
	http.Handle("/images/", http.StripPrefix("/images/", http.FileServer(http.Dir("templates/images"))))
}

// Fetch categories from the database
func fetchCategories(db *sql.DB) ([]Category, error) {
	rows, err := db.Query("SELECT id, name FROM categories")
	if err != nil {
		return nil, err
	}
	defer rows.Close()

	var categories []Category
	for rows.Next() {
		var category Category
		if err := rows.Scan(&category.ID, &category.Name); err != nil {
			return nil, err
		}
		categories = append(categories, category)
	}
	return categories, nil
}

// Fetch category name by ID
func fetchCategoryName(db *sql.DB, categoryID string) (string, error) {
	var categoryName string
	err := db.QueryRow("SELECT name FROM categories WHERE id = ?", categoryID).Scan(&categoryName)
	if err != nil {
		return "", err
	}
	return categoryName, nil
}

/* // Fetch category name by ID
func fetchCategoryByName(db *sql.DB, name string) (string, error) {
	var categoryName string
	err := db.QueryRow("SELECT name FROM categories WHERE name = ?", name).Scan(&categoryName)
	if err != nil {
		return "", err
	}
	return categoryName, nil
} */

// Fetch questions for a given category
func fetchQuestions(db *sql.DB, categoryID string) ([]Question, error) {
	rows, err := db.Query("SELECT id, question_text, correct_answer, options FROM questions WHERE category_id = ?", categoryID)
	if err != nil {
		return nil, err
	}
	defer rows.Close()

	var questions []Question
	for rows.Next() {
		var question Question
		var optionsJSON string

		if err := rows.Scan(&question.ID, &question.Question_text, &question.Correct_answer, &optionsJSON); err != nil {
			return nil, err
		}

		var decodedOptions []string
		if err := json.Unmarshal([]byte(optionsJSON), &decodedOptions); err != nil {
			return nil, err
		}

		var options []Option
		for _, optionName := range decodedOptions {
			options = append(options, Option{
				QuestionID: question.ID,
				Name:       optionName,
			})
		}

		question.Options = options
		questions = append(questions, question)
	}
	return questions, nil
}

// Fetch correct answers for a given category
func fetchCorrectAnswers(db *sql.DB, categoryID string) (map[string]string, error) {
	correctAnswers := make(map[string]string)

	rows, err := db.Query("SELECT id, correct_answer FROM questions WHERE category_id = ?", categoryID)
	if err != nil {
		return nil, err
	}
	defer rows.Close()

	for rows.Next() {
		var questionID, correctAnswer string
		if err := rows.Scan(&questionID, &correctAnswer); err != nil {
			return nil, err
		}
		correctAnswers[questionID] = correctAnswer
	}
	return correctAnswers, nil
}

// Root endpoint handler
func rootHandler(db *sql.DB) http.HandlerFunc {
	return func(w http.ResponseWriter, r *http.Request) {
		categories, err := fetchCategories(db)
		if err != nil {
			http.Error(w, "Failed to fetch categories", http.StatusInternalServerError)
			log.Printf("Error querying database: %v", err)
			return
		}

		// Data to pass to the template
		data := struct {
			Title      string
			Categories []Category
		}{
			Title:      "Categories List",
			Categories: categories,
		}
		renderTemplate(w, "templates/index.html", data)
	}
}

// Questions endpoint handler
func questionsHandler(db *sql.DB) http.HandlerFunc {
	return func(w http.ResponseWriter, r *http.Request) {
		categoryID := r.URL.Query().Get("category_id")
		if categoryID == "" {
			http.Error(w, "Missing category_id parameter", http.StatusBadRequest)
			return
		}

		categoryName, err := fetchCategoryName(db, categoryID)
		if err != nil {
			http.Error(w, "Category not found", http.StatusNotFound)
			log.Printf("Error fetching category name: %v", err)
			return
		}

		questions, err := fetchQuestions(db, categoryID)
		if err != nil {
			http.Error(w, "Failed to fetch questions", http.StatusInternalServerError)
			log.Printf("Error querying questions: %v", err)
			return
		}

		// Data to pass to the template
		data := struct {
			Title      string
			Questions  []Question
			CategoryID string
		}{
			Title:      "Questions for " + categoryName,
			Questions:  questions,
			CategoryID: categoryID,
		}

		renderTemplate(w, "templates/questions.html", data)
	}
}

// Result endpoint handler
func resultHandler(db *sql.DB) http.HandlerFunc {
	return func(w http.ResponseWriter, r *http.Request) {
		err := r.ParseForm()
		if err != nil {
			http.Error(w, "Unable to parse form", http.StatusBadRequest)
			return
		}

		categoryID := r.FormValue("category_id")
		if categoryID == "" {
			http.Error(w, "Category ID is required", http.StatusBadRequest)
			return
		}

		correctAnswers, err := fetchCorrectAnswers(db, categoryID)
		if err != nil {
			http.Error(w, "Failed to fetch correct answers", http.StatusInternalServerError)
			log.Printf("Error querying database: %v", err)
			return
		}

		score := calculateScore(r, correctAnswers)

		// Data to pass to the template
		data := struct {
			Score      int
			CategoryID string
		}{
			Score:      score,
			CategoryID: categoryID,
		}

		renderTemplate(w, "templates/result.html", data)
	}
}

// Calculate score based on user answers
func calculateScore(r *http.Request, correctAnswers map[string]string) int {
	score := 0
	for questionID, correctAnswer := range correctAnswers {
		userAnswer := r.FormValue(fmt.Sprintf("answers[%s]", questionID))
		if userAnswer == correctAnswer {
			score++
		}
	}
	return score
}

// Render HTML template
func renderTemplate(w http.ResponseWriter, tmpl string, data interface{}) {
	tmplParsed, err := template.ParseFiles(tmpl)
	if err != nil {
		log.Printf("Failed to parse template: %v", err)
		http.Error(w, "Internal server error", http.StatusInternalServerError)
		return
	}

	if err := tmplParsed.Execute(w, data); err != nil {
		http.Error(w, "Could not render template: "+err.Error(), http.StatusInternalServerError)
		log.Printf("Error rendering template: %v", err)
	}
}

// Start the HTTP server
func startServer() {
	port := ":8181"
	fmt.Printf("Starting server on port %s...\n", port)
	if err := http.ListenAndServe(port, nil); err != nil {
		log.Fatalf("Failed to start server: %v", err)
	}
}

func main() {
	// MySQL connection setup
	db := setupDatabase()
	defer db.Close()

	// Serve static files
	serveStaticFiles()

	// Setup HTTP handlers
	http.HandleFunc("/", rootHandler(db))
	http.HandleFunc("/questions", questionsHandler(db))
	http.HandleFunc("/result", resultHandler(db))

	// Start the HTTP server
	startServer()
}
