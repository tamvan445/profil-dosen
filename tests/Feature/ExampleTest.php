<?php

namespace Tests\Feature;

use Database\Seeders\CourseSeeder;
use Database\Seeders\CollegeSeeder;
use Database\Seeders\LecturerSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Indicates whether the default seeder should run before each test.
     *
     * @var bool
     */
    protected $seed = true;

    

    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    /**
     * Test Run the DatabaseSeeder.
     *
     * @return void
     */
    public function test_all_data_can_be_created()
    {
        // Data Perguruan Tinggi
        $this->seed(CollegeSeeder::class);
        // Data Dosen
        $this->seed(LecturerSeeder::class);
        // Data Mata Kuliah
        $this->seed(CourseSeeder::class);
    }
}
