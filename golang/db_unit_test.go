package main

import (
	"testing"

	"github.com/DATA-DOG/go-sqlmock"
	"github.com/stretchr/testify/assert"
)

func TestFetchCategories(t *testing.T) {
	db, mock, err := sqlmock.New()
	if err != nil {
		t.Fatalf("unexpected error when creating mock db: %v", err)
	}
	defer db.Close()

	mock.ExpectQuery("SELECT id, name FROM categories").
		WillReturnRows(sqlmock.NewRows([]string{"id", "name"}).
			AddRow(1, "Category 1").
			AddRow(2, "Category 2"))

	categories, err := fetchCategories(db)
	assert.NoError(t, err)
	assert.Len(t, categories, 2)
	assert.Equal(t, "Category 1", categories[0].Name)
	assert.Equal(t, 1, categories[0].ID)
}

func TestFetchCategoryName(t *testing.T) {
	db, mock, err := sqlmock.New()
	if err != nil {
		t.Fatalf("unexpected error when creating mock db: %v", err)
	}
	defer db.Close()

	mock.ExpectQuery("SELECT name FROM categories WHERE id = ?").
		WithArgs("1").
		WillReturnRows(sqlmock.NewRows([]string{"name"}).AddRow("Category 1"))

	categoryName, err := fetchCategoryName(db, "1")
	assert.NoError(t, err)
	assert.Equal(t, "Category 1", categoryName)
}
