<?php

namespace Tests\Feature;

use App\Model\Question;
use App\Model\Reply;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tests\TestCase;

class ReplyControllerTest extends TestCase
{
    use DatabaseTransactions;

    /** @test */
    public function user_can_get_all_replies_to_question()
    {
        $question = factory(Question::class)->create();
        $reply = factory(Reply::class, 10)->create(['question_id' => $question->id]);

        $response = $this->json('GET', "api/question/{$question->slug}/reply");
        // dd($response);
        $this->assertEquals(10, $question->replies()->count());
        $response->assertSuccessful()->assertStatus(200);
    }

    /** @test */
    public function user_can_get_a_reply()
    {
        $question = factory(Question::class)->create();
        $reply = factory(Reply::class)->create();

        $response = $this->json('GET', "/api/question/{$question->slug}/reply/{$reply->id}");

        $response->assertSuccessful()->assertStatus(200)->assertJsonCount(1);
    }
}
