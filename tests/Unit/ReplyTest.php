<?php

namespace Tests\Unit;

use App\Model\Question;
use App\Model\Reply;
use App\User;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ReplyTest extends TestCase
{
    use DatabaseTransactions;

    /** @test */
    public function reply_has_body_attribute()
    {
        $reply = factory(Reply::class)->create();

        $this->assertEquals($reply->body, $reply->body);
    }

    /** @test */
    public function reply_belongs_to_a_user()
    {
        $reply = factory(Reply::class)->create();

        $this->assertInstanceOf(User::class, $reply->user);
    }

    /** @test */
    public function reply_belongs_to_a_question()
    {
        $reply = factory(Reply::class)->create();

        $this->assertInstanceOf(Question::class, $reply->question);
    }
}
