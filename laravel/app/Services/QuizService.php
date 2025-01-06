<?php

namespace App\Services;

use App\Models\Category;
use App\Models\Question;

class QuizService
{
    public function fetchCategories()
    {
        // Fetch categories from the database
        return  Category::all();

    }
    public function fetchQuestions($categoryId)
    {
        $category = Category::findOrFail($categoryId);
        $questions = Question::where('category_id', $categoryId)->inRandomOrder()->get();
        return [
            'category' => $category,
            'questions' => $questions,
        ];
    }
    public function calculateScore($answers)
    {
        $results = [];

        $questionIds = array_keys($answers);
        $questions = Question::whereIn('id', $questionIds)->get();

        foreach ($questions as $question) {
            $submittedAnswer = $answers[$question->id] ?? null;

            $results[$question->id] = [
                'is_correct' => $question->correct_answer === $submittedAnswer,
                'submitted_answer' => $submittedAnswer,
            ];
        }

        $points = count(array_filter($results, fn($result) => $result['is_correct']));
        $score = $points * 100 / count($answers);
        return [
            'points' => $points,
            'score' => $score,
            'questions' => $questions,
            'results' => $results,

        ];
    }


}
