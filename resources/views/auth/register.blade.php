@extends('layouts.forum')

@section('title', 'Register to My Community')

@section('content')

    <div class="text-2xl font-bold">Register</div>

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

    <form method="post" action="{{ route('register.perform') }}" class="mt-5">

        @csrf

        <div class="my-5">
            <label for="email" class="block mb-2 text-sm font-medium">Your Email</label>
            <div class="relative">
                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                    <i class="fa fa-envelope text-gray-400 mr-2"></i>
                </div>
                <input value="{{ old('email') }}" type="text" id="email" name="email" required="required"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5"
                    placeholder="john@example.com">
                @if ($errors->has('email'))
                    <span class="text-sm text-red-500">{{ $errors->first('email') }}</span>
                @endif
            </div>
        </div>

        <div class="my-5">
            <label for="first_name" class="block mb-2 text-sm font-medium">First Name</label>
            <div class="relative">
                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                    <i class="fa fa-message text-gray-400 mr-2"></i>
                </div>
                <input value="{{ old('first_name') }}" type="text" id="first_name" name="first_name" required="required"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5"
                    placeholder="john@example.com">
                @if ($errors->has('first_name'))
                    <span class="text-sm text-red-500">{{ $errors->first('first_name') }}</span>
                @endif
            </div>
        </div>

        <div class="my-5">
            <label for="first_name" class="block mb-2 text-sm font-medium">Last Name</label>
            <div class="relative">
                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                    <i class="fa fa-message text-gray-400 mr-2"></i>
                </div>
                <input value="{{ old('last_name') }}" type="text" id="last_name" name="last_name" required="required"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5"
                    placeholder="john@example.com">
                @if ($errors->has('last_name'))
                    <span class="text-sm text-red-500">{{ $errors->first('last_name') }}</span>
                @endif
            </div>
        </div>

        <div class="my-5">
            <label for="first_name" class="block mb-2 text-sm font-medium">User Name</label>
            <div class="relative">
                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                    <i class="fa fa-user text-gray-400 mr-2"></i>
                </div>
                <input value="{{ old('username') }}" type="text" id="username" name="username" required="required"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5"
                    placeholder="">
                @if ($errors->has('username'))
                    <span class="text-sm text-red-500">{{ $errors->first('username') }}</span>
                @endif
            </div>
        </div>

        <div class="my-5">
            <label for="first_name" class="block mb-2 text-sm font-medium">Password</label>
            <div class="relative">
                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                    <i class="fa fa-key text-gray-400 mr-2"></i>
                </div>
                <input value="{{ old('password') }}" type="password" id="password" name="password" required="required"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5"
                    placeholder="">
                @if ($errors->has('password'))
                    <span class="text-sm text-red-500">{{ $errors->first('password') }}</span>
                @endif
            </div>
        </div>

        <div class="my-5">
            <label for="first_name" class="block mb-2 text-sm font-medium">Repeat Password</label>
            <div class="relative">
                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                    <i class="fa fa-key text-gray-400 mr-2"></i>
                </div>
                <input value="{{ old('password_confirmation') }}" type="password" id="password_confirmation" name="password_confirmation" required="required"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5"
                    placeholder="">
                @if ($errors->has('password_confirmation'))
                    <span class="text-sm text-red-500">{{ $errors->first('password_confirmation') }}</span>
                @endif
            </div>
        </div>

        <!--<div class="form-group form-floating mb-3">
                <input type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="name@example.com" required="required" autofocus>
                <label for="floatingEmail">Email address</label>
                
            </div>

            <div class="form-group form-floating mb-3">
                <input type="text" class="form-control" name="username" value="{{ old('username') }}" placeholder="Username" required="required" autofocus>
                <label for="floatingName">Username</label>
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
            </div>

            <div class="form-group form-floating mb-3">
                <input type="password" class="form-control" name="password_confirmation" value="{{ old('password_confirmation') }}" placeholder="Confirm Password" required="required">
                <label for="floatingConfirmPassword">Confirm Password</label>
                @if ($errors->has('password_confirmation'))
    <span class="text-danger text-left">{{ $errors->first('password_confirmation') }}</span>
    @endif
            </div> -->

        <button
            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2"
            type="submit">Register</button>

    </form>
@endsection
