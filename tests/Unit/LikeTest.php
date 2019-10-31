<?php

namespace Tests\Unit;

use App\Model\Like;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class LikeTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function like_has_reply_id()
    {
        $like = Like::create([
            'reply_id' => 1,
            'user_id' => 1
        ]);

        $this->assertEquals(1, $like->reply_id);
        $this->assertNotEmpty($like->reply_id);
    }

    /** @test */
    public function like_has_user_id()
    {
        $like = Like::create([
            'reply_id' => 1,
            'user_id' => 1
        ]);

        $this->assertEquals(1, $like->user_id);
        $this->assertNotEmpty($like->user_id);
    }
}
