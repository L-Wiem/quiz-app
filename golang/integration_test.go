package main

import (
	"database/sql"
	"log"
	"math/rand"
	"testing"
	"time"

	_ "github.com/go-sql-driver/mysql"
	"github.com/stretchr/testify/assert"
)

func setupTestDatabase() *sql.DB {
	// Replace with your test database connection
	dsn := "wiem:wiem@tcp(db:3306)/shared_db"
	db, err := sql.Open("mysql", dsn)
	if err != nil {
		log.Fatalf("Failed to connect to test database: %v", err)
	}
	return db
}

func TestFetchCategoriesIntegration(t *testing.T) {
	db := setupTestDatabase()
	defer db.Close()
	randomCategoryNameOne := GenerateRandomString(10)
	randomCategoryNameTwo := GenerateRandomString(10)

	_, err := db.Exec("INSERT INTO categories (name) VALUES (?), (?)", randomCategoryNameOne, randomCategoryNameTwo)
	if err != nil {
		log.Fatalf("Error inserting categories: %v", err)
	}

	catgOne, err := fetchCategoryByName(db, randomCategoryNameOne)
	catgTwo, err := fetchCategoryByName(db, randomCategoryNameTwo)
	assert.NoError(t, err)
	assert.Equal(t, randomCategoryNameOne, catgOne)
	assert.Equal(t, randomCategoryNameTwo, catgTwo)
}

// GenerateRandomString generates a random string of a given length
func GenerateRandomString(length int) string {
	const charset = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789"
	var seededRand = rand.New(rand.NewSource(time.Now().UnixNano()))

	randomString := make([]byte, length)
	for i := range randomString {
		randomString[i] = charset[seededRand.Intn(len(charset))]
	}
	return string(randomString)
}
