<?php

namespace Tests\Feature;

use App\Model\Category;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tests\TestCase;

class CategoryControllerTest extends TestCase
{
    use RefreshDatabase;
    // use WithoutMiddleware;


    /** @test */
    public function user_can_get_all_categories()
    {
        $response = $this->json('GET', '/api/category');
        // dd($response);
        $response->assertStatus(200)->assertJsonCount(1);
    }

    /** @test */
    public function user_can_get_a_category()
    {
        $category = factory(Category::class)->create();

        $response = $this->json('GET', "/api/category/{$category->slug}");

        $response->assertStatus(200)->assertSuccessful()->assertJsonCount(1);
    }

    /** @test */
    public function user_can_not_create_category_if_unauthenticated_or_no_token_available()
    {
        $data = [
            'name' => 'i love laravel',
            'slug' => 'i-love-laravel'
        ];
        $header = [
            'Content-Type' => 'application/json',
            'Authorization' => ''
        ];

        $response = $this->json('POST', '/api/category', $data, $header);
        $response->assertStatus(400);
    }
}
