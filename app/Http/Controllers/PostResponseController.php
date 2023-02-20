<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostResponseRequest;
use App\Http\Requests\StoreResponseRequest;
use App\Http\Requests\UpdateResponseRequest;
use App\Models\Image;
use App\Models\Post;
use App\Models\PostResponse;
use App\Models\PostResponseImage;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;

class PostResponseController extends Controller
{

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request): View
    {
        $post = Post::find($request->query('post_id'));
        return view('post_responses.create', compact('post'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePostResponseRequest $request)//: RedirectResponse
    {
        $post = Post::find($request->query('post_id'));
        $postResponse = PostResponse::create( array_merge($request->validated(), [
            'post_id' => $post->id, 
            'user_id' => auth()->user()->id
        ]));

        if ($request->file('image')) {
            $image = Image::storeLocally($request);

            $postResponseImage = new PostResponseImage([
                'post_response_id' => $postResponse->id,
                'image_id' => $image->id,
            ]);
            $postResponseImage->save();
        }
        
        $postResponses = PostResponse::wherePostId($post->id)->paginate(3);

        return redirect()->route('posts.show', compact('post', 'postResponses'));
    }

}
