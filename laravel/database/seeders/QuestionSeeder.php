<?php

namespace Database\Seeders;

use App\Models\Question;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class QuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // questions for Software Engineering
        Question::create([
            'category' => 'Software Engineering',
            'question_text' => 'What is the primary goal of software engineering?',
            'options' => json_encode(['Develop hardware', 'Build efficient software', 'Enhance computer security', 'Design networks']),
            'correct_option' => 'Build efficient software',
        ]);

        Question::create([
            'category' => 'Software Engineering',
            'question_text' => 'What does SDLC stand for?',
            'options' => json_encode(['System Development Lifecycle', 'Software Development Lifecycle', 'System Design Language Code', 'Software Design Lifecycle']),
            'correct_option' => 'Software Development Lifecycle',
        ]);

        // Questions for Programming Languages
        Question::create([
            'category' => 'Programming Languages',
            'question_text' => 'Which programming language is known for its simplicity and readability?',
            'options' => json_encode(['C', 'Python', 'Java', 'Ruby']),
            'correct_option' => 'Python',
        ]);
        Question::create([
            'category' => 'Programming Languages',
            'question_text' => 'Which programming language is primarily used for web development?',
            'options' => json_encode(['Java', 'Python', 'JavaScript', 'Go']),
            'correct_option' => 'JavaScript',
        ]);

        // Sample questions for Operating Systems
        Question::create([
            'category' => 'Operating Systems',
            'question_text' => 'Which operating system is open source?',
            'options' => json_encode(['Windows', 'Linux', 'macOS', 'iOS']),
            'correct_option' => 'Linux',
        ]);

        // Sample questions for Web Development
        Question::create([
            'category' => 'Web Development',
            'question_text' => 'Which HTML tag is used to create a hyperlink?',
            'options' => json_encode(['<a>', '<link>', '<href>', '<hyper>']),
            'correct_option' => '<a>',
        ]);

        Question::create([
            'category' => 'Web Development',
            'question_text' => 'What does CSS stand for?',
            'options' => json_encode(['Cascading Style Sheets', 'Computer Styling System', 'Color Styling Sheets', 'Coding Style Script']),
            'correct_option' => 'Cascading Style Sheets',
        ]);

        // Questions for AI and Machine Learning
        Question::create([
            'category' => 'AI and Machine Learning',
            'question_text' => 'What is the primary goal of machine learning?',
            'options' => json_encode(['To analyze data', 'To build predictive models', 'To clean data', 'To visualize data']),
            'correct_option' => 'To build predictive models',
        ]);
        Question::create([
            'category' => 'AI and Machine Learning',
            'question_text' => 'What is the primary type of learning used in supervised machine learning?',
            'options' => json_encode(['Clustering', 'Classification', 'Reinforcement', 'Dimensionality Reduction']),
            'correct_option' => 'Classification',
        ]);

        // Questions for Database Systems
        Question::create([
            'category' => 'Database Systems',
            'question_text' => 'What does ACID stand for in database transactions?',
            'options' => json_encode(['Atomicity, Consistency, Isolation, Durability', 'Accuracy, Complexity, Integrity, Duration', 'Access, Control, Integration, Data', 'Analysis, Computation, Input, Database']),
            'correct_option' => 'Atomicity, Consistency, Isolation, Durability',
        ]);

        Question::create([
            'category' => 'Database Systems',
            'question_text' => 'Which SQL command is used to retrieve data?',
            'options' => json_encode(['INSERT', 'SELECT', 'DELETE', 'UPDATE']),
            'correct_option' => 'SELECT',
        ]);
    }
}
