<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class LoginTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    // public function test_example()
    // {
    //     $response = $this->get('/');

    //     $response->assertStatus(200);
    // }

    public function test_view_login_form()
    {
        $response = $this->get('/login');
        $response->assertSeeText('Email');
        $response->assertStatus(200);
    }

    public function test_login_user()
    {
        $user = User::factory()->create(['email'=>'test@test.com','password'=> bcrypt($password = 'test'),'name'=>'John']);
        $this->assertDatabaseCount('users', 1);

        $response = $this->followingRedirects()->post('/login', [
            'email' => $user->email,
            'password' => $password,
        ]);
        $this->assertAuthenticatedAs($user);

        $response->assertSeeText('logout');
    }

    public function test_login_user_without_password()
    {
        $response = $this->post('/login', [
            'email' => 'test@test.com',
            'password' => '',
        ]);

        $response->assertSessionHasErrors();
    }

}
