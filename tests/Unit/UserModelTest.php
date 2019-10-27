<?php

namespace Tests\Unit;

use App\User;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Hash;
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

        $this->assertEquals('me@example.com', $user->email);
    }

    /** @test */
    public function user_password_has_hash_attribute()
    {
        $user = User::create([
            'name' => 'foo',
            'email' => 'me@example.com',
            'password' => 'password'
        ]);

        $this->assertTrue(Hash::check('password', $user->password));
    }

    /** @test */
    public function user_can_create_an_account()
    {
        User::create([
            'name' => 'foo',
            'email' => 'me@example.com',
            'password' => 'password'
        ]);

        $this->assertDatabaseHas('users', [
            'name' => 'foo',
            'email' => 'me@example.com',
        ]);
    }
}
