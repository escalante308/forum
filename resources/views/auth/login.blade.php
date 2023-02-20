@extends('layouts.forum')

@section('title', 'Login to My Community')

@section('content')

    <div class="text-2xl font-bold">Login</div>

    <form method="post" action="{{ route('login.perform') }}">
        
        @csrf

        @if (isset($errors) && count($errors) > 0)
        <div class="bg-red-100 border-t-4 border-red-500 rounded-b text-red-900 px-4 py-3 shadow-md mt-5" role="alert">
            <div class="flex">
                <div class="py-1">
                    <i class="fa fa-circle-exclamation text-red-400 mr-2"></i>
                </div>
                <div>
                    <p class="font-bold">There are some issues on the register</p>
                    @foreach ($errors->all() as $error)
                        <p class="text-sm">{{ $error }} </p>
                        @include('layouts.partials.messages')
                    @endforeach
                </div>
            </div>
        </div>
    @endif

        <div class="my-5">
            <label for="email" class="block mb-2 text-sm font-medium">Username</label>
            <div class="relative">
                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                    <i class="fa fa-envelope text-gray-400 mr-2"></i>
                </div>
                <input value="{{ old('username') }}" type="text" id="username" name="username" required="required"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5"
                    placeholder="john@example.com">
                @if ($errors->has('username'))
                    <span class="text-sm text-red-500">{{ $errors->first('username') }}</span>
                @endif
            </div>
        </div>

        <div class="my-5">
            <label for="email" class="block mb-2 text-sm font-medium">Password</label>
            <div class="relative">
                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                    <i class="fa fa-envelope text-gray-400 mr-2"></i>
                </div>
                <input value="{{ old('password') }}" type="password" id="password" name="password" required="required"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5" placeholder="john@example.com">
                @if ($errors->has('password'))
                    <span class="text-sm text-red-500">{{ $errors->first('password') }}</span>
                @endif
            </div>
        </div>

        <!-- <div class="form-group form-floating mb-3">
            <input type="text" class="form-control" name="username" value="{{ old('username') }}" placeholder="Username" required="required" autofocus>
            <label for="floatingName">Email or Username</label>
            @if ($errors->has('username'))
                <span class="text-danger text-left">{{ $errors->first('username') }}</span>
            @endif
        </div>
        
        <div class="form-group form-floating mb-3">
            <input type="password" class="form-control" name="password" value="{{ old('password') }}" placeholder="Password" required="required">
            <label for="floatingPassword">Password</label>
            @if ($errors->has('password'))
                <span class="text-danger text-left">{{ $errors->first('password') }}</span>
            @endif
        </div> -->

        <button
            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2"
            type="submit">Login</button>
        
    </form>
@endsection