<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UnitTest extends TestCase 
{

/**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_index_category()
    {
        $response = $this->get('categories');

        $response->assertStatus(302);
    }
    public function test_category_create()
    {
        $response = $this->get('categories');

        $response->assertStatus(302);
    }


    public function test_index_theses()
    {
        $response = $this->get('theses');

        $response->assertStatus(302);
    }


    public function test_store_students()
    {
        $response = $this->post('students');

        $response->assertStatus(302);
    }


    public function test_store_supervisors()
    {
        $response = $this->post('supervisors');

        $response->assertStatus(302);
    }

}