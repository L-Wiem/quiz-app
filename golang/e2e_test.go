package main

import (
	"net/http"
	"net/http/httptest"
	"strings"
	"testing"

	"github.com/DATA-DOG/go-sqlmock"
	_ "github.com/go-sql-driver/mysql"
)

func TestQuestionsEndpoint(t *testing.T) {
	// Mock the database
	db, mock, err := sqlmock.New()
	if err != nil {
		t.Fatalf("Failed to create mock database: %v", err)
	}
	defer db.Close()

	// Mock database query for category name
	mock.ExpectQuery("SELECT name FROM categories WHERE id = ?").
		WithArgs("1").
		WillReturnRows(sqlmock.NewRows([]string{"name"}).AddRow("General Knowledge"))

	// Mock database query for questions
	mock.ExpectQuery("SELECT id, question_text, correct_answer, options FROM questions WHERE category_id = ?").
		WithArgs("1").
		WillReturnRows(sqlmock.NewRows([]string{"id", "question_text", "correct_answer", "options"}).
			AddRow(1, "What is the capital of France?", "Paris", `["Paris", "Berlin", "Madrid", "Rome"]`).
			AddRow(2, "What is 2+2?", "4", `["3", "4", "5", "6"]`))

	// Create an HTTP request for the /questions endpoint
	req, err := http.NewRequest(http.MethodGet, "/questions?category_id=1", nil)
	if err != nil {
		t.Fatalf("Failed to create HTTP request: %v", err)
	}

	// Record the HTTP response
	rr := httptest.NewRecorder()

	// Call the handler
	handler := questionsHandler(db)
	handler.ServeHTTP(rr, req)

	// Assert the response status code
	if status := rr.Code; status != http.StatusOK {
		t.Errorf("Handler returned wrong status code: got %v want %v", status, http.StatusOK)
	}

	// Assert the response body contains expected HTML
	if !contains(rr.Body.String(), "Questions for") {
		t.Errorf("Expected HTML to contain 'Questions for', got: %s", rr.Body.String())
	}

	// Assert database expectations
	if err := mock.ExpectationsWereMet(); err != nil {
		t.Errorf("There were unmet database expectations: %v", err)
	}
}

// Helper function to check if the string contains a substring
func contains(response string, substring string) bool {
	return strings.Contains(response, substring)
}
