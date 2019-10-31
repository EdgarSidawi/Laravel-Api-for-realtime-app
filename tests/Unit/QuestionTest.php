<?php

namespace Tests\Unit;

use App\Model\Category;
use App\Model\Question;
use App\Model\Reply;
use App\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Str;
use Tests\TestCase;

class QuestionTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function question_has_title_attribute()
    {
        $question = Question::create([
            'id' => 1,
            'title' => 'laravel',
            'slug' => 'laravel',
            'body' => 'i love laravel',
            'category_id' => 1,
            'user_id' => 1,
        ]);
        $this->assertNotEmpty($question->title);
        $this->assertEquals('laravel', $question->title);
    }

    /** @test */
    public function slug_for_question_title_generated()
    {
        $title = 'laravel';
        $question = $question = Question::create([
            'id' => 1,
            'title' => $title,
            'slug' => Str::slug($title),
            'body' => 'i love laravel',
            'category_id' => 1,
            'user_id' => 1,
        ]);

        $this->assertNotEmpty($question->slug);
        $this->assertEquals('laravel', $question->slug);
    }

    /** @test */
    public function question_has_body_attributed()
    {
        $question = $question = Question::create([
            'id' => 1,
            'title' => 'laravel',
            'slug' => 'laravel',
            'body' => 'i love laravel',
            'category_id' => 1,
            'user_id' => 1,
        ]);
        $this->assertNotEmpty($question->body);
        $this->assertEquals('i love laravel', $question->body);
    }

    /** @test */
    public function question_belongs_to_a_user()
    {
        $user = factory(User::class)->create();

        $question = Question::create([
            'id' => 1,
            'title' => 'laravel',
            'slug' => 'laravel',
            'body' => 'i love laravel',
            'category_id' => 1,
            'user_id' => $user->id,
        ]);

        $this->assertInstanceOf(User::class, $question->user);
    }

    /** @test */
    public function question_belongs_to_a_category()
    {
        $category = factory(Category::class)->create();

        $question = Question::create([
            'id' => 1,
            'title' => 'laravel',
            'slug' => 'laravel',
            'body' => 'i love laravel',
            'category_id' => $category->id,
            'user_id' => 1,
        ]);

        $this->assertInstanceOf(Category::class, $question->category);
    }

    /** @test */
    public function question_has_many_replies()
    {
        $question = Question::create([
            'id' => 1,
            'title' => 'laravel',
            'slug' => 'laravel',
            'body' => 'i love laravel',
            'category_id' => 1,
            'user_id' => 1,
        ]);
        $replies = Reply::create([
            'body' => 'i love laravel',
            'user_id' => 1,
            'question_id' => $question->id
        ], 4);
        // $replies = factory(Reply::class, 4)->create([
        //     'question_id' => $question->id
        // ]);
        // dd($replies);
        $this->assertEquals(1, $question->replies->count());
    }

    /** @test */
    // public function question_has_path_attribute()
    // {
    //     $question = factory(Question::class)->create();

    //     $this->assertEquals(asset("api/question/{$question->slug}"), $question->path);
    // }
}
