<?php

namespace Tests\Feature;

use App\Model\Category;
use App\User;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CategoryControllerTest extends TestCase
{
    use DatabaseTransactions;

    /** @test */
    public function user_can_get_all_categories()
    {
        $response = $this->json('GET', '/api/category');

        $response->assertStatus(200)->assertJsonCount(1);
    }

    /** @test */
    public function user_can_get_a_category()
    {
        $category = factory(Category::class)->create();

        $response = $this->json('GET', "/api/category/{$category->slug}");

        $response->assertStatus(200);
        $response->assertSuccessful();
        $response->assertJsonCount(1);
    }

    /** @test */
    public function user_can_not_create_category_if_unauthenticated_or_no_token_available()
    {
        $category = factory(Category::class)->create();
        $user = factory(User::class)->create();

        $data = [
            'id' => 1,
            'name' => 'i love laravel',
            'slug' => 'i-love-laravel'
        ];
        $header = [
            'Content-Type' => 'application/json'
        ];

        $response = $this->json('POST', '/api/category', $data, $header);
        $response->assertStatus(400);
    }
}
