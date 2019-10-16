<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CitaTest extends TestCase
{
    /** @test */
    public function testListadoCitas()
    {       
        $response = $this->get(route('citas.store')); //.$this->faker->numberBetween(0,50)
        $response->assertStatus(200);
    }
}
