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
        Question::create([
            'category_id' => 1,
            'question_text' => 'Which methodology focuses on iterative development and customer collaboration?',
            'options' => ['Waterfall', 'Agile', 'Spiral', 'V-Model'],
            'correct_answer' => 'Agile',
        ]);
        Question::create([
            'category_id' => 1,
            'question_text' => 'What is the key principle of modular programming?',
            'options' => ['Write less code', 'Break down tasks into functions', 'Divide a program into independent modules', 'Avoid debugging'],
            'correct_answer' => 'Divide a program into independent modules',
        ]);
        Question::create([
            'category_id' => 1,
            'question_text' => 'What does the term "debugging" refer to in software development?',
            'options' => ['Writing code', 'Testing for errors', 'Optimizing code', 'Finding and fixing errors'],
            'correct_answer' => 'Finding and fixing errors',
        ]);

        Question::create([
            'category_id' => 1,
            'question_text' => 'Which of the following is a benefit of using version control systems like Git?',
            'options' => ['It saves your code automatically', 'It allows collaboration and tracking changes', 'It generates code for you', 'It improves code quality automatically'],
            'correct_answer' => 'It allows collaboration and tracking changes',
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
        Question::create([
            'category_id' => 2,
            'question_text' => 'What is the primary benefit of using TypeScript over JavaScript?',
            'options' => ['Faster execution', 'Improved type safety', 'Better debugging tools', 'More libraries'],
            'correct_answer' => 'Improved type safety',
        ]);
        Question::create([
            'category_id' => 2,
            'question_text' => 'Which programming language was created by James Gosling at Sun Microsystems?',
            'options' => ['C++', 'Java', 'Python', 'Ruby'],
            'correct_answer' => 'Java',
        ]);

        Question::create([
            'category_id' => 2,
            'question_text' => 'Which programming language is primarily used for system-level programming?',
            'options' => ['C', 'Java', 'Go', 'Swift'],
            'correct_answer' => 'C',
        ]);

        Question::create([
            'category_id' => 2,
            'question_text' => 'Which programming language is known for its use in artificial intelligence and data science?',
            'options' => ['C', 'Python', 'Java', 'Ruby'],
            'correct_answer' => 'Python',
        ]);

        // Sample questions for Operating Systems
        Question::create([
            'category_id' => 3,
            'question_text' => 'Which operating system is open source?',
            'options' => ['Windows', 'Linux', 'macOS', 'iOS'],
            'correct_answer' => 'Linux',
        ]);
        Question::create([
            'category_id' => 3,
            'question_text' => 'What is the primary purpose of an operating system?',
            'options' => ['Manage hardware resources', 'Provide internet access', 'Run only one application at a time', 'Compile code'],
            'correct_answer' => 'Manage hardware resources',
        ]);

        Question::create([
            'category_id' => 3,
            'question_text' => 'Which operating system is known for being widely used on servers?',
            'options' => ['Windows 10', 'Ubuntu', 'macOS', 'Android'],
            'correct_answer' => 'Ubuntu',
        ]);

        Question::create([
            'category_id' => 3,
            'question_text' => 'Which operating system is developed and maintained by Apple?',
            'options' => ['Windows', 'macOS', 'Linux', 'Android'],
            'correct_answer' => 'macOS',
        ]);

        Question::create([
            'category_id' => 3,
            'question_text' => 'What is the main function of an operating system kernel?',
            'options' => ['Manage user interface', 'Control hardware and software interaction', 'Handle network requests', 'Compile applications'],
            'correct_answer' => 'Control hardware and software interaction',
        ]);
        Question::create([
            'category_id' => 3,
            'question_text' => 'Which of the following is the main difference between Windows and Linux operating systems?',
            'options' => ['Windows is open-source, Linux is proprietary', 'Linux is open-source, Windows is proprietary', 'Both are open-source', 'Both are proprietary'],
            'correct_answer' => 'Linux is open-source, Windows is proprietary',
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
        Question::create([
           'category_id' => 4,
            'question_text' => 'Which attribute is used in HTML to specify an alternative text for an image?',
            'options' => ['alt', 'src', 'title', 'href'],
            'correct_answer' => 'alt',
        ]);

        Question::create([
           'category_id' => 4,
            'question_text' => 'What is the default HTTP method used in forms?',
            'options' => ['GET', 'POST', 'PUT', 'DELETE'],
            'correct_answer' => 'GET',
        ]);

        Question::create([
           'category_id' => 4,
            'question_text' => 'Which HTTP status code indicates that a page was not found?',
            'options' => ['200', '301', '404', '500'],
            'correct_answer' => '404',
        ]);
        Question::create([
           'category_id' => 4,
            'question_text' => 'Which CSS property is used to change the background color of an element?',
            'options' => ['color', 'background-color', 'bg-color', 'border-color'],
            'correct_answer' => 'background-color',
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
        Question::create([
           'category_id' => 5,
            'question_text' => 'Which algorithm is primarily used for classification tasks in machine learning?',
            'options' => ['K-means', 'Decision Trees', 'K-nearest Neighbors', 'Linear Regression'],
            'correct_answer' => 'Decision Trees',
        ]);

        Question::create([
           'category_id' => 5,
            'question_text' => 'What type of machine learning is used when an algorithm learns from labeled data?',
            'options' => ['Supervised Learning', 'Unsupervised Learning', 'Reinforcement Learning', 'Deep Learning'],
            'correct_answer' => 'Supervised Learning',
        ]);

        Question::create([
           'category_id' => 5,
            'question_text' => 'Which deep learning framework was developed by Google?',
            'options' => ['TensorFlow', 'Keras', 'PyTorch', 'Caffe'],
            'correct_answer' => 'TensorFlow',
        ]);

        Question::create([
           'category_id' => 5,
            'question_text' => 'What is the main advantage of using neural networks in machine learning?',
            'options' => ['Better at handling structured data', 'Ability to learn from unstructured data', 'Faster processing of small datasets', 'Easier to interpret results'],
            'correct_answer' => 'Ability to learn from unstructured data',
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
        Question::create([
           'category_id' => 6,
            'question_text' => 'What is the purpose of database normalization?',
            'options' => ['Optimize indexing', 'Reduce data redundancy', 'Increase query speed', 'Support multiple languages'],
            'correct_answer' => 'Reduce data redundancy',
        ]);
        Question::create([
           'category_id' => 6,
            'question_text' => 'What does the SQL command JOIN do?',
            'options' => ['Combine rows from two or more tables', 'Delete data from a table', 'Insert data into a table', 'Sort data in a table'],
            'correct_answer' => 'Combine rows from two or more tables',
        ]);

        Question::create([
           'category_id' => 6,
            'question_text' => 'What is a foreign key in a relational database?',
            'options' => ['A unique identifier for a record', 'A reference to a primary key in another table', 'A field that stores images', 'A field used for sorting data'],
            'correct_answer' => 'A reference to a primary key in another table',
        ]);

        Question::create([
           'category_id' => 6,
            'question_text' => 'Which of the following is NOT a type of relationship in an ERD (Entity Relationship Diagram)?',
            'options' => ['One-to-One', 'One-to-Many', 'Many-to-Many', 'One-to-Few'],
            'correct_answer' => 'One-to-Few',
        ]);
    }
}
