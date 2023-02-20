<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    
    protected $fillable = ['user_id', 'title', 'problem'];
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function postResponses()
    {
        return $this->hasMany(PostResponse::class);
    }

    public function postImages()
    {
        return $this->hasMany(PostImage::class);
    }

    public function getMainImageAttribute() {
        return $this->postImages()->first()?->image()->first();
    }

}
