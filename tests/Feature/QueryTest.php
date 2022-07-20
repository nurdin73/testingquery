<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Performance\Performance;
use Performance\Config;

class QueryTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {
        Config::setQueryLog(true, 'full');
        Performance::point();
        $response = $this->get('/');

        $response->assertStatus(200);
        Performance::results();
    }
}
