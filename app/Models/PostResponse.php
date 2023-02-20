<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostResponse extends Model
{
    use HasFactory;

    protected $fillable = ['post_id', 'user_id', 'response'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function post()
    {
        return $this->belongsTo(Post::class);
    }

    public function postResponseImages()
    {
        return $this->hasMany(PostResponseImage::class);
    }

    public function getMainImageAttribute() {
        return $this->postResponseImages()->first()?->image()->first();
    }
}
