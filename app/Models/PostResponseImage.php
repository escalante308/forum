<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostResponseImage extends Model
{
    use HasFactory;

    protected $fillable = ['post_response_id', 'image_id'];

    public function postResponse()
    {
        return $this->belongsTo(PostResponse::class);
    }

    public function image()
    {
        return $this->belongsTo(Image::class);
    }
}
