<?php

namespace Tests\Unit;

use App\Model\Category;
use App\Model\Question;
use App\Model\Reply;
use App\User;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class QuestionTest extends TestCase
{
    use DatabaseTransactions;

    /** @test */
    public function question_has_title_attribute()
    {
        $question = factory(Question::class)->create();

        $this->assertEquals($question->title, $question->title);
    }

    /** @test */
    public function slug_for_question_title_generated()
    {
        $question = factory(Question::class)->create();

        $this->assertEquals($question->slug, $question->slug);
    }

    /** @test */
    public function question_has_body_attributed()
    {
        $question = factory(Question::class)->create();

        $this->assertEquals($question->body, $question->body);
        $this->assertNotEmpty($question->body);
    }

    /** @test */
    public function question_belongs_to_a_user()
    {
        $question = factory(Question::class)->create();

        $this->assertInstanceOf(User::class, $question->user);
    }

    /** @test */
    public function question_belongs_to_a_category()
    {
        $question = factory(Question::class)->create();

        $this->assertInstanceOf(Category::class, $question->category);
    }

    /** @test */
    public function question_has_many_replies()
    {
        $question = factory(Question::class)->create();
        $replies = factory(Reply::class, 4)->create(['question_id' => $question->id]);

        $this->assertEquals(4, $question->replies->count());
    }

    /** @test */
    public function question_has_path_attribute()
    {
        $question = factory(Question::class)->create();

        $this->assertEquals(asset("api/question/{$question->slug}"), $question->path);
    }
}
