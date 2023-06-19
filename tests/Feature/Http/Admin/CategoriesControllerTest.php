<?php

declare(strict_types=1);
namespace Tests\Feature\Http\Admin;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CategoriesControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_the_categories_returns_a_successful_response(): void
    {
        $response = $this->get('/categories');

        $response->assertStatus(404);
    }
    public function testSuccessCategoriesList():void
    {
        $response = $this->get(route('admin.categories.index'));
        $response->assertStatus(200);
    }
    public function testSuccessCategoriesCreateForm():void
    {
        $response = $this->get(route('admin.categories.create'));
        $response->assertStatus(200);
    }
}
