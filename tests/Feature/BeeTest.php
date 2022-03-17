<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class BeeTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {
        $response = $this->get('/b');

        $response->assertStatus(200);

        $this->assertStringContainsString("Bee", $response->getContent());

        $this->assertStringStartsWith('text/html', $response->headers->get('content-type'));
    }
}
