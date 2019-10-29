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
}
