<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" />
    <title>@yield('title')</title>
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}">
</head>

<body>
    <div class="bg-white border-b-4 border-bottom-4 border-blue-700 flex align-middle">
        <div class="container mx-auto my-4 px-12 py-8 flex justify-between">
            <div>
                <a href="{{ route('home') }}" class="flex">
                    <i class="fa fa-people-roof text-blue-700 text-2xl mr-2"></i>
                    <div class="font-bold text-2xl">My Community</div>
                </a>
            </div>
            <div>
                <form class="flex items-center" action="{{ route('home') }}" method="GET">
                    <label for="simple-search" class="sr-only">Search</label>
                    <div class="relative w-full">
                        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                            <i class="fa fa-magnifying-glass text-gray-300 mr-2"></i>
                        </div>
                        <input type="text" id="search" name="search"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5"
                            placeholder="Search" required>
                    </div>
                    <button type="submit"
                        class="p-2.5 ml-2 text-sm font-medium text-white bg-blue-700 rounded-lg border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                        <span class="sr-only">Search</span>
                    </button>
                </form>
            </div>
            <div class="flex align-center">

                @auth
                    {{ auth()->user()->name }}
                    <div class="text-end">
                        <a class="p-2.5 ml-2 text-sm font-medium text-white bg-blue-700 rounded-lg border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300"
                            href="{{ route('logout') }}" class="btn btn-outline-light me-2">
                            <i class="fa fa-right-from-bracket text-gray-300 mr-2"></i>
                            Logout
                        </a>
                    </div>
                @endauth

                @guest
                    <div class="text-end">
                        <a class="p-2.5 ml-2 text-sm font-medium text-white bg-blue-700 rounded-lg border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300"
                            href="{{ route('login.perform') }}">
                            <i class="fa fa-right-to-bracket text-white mr-2"></i>
                            Login</a>
                        <a class="p-2.5 ml-2 text-sm font-medium text-white bg-blue-700 rounded-lg border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300"
                            href="{{ route('register.perform') }}">
                            <i class="fa fa-user-plus text-white mr-2"></i>
                            Sign-up</a>
                    </div>
                @endguest

            </div>
        </div>
    </div>
    <div class="container mx-auto px-12 bg-gray-50">
        <div class="grid grid-cols-3">
            <div class="col-span-2 py-5">
                @yield('content')
            </div>
            <div class="py-5 pl-5">
                @yield('aside')
            </div>
        </div>
    </div>
</body>

</html>
