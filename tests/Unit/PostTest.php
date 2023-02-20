<?php

namespace Tests\Unit;

use App\Models\Image;
use App\Models\Post;
use App\Models\PostImage;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PostTest extends TestCase
{
    use RefreshDatabase;

    public function test_post_is_created(): void
    {
        $user = User::factory()->create();
        $post = Post::factory()->create(['user_id' => $user->id]);
        
        $this->assertDatabaseHas('posts', ['id' => $post->id]);
    }

    public function test_post_creates_image(): void
    {
        $user = User::factory()->create();
        $post = Post::factory()->create(['user_id' => $user->id]);

        $image = Image::factory()->create();

        $postImage = PostImage::factory()->create([
            'post_id' => $post->id,
            'image_id' => $image->id,
        ]);

        $this->assertDatabaseHas('post_images', ['id' => $postImage->id]);
    }
    
}