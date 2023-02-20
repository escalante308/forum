<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'path'];

    static public function storeLocally($request) : Image 
    {
        $imageName = time().$request->file('image')->extension();

        $request->file('image')->move(public_path('images') ,$imageName);

        $image = new Image([
            'name' => $request->file('image')->getClientOriginalName(),
            'path' => $imageName,
        ]);
        $image->save();

        return $image;
    }
}
