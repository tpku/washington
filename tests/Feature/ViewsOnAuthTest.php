<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use App\Models\Workout;
use App\Models\Exercise;


class ViewsOnAuthTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_home(): void
    {
        $user = User::factory()->create(['email' => 'test@test.com', 'password' => bcrypt($password = 'test'), 'name' => 'John']);

        $response = $this->followingRedirects()->post('/login', [
            'email' => $user->email,
            'password' => $password,
        ]);
        $this->assertAuthenticatedAs($user);

        $response = $this->get('/');

        $response->assertStatus(200);
        $response->assertSeeText('logout');
        $response->assertSeeText('settings');
    }

    public function test_settings(): void
    {

        $user = User::factory()->create();

        $response = $this->actingAs($user)
            ->withSession(['banned' => false])
            ->get('/');

        $response = $this->get('/settings');
        $response->assertStatus(200);
        $response->assertSeeText('Name');
        $response->assertSeeText('Password');
    }

    public function test_workouts(): void
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)
            ->withSession(['banned' => false])
            ->get('/');

        $response = $this->get('/workout');
        $response->assertStatus(200);
        $response->assertSeeText('workout');
    }

    public function test_workout(): void
    {
        $user = User::factory()->create();
        $workout = Workout::factory()->create(['user_id' => $user->id]);

        $response = $this->actingAs($user)
            ->withSession(['banned' => false])
            ->get('/workout/' . $workout->id);

        $response->assertStatus(200);
        $response->assertSeeText('Edit');
        $response->assertSeeText('Back');
    }

    public function test_workout_edit(): void
    {
        $user = User::factory()->create();
        $workout = Workout::factory()->create(['user_id' => $user->id]);

        $response = $this->actingAs($user)
            ->withSession(['banned' => false])
            ->get('/workout/' . $workout->id . '/edit');

        $response->assertStatus(200);
        $response->assertSeeText('Back');
        $response->assertSeeText('Title');
        $response->assertSeeText('Description');
        $response->assertSeeText('Workout');
    }

    public function test_workout_edit_add_exercise(): void
    {
        $user = User::factory()->create();
        $workout = Workout::factory()->create(['user_id' => $user->id]);
        $exercise = Exercise::factory()->create(['workout_id' => $workout->id]);


        $response = $this->actingAs($user)
            ->withSession(['banned' => false])
            ->post('/exercise/' . $exercise->id);

        $response->assertSeeText('workout_id');
        $response->assertSeeText('title');
        $response->assertSeeText('duration');
        $response->assertSeeText('unit');
    }
}
