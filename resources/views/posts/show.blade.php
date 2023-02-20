@extends('layouts.forum')

@section('title', $post->title)

@section('content')

    <div class="grid grid-cols-4">
        <div class="text-sm col-span-3">
            <div class="text-2xl font-bold">{{$post->title}}</div>
            <div>Created by: {{ $post->user->username }}</div>
            <div>Created at: {{ $post->user->created_at->toFormattedDateString() }}</div>
        </div>
        <div class="flex justify-end">
            @auth
            @if( Auth::user()->id == $post->user_id)
            <a class="text-white bg-blue-700 h-10 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2"
                href="{{ route('posts.edit', $post->id) }}">
                <i class="fa fa-pen-to-square text-gray-300 mr-2"></i>
                Edit Post
            </a>
            @endif
            @endauth
        </div>
    </div>
    

    @if($post->mainImage)
        <div class="mt-5 border p-5 flex justify-center">
            <img class="h-60" src="{{ asset('images/'. $post->mainImage->path) }}" />
        </div>
    @endif

    <div class="my-5 border p-5">
        <div class="font-bold m-5">Problem:</div>
        <div class="m-5">
            {{ $post->problem }}
        </div>
    </div>

    @auth
        <div class="flex justify-end">
            <a href="{{ route('post_responses.create', ['post_id' => $post->id]) }}"
                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2"
                type="submit">
                <i class="fa fa-right-from-bracket text-gray-300 mr-2"></i>
                Create Response
            </a>
        </div>
    @endauth

    @if( isset($postResponses) && $postResponses->count() )
    <div class="mt-5 text-xl font-bold"> Responses </div>
        
        @foreach($postResponses as $response) 
        <div class="border-b-2 border-blue-900 py-5">
            <div class="text-sm">
                <span class="font-bold"> {{ $response->user->username }} </span> on {{ $response->created_at->toFormattedDateString() }}
            </div>
            <div class="flex justify-between">
                <div>
                    {{ $response->response}}
                </div>
                @if($response->mainImage)
                    <div class="mt-5 border p-5 flex justify-center">
                        <img class="h-20" src="{{ asset('images/'. $response->mainImage->path) }}" />
                    </div>
                @endif
            </div>
        </div>
        @endforeach
        <div class="m-5">
            {{ $postResponses->links() }}
        </div>
    @else
        <div class="mt-5">
            There are no responses for this post. Be the first one to comment!
        </div>    
    @endif



@endsection