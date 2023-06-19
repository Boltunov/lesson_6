<?php

declare(strict_types=1);

namespace Tests\Feature\Http\Admin;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class DischargeControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_the_discharge_returns_a_successful_response(): void
    {
        $response = $this->get('/discharge');

        $response->assertStatus(404);
    }
    public function testSuccessDischargeList():void
    {
        $response = $this->get(route('admin.discharge.index'));
        $response->assertStatus(200);
    }
    public function testSuccessDischargeCreateForm():void
    {
        $response = $this->get(route('admin.discharge.create'));
        $response->assertStatus(500);
    }
}
