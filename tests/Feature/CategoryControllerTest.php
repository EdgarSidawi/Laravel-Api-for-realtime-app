<?php

namespace Tests\Feature;

use App\Model\Category;
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
}
