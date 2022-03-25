<?php

namespace Tests\Feature;

use App\Models\Bansen;
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

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_assert_bansen_number_between_db_and_top_page()
    {
        /** @var Bansen $bansen */
        $bansen = Bansen::getLatestOne();

        $response = $this->get('/');

        $html = $response->getContent();

        $this->assertNotFalse(preg_match('|<h2>([0-9]+)</h2>|u', $html, $match));

        $now_no = (int)$match[1];
        $this->assertEquals($bansen->id, $now_no);

    }

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_increment_actual()
    {
        /** @var Bansen $before_bansen */
        $before_bansen = Bansen::getLatestOne();

        $this->post('/post_bansen_increment');

        /** @var Bansen $next_bansen */
        $next_bansen = Bansen::getLatestOne();

        $this->assertEquals($before_bansen->id + 1, $next_bansen->id);
    }

}
