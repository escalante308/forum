@extends('layouts.forum')

@section('title', 'Forum -  Post List')

@section('content')

    <div class="grid grid-cols-2">
        <div class="text-2xl font-bold">
            @if($request->search)
            Posts by "{{ $request->search }}"
            @else
            All Posts
            @endif
        </div>
        @auth
            <div class="flex justify-end">
                <a href="{{ route('posts.create') }}"
                    class="p-2.5 ml-2 text-sm font-medium text-white bg-blue-700 rounded-lg border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300">
                    <i class="fa fa-plus text-gray-300 mr-2"></i> Create Post
                </a>
            </div>   
        @endauth
    </div>
    
    <div class="mt-5 shadow border">
        <div class="grid grid-cols-6 py-5 font-bold rounded-t-lg">
            <div class="col-span-5 pl-5">
                <i class="fa fa-circle-info text-sm text-blue-300"></i>
                {{ $totalPosts }} Posts
            </div>
            <div class="flex justify-end">
                <a class="mx-2"  href="{{ route('posts.index') }}" title="Order by Date">
                    <i class="fa fa-clock text-sm text-blue-700"></i>
                </a>
                <a class="mx-2"  href="{{ route('posts.index', ['sort' => 'asc']) }}" title="Order by Title A-Z">
                    <i class="fa fa-arrow-up-a-z text-sm text-blue-700"></i>
                </a>
                <a class="ml-2 mr-5" href="{{ route('posts.index', ['sort' => 'desc']) }}" title="Order by Title Z-A">
                    <i class="fa fa-arrow-up-z-a text-sm text-blue-700"></i>
                </a>
            </div>
        </div>
    @foreach ($posts as $post)
        <div class="even:bg-slate-100 grid grid-cols-6 py-5">
            <div class="col-span-4 text-lg pl-5">
                <a class="font-bold" href="{{ route('posts.show', $post)}}">
                    {{ $post->title }}
                </a>
                <div class="text-xs">
                    Created at {{ $post->created_at }}
                </div>
            </div>
            <div>
                <i class="fa fa-user text-sm text-gray-300"></i>
                <span class="text-xs"> {{ $post->user->username }} </span>
            </div>
            <div>
                <i class="fa fa-message text-sm text-gray-300"></i>
                <span class="text-xs"> {{ $post->postResponses->count() }} </span>
            </div>
        </div>
    @endforeach
    <div class="m-5">
        {{ $posts->links() }}
    </div>
    </div>

@endsection

@section('aside')

    <div class="border rounded shadow p-5">
        <div class="text-xl font-bold mb-5">Recent Posts</div>

        @foreach($recentPosts as $recent)
            <div class="mb-2">
                <div class="font-medium">
                    <a href="{{ route('posts.show', $recent) }}">
                        {{ $recent->title }}
                    </a> 
                </div>
                <div class="text-xs"> {{ $recent->user->username }} </div>
            </div>
        @endforeach
    </div>

@endsection