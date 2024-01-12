<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class SimpleTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testApiEndpointReturns200StatusCode()
    {
        $response = $this->get('/api/testing');

        $response->assertStatus(200);
    }
}
