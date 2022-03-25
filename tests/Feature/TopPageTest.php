<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TopPageTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_show_top()
    {
        $response = $this->get('/');

        $this->assertStringContainsString("latest bansen no is...", $response->getContent());

        $response->assertStatus(200);
    }

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_increment()
    {
        $response = $this->post('/post_bansen_increment');

        $this->assertEquals('http://example-app.test', $response->headers->get('location'));

        $this->assertEquals(302, $response->getStatusCode());
    }
}
