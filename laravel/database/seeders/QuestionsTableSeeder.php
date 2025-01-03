<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Question; // Ensure this line imports the Question model

class QuestionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // questions for Software Engineering
        Question::create([
            'category_id' => 1,
            'question_text' => 'What is the primary goal of software engineering?',
            'options' => ['Develop hardware', 'Build efficient software', 'Enhance computer security', 'Design networks'],
            'correct_answer' => 'Build efficient software',
        ]);

        Question::create([
            'category_id' => 1,
            'question_text' => 'What does SDLC stand for?',
            'options' => ['System Development Lifecycle', 'Software Development Lifecycle', 'System Design Language Code', 'Software Design Lifecycle'],
            'correct_answer' => 'Software Development Lifecycle',
        ]);

        // Questions for Programming Languages
        Question::create([
            'category_id' => 2,
            'question_text' => 'Which programming language is known for its simplicity and readability?',
            'options' => ['C', 'Python', 'Java', 'Ruby'],
            'correct_answer' => 'Python',
        ]);
        Question::create([
            'category_id' => 2,
            'question_text' => 'Which programming language is primarily used for web development?',
            'options' => ['Java', 'Python', 'JavaScript', 'Go'],
            'correct_answer' => 'JavaScript',
        ]);

        // Sample questions for Operating Systems
        Question::create([
            'category_id' => 3,
            'question_text' => 'Which operating system is open source?',
            'options' => ['Windows', 'Linux', 'macOS', 'iOS'],
            'correct_answer' => 'Linux',
        ]);

        // Sample questions for Web Development
        Question::create([
            'category_id' => 4,
            'question_text' => 'Which HTML tag is used to create a hyperlink?',
            'options' => ['<a>', '<link>', '<href>', '<hyper>'],
            'correct_answer' => '<a>',
        ]);

        Question::create([
            'category_id' => 4,
            'question_text' => 'What does CSS stand for?',
            'options' => ['Cascading Style Sheets', 'Computer Styling System', 'Color Styling Sheets', 'Coding Style Script'],
            'correct_answer' => 'Cascading Style Sheets',
        ]);

        // Questions for AI and Machine Learning
        Question::create([
            'category_id' => 5,
            'question_text' => 'What is the primary goal of machine learning?',
            'options' => ['To analyze data', 'To build predictive models', 'To clean data', 'To visualize data'],
            'correct_answer' => 'To build predictive models',
        ]);
        Question::create([
            'category_id' => 5,
            'question_text' => 'What is the primary type of learning used in supervised machine learning?',
            'options' => ['Clustering', 'Classification', 'Reinforcement', 'Dimensionality Reduction'],
            'correct_answer' => 'Classification',
        ]);

        // Questions for Database Systems
        Question::create([
            'category_id' => 6,
            'question_text' => 'What does ACID stand for in database transactions?',
            'options' => ['Atomicity, Consistency, Isolation, Durability', 'Accuracy, Complexity, Integrity, Duration', 'Access, Control, Integration, Data', 'Analysis, Computation, Input, Database'],
            'correct_answer' => 'Atomicity, Consistency, Isolation, Durability',
        ]);

        Question::create([
            'category_id' => 6,
            'question_text' => 'Which SQL command is used to retrieve data?',
            'options' => ['INSERT', 'SELECT', 'DELETE', 'UPDATE'],
            'correct_answer' => 'SELECT',
        ]);
    }
}
