<?php

namespace Tests\Unit;

use App\Model\Question;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class QuestionModelTest extends TestCase
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
}
