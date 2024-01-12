<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class SimpleMatemathicCorrection extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_two_number_addition()
    {
        $response = $this->get('/api/addition?number5=3&number2=5');
        
        $response->assertStatus(200);
    }
}
