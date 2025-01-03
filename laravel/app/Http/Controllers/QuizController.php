<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Question;

class QuizController extends Controller
{
    // Show all categories to the user
    public function showCategories()
    {
        $categories = Category::all();
        $a = $categories->count();
        return view('homepage', compact('categories', 'a'));
    }

    // Show quiz questions for a selected category
    public function startQuiz($categoryId)
    {
        // Get the category using its ID
        $category = Category::findOrFail($categoryId);

        // Fetch questions for the category ( in random order)
        $questions = Question::where('category_id', $category->id)->inRandomOrder()->get();
        return view('quiz.start', compact('category', 'questions'));
    }

    // Check quiz answers and return results
    public function checkAnswers(Request $request)
    {
        $answers = $request->input('answers', []); // User-submitted answers
        $results = [];
        $category_id = $request->input('category_id');

        // Fetch all questions based on the provided question IDs
        $questionIds = array_keys($answers);
        $questions = Question::whereIn('id', $questionIds)->get();

        foreach ($questions as $question) {
            $submittedAnswer = $answers[$question->id] ?? null;

            // Check if the submitted answer is correct
            $results[$question->id] = [
                'is_correct' => $question->correct_answer === $submittedAnswer,
                'submitted_answer' => $submittedAnswer,
            ];
        }

        $points = count(array_filter($results, fn($result) => $result['is_correct'])); // Count correct answers
        $score = $points * 100 / count($answers);

        // Pass results, points, category_id, score, and questions to the view
        return view('quiz.results', compact('results', 'points', 'category_id', 'score', 'questions'));
    }
}

