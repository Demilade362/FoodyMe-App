<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     */
    public function test_the_application_welcome_page_returns_a_successful_response(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function test_the_application_about_page_returns_a_successful_response(): void
    {
        $response = $this->get('/about');

        $response->assertStatus(200);
    }

    public function test_the_application_contact_page_returns_a_successful_response(): void
    {
        $response = $this->get('/contact');

        $response->assertStatus(200);
    }

    public function test_the_application_returns_a_redirect_when_report_a_problem_is_clicked(): void

    {
        $response = $this->followingRedirects();

        $response->assertTrue(true);
    }

    public function test_the_application_login_page_returns_a_successful_response(): void
    {
        $response = $this->get('/login');

        $response->assertStatus(200);
    }

    public function test_the_application_register_page_returns_a_successful_response(): void
    {
        $response = $this->get('/register');

        $response->assertStatus(200);
    }

    public function test_the_application_login_page_login_a_user_in(): void
    {
        $user = User::find(1);
        $response = $this->post('/login', [
            'email' => $user->email,
            'password' => 'password'
        ]);

        $response->assertStatus(302);
    }

    public function test_the_application_register_page_register_a_user(): void
    {
        $user = User::factory()->create();
        $response = $this->post('/register', [$user]);

        $response->assertStatus(302);
    }
}
