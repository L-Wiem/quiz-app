<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\QuizService;

class QuizController extends Controller
{
    // Show all categories to the user
    public function showCategories()
    {
        $quizService = new QuizService();
        $categories = $quizService->fetchCategories();
        return view('homepage', compact('categories'));
    }

    // Show quiz questions for a selected category
    public function startQuiz($categoryId, $error = null)
    {
        $quizService = new QuizService();
        $data = $quizService->fetchQuestions($categoryId);
        $category = $data["category"];
        $questions = $data["questions"];

        return view('quiz.start', compact('category', 'questions', 'error'));
    }

    // Check quiz answers and return results
    public function checkAnswers(Request $request)
    {
        $quizService = new QuizService();
        $answers = $request->input('answers', []); // User-submitted answers
        $category_id = $request->input('category_id');
        if (count($answers) == 0) {
            return $this->startQuiz($category_id, 'You have not answered anything');
        }
        $data = $quizService->calculateScore($answers, $category_id);

        $points = $data["points"];
        $score = $data["score"];
        $results = $data["results"];
        $questions = $data["questions"];


        // Pass results, points, category_id, score, and questions to the view
        return view('quiz.results', compact('results', 'points', 'category_id', 'score', 'questions'));
    }
}

