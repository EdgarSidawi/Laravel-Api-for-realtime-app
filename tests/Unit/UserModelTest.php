<?php

namespace Tests\Unit;

use App\User;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserModelTest extends TestCase
{
    use DatabaseTransactions;

    /**
     * A basic unit test example.
     * @test
     * @return void
     */
    public function user_has_name_attribute()
    {
        $user = User::create([
            'name' => 'foo',
            'email' => 'me@example.com',
            'password' => 'password'
        ]);

        $this->assertEquals('foo', $user->name);
    }

    /** @test */
    public function user_has_email_attribute()
    {
        $user = User::create([
            'name' => 'foo',
            'email' => 'me@example.com',
            'password' => 'password'
        ]);

        $this->assertEquals('meexample.com', $user->email);
    }
}
