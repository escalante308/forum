<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Models\Image;
use App\Models\Post;
use App\Models\PostImage;
use App\Models\PostResponse;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View as ViewView;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     * 
     * @return View
     */
    public function index(Request $request): View
    {
        $orderingColumn = $request->query('sort') ? 'title' : 'id';
        $orderingValue = $request->query('sort') ? $request->query('sort') : 'desc';
        
        $posts = Post::where( function($query) use($request) {
                    if ($request->search) {
                        $query->where('title', 'LIKE', "%{$request->search}%");
                    }
                })->orderBy($orderingColumn, $orderingValue)->paginate(10);

        $totalPosts = $request->search ? $posts->count() : Post::count();
        $recentPosts = Post::latest()->take(5)->get();

        return view('posts.index', compact('posts', 'totalPosts', 'recentPosts', 'request'));
    }

    /**
     * Show the form for creating a new resource.
     * 
     * @return Response
     */
    public function create(): View
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePostRequest $request)//: RedirectResponse
    {
        $post = Post::create( array_merge($request->validated(), ['user_id' => auth()->user()->id]));

        if ($request->file('image')) {
            $image = Image::storeLocally($request);

            $postImage = new PostImage([
                'post_id' => $post->id,
                'image_id' => $image->id,
            ]);
            $postImage->save();
        }
        
        return view('posts.show')->with('post', $post);
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post): View
    {
        $postResponses = PostResponse::wherePostId($post->id)->paginate(3);

        return view('posts.show', compact('post', 'postResponses'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post): View
    {
        return view('posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePostRequest $request, Post $post): View
    {
        $post->update($request->all());

        return view('posts.show', compact('post'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        //
    }
}
