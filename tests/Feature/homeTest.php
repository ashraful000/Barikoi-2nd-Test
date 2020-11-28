<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class homeTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function only_logged_in_users_can_see_the_home_view()
    {
        $response = $this->get('/home')
                         ->assertRedirect('/login');

        
    }

    /** @test */
    public function authenticated_users_can_see_the_home_view(){
        $this->actingAs(\App\Models\User::factory(User::class)->make());

        $response = $this->get('/home')
                         ->assertOK();
    }


}
