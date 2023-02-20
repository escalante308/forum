@extends('layouts.forum')

@section('title', 'Edit a Post')

@section('content')

    <div class="text-2xl font-bold">Edit Post</div>

    @if (isset($errors) && count($errors) > 0)
        <div class="bg-red-100 border-t-4 border-red-500 rounded-b text-red-900 px-4 py-3 shadow-md mt-5" role="alert">
            <div class="flex">
                <div class="py-1">
                    <i class="fa fa-circle-exclamation text-red-400 mr-2"></i>
                </div>
                <div>
                    <p class="font-bold">There are some issues on the Post Edition</p>
                    @foreach ($errors->all() as $error)
                        <p class="text-sm">{{ $error }} </p>
                        @include('layouts.partials.messages')
                    @endforeach
                </div>
            </div>
        </div>
    @endif

    <form method="post" action="{{ route('posts.update', $post) }}" class="mt-5" enctype="multipart/form-data">

        @csrf

        <div class="my-5">
            <label for="email" class="block mb-2 text-sm font-medium">Title</label>
            <div class="relative">
                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                    <i class="fa fa-envelope text-gray-400 mr-2"></i>
                </div>
                <input value="{{ $post->title }}" type="text" id="title" name="title" required="required"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5"
                    placeholder="Post title">
            </div>
            @if ($errors->has('title'))
                <span class="text-sm text-red-500">{{ $errors->first('title') }}</span>
            @endif
        </div>

        <div class="my-5">
            <label for="first_name" class="block mb-2 text-sm font-medium">Problem</label>
            <div class="relative">
                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                    <i class="fa fa-message text-gray-400 mr-2"></i>
                </div>
                <textarea id="problem" name="problem" required="required"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5"
                    placeholder="john@example.com"> {{ $post->problem }} </textarea>
            </div>
            @if ($errors->has('problem'))
                <span class="text-sm text-red-500">{{ $errors->first('problem') }}</span>
            @endif
        </div>

        @if($post->mainImage)
            <div class="mt-5 border p-5 flex justify-center">
                <img class="h-60" src="{{ asset('images/'. $post->mainImage->path) }}" />
            </div>
        @endif

        <div class="my-5">
            <label class="block mb-2 text-sm font-medium text-gray-900" for="file_input">Upload file</label>
            <input value="{{old('image')}}" class="block w-full  text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none"
                aria-describedby="file_input_help" id="image" name="image" type="file">
            <p class="mt-1 text-sm text-gray-500" id="file_input_help">SVG, PNG, JPG or GIF (MAX. 800x400px).</p>
        </div>

        <button
            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2"
            type="submit">Edit</button>

    </form>
@endsection
