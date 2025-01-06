<?php

namespace Tests\Unit;

use Tests\TestCase;
use Mockery;
use App\Models\Category;
use App\Models\Question;
use App\Services\QuizService;

class QuizServiceTest extends TestCase
{
    public function testFetchCategories()
    {
        // Mock the Category model
        $mockedCategories = collect([
            (object)['id' => 1, 'name' => 'Programming Language'],
            (object)['id' => 2, 'name' => 'Database'],
        ]);

        $mock = Mockery::mock('alias:' . Category::class);
        $mock->shouldReceive('all')->once()->andReturn($mockedCategories);

        // Call the service
        $quizService = new QuizService();
        $categories = $quizService->fetchCategories();

        // Assert the results match the mocked categories
        $this->assertEquals($mockedCategories, $categories);
    }

    /** @test */
    public function it_fetches_questions_for_a_given_category()
    {
        $cat = new Category();
        $cat->id = 1;
        $cat->name = 'test name';
        // Mock the Category and Question models
        $mockCategory = Mockery::mock('alias:' . Category::class);
        $mockCategory->shouldReceive('findOrFail')
            ->with(1)
            ->andReturn($cat);

        $mockQuestion = Mockery::mock('alias:' . Question::class);
        $mockQuestion->shouldReceive('where')
            ->with('category_id', 1)
            ->andReturnSelf();
        $mockQuestion->shouldReceive('inRandomOrder')->andReturnSelf();
        $mockQuestion->shouldReceive('get')
            ->andReturn(collect([
                new Question(['question_text' => 'Which programming language is used for web development?']),
                new Question(['question_text' => 'Which of the following is a functional programming language?'])
            ]));

        // Act: Call the service
        $service = new QuizService();
        $response = $service->fetchQuestions(1);

        // Assert: Verify the correct category is returned
        $this->assertEquals(1, $response['category']->id);
        // Assert: Verify that questions belong to the correct category
        $this->assertCount(2, $response['questions']);
    }

    protected function tearDown(): void
    {
        Mockery::close(); // Close Mockery after each test
        parent::tearDown();
    }
}
