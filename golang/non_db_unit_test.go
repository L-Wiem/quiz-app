package main

import (
	"net/http"
	"net/url"
	"testing"

	"github.com/stretchr/testify/assert"
)

func TestCalculateScore(t *testing.T) {
	correctAnswers := map[string]string{
		"1": "A",
		"2": "B",
		"3": "C",
	}

	form := url.Values{}
	form.Add("answers[1]", "A")
	form.Add("answers[2]", "B")
	form.Add("answers[3]", "C")

	req := &http.Request{Form: form}
	score := calculateScore(req, correctAnswers)

	assert.Equal(t, 3, score)
}
