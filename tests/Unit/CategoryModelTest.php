<?php

namespace Tests\Unit;

use App\Model\Category;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Str;
use Tests\TestCase;

class CategoryModelTest extends TestCase
{

    use DatabaseTransactions;

    /** @test */
    public function category_has_name_attribute()
    {
        $name = 'i love laravel';

        $category = Category::create([
            'name' => $name,
            'slug' => Str::slug($name)
        ]);

        $this->assertEquals('i love laravel', $category->name);
    }

    /** @test */
    public function saving_a_category_should_save_it_associated_slug()
    {
        $category = factory(Category::class)->create();

        $this->assertDatabaseHas('categories', ['slug' => $category->slug]);
    }
}
