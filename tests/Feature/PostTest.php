<?php

namespace Tests\Feature;

use App\Models\Post;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PostTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;
    
    public function test_show_posts(): void
    {
        $response = $this->get('/posts');
        $recentPosts = Post::latest()->take(5)->get();

        $response->assertStatus(200);
        $response->assertSee("All Posts");
        $response->assertViewHas('recentPosts', $recentPosts);
    }

    public function test_show_post_detail(): void
    {
        $user = User::factory()->create();

        $post = Post::factory()->create([
            'user_id' => $user->id,
        ]);

        $response = $this->get('/posts/' . $post->id);

        $response->assertSee($post->title);
    }

    public function test_create_post()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)
                         ->postJson(route('posts.store'), [
                            'title' => $this->faker->title(),
                            'problem' => $this->faker->paragraph(),
                        ]);

        $response->assertStatus(200);
        $response->assertSessionHasNoErrors();
    }

    public function test_create_post_long_title()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->post(route('posts.store'), [
            'title' => $this->faker->paragraph(10),
            'problem' => $this->faker->paragraph(),
        ]);

        $response->assertSessionHasErrors(['title']);
    }

    public function test_create_post_null_values()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->post(route('posts.store'), [
            'title' => "",
            'problem' => "",
        ]);

        $response->assertSessionHasErrors(['title']);
        $response->assertSessionHasErrors(['problem']);
    }
}
