<?php

namespace Tests\Feature\Web;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class DashboardTest extends TestCase
{
    /** @test */
    public function test_can_visit_dashboard_index()
    {
        $response = $this->get(route('dashboard.index'));
        $response->assertOk();
        $response->assertViewIs('dashboard.index');
    }

    /** @test */
    public function test_can_visit_heros_index()
    {
        $response = $this->get(route('heros.index'));
        $response->assertOk();
        $response->assertViewIs('dashboard.heros.index');
    }

    /** @test */
    public function test_can_visit_monsters_index()
    {
        $response = $this->get(route('monsters.index'));
        $response->assertOk();
        $response->assertViewIs('dashboard.monsters.index');
    }
    
    
    
}
