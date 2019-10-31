<?php

namespace Tests\Feature;

use App\Model\Question;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tests\TestCase;

class QuestionControllerTest extends TestCase
{
    use RefreshDatabase;
    // use WithoutMiddleware;



    /** @test */
    // public function user_can_get_all_questions()
    // {
    //     $response = $this->json('GET', '/api/question');

    //     $response->assertSuccessful()->assertStatus(200)->assertJsonCount(1);
    // }

    /** @test */
    // public function user_can_get_a_question()
    // {
    //     $question = factory(Question::class)->create();

    //     $response = $this->json('GET', "api/question/{$question->slug}");
    //     $response->assertStatus(200);
    //     $response->assertSuccessful();
    //     $response->assertJsonCount(1);
    // }

    /** @test */
    // public function user_can_not_create_question_if_no_token()
    // {
    //     $data = [
    //         'title' => 'i love laravel',
    //         'slug' => 'i-love-laravel',
    //         'body' => 'i really do love laravel',
    //         'category_id' => 1,
    //         'user_id' => 1
    //     ];
    //     $header = [
    //         'Content-Type' => 'application/json',
    //         'Authorization' => ''
    //     ];

    //     $response = $this->json('POST', '/api/question', $data);
    //     $response->assertStatus(400);
    // }
}
