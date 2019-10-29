<?php

namespace Tests\Feature;

use App\Model\Question;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class QuestionControllerTest extends TestCase
{
    use DatabaseTransactions;
    // use WithoutMiddleware;

    /** @test */
    public function user_can_get_all_questions()
    {
        $response = $this->json('GET', '/api/question');

        $response->assertSuccessful()->assertStatus(200)->assertJsonCount(1);
    }

    /** @test */
    public function user_can_get_a_question()
    {
        $question = factory(Question::class)->create();

        $response = $this->json('GET', "/api/question/{$question->slug}");

        $response->assertStatus(200);
        $response->assertSuccessful();
        $response->assertJsonCount(1);
    }
}
