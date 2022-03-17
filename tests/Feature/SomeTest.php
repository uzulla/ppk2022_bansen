<?php

namespace Tests\Feature;

use Tests\TestCase;

class SomeTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {
        $response = $this->get('/some');

        $response->assertStatus(200);

        $this->assertStringStartsWith('application/json', $response->headers->get('content-type'));

        $this->assertIsArray($response->json());

        $this->assertArrayHasKey('test', $response->json());

        $this->assertEquals('data', $response->json()['test']);


    }

    public function test_name()
    {
        $response = $this->get('/some?name=uzulla');

        $response->assertStatus(200);

        $this->assertStringStartsWith('application/json', $response->headers->get('content-type'));

        $this->assertIsArray($response->json());

        $this->assertEquals('uzulla', $response->json()['name']);
    }
}
