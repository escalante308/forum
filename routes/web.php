<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\PostResponseController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;

Route::get('/',             [PostController::class, 'index'         ])->name('home');

Route::get('register',      [RegisterController::class, 'show'      ])->name('register.show');
Route::post('register',     [RegisterController::class, 'register'  ])->name('register.perform');

Route::group(['middleware' => ['guest']], function() {

    Route::get('login',         [LoginController::class, 'show'         ])->name('login');
    Route::post('login',        [LoginController::class, 'login'        ])->name('login.perform');
});

Route::group(['middleware' => ['auth']], function() {

    Route::get('posts/create',  [PostController::class, 'create'])->name('posts.create');
    Route::post('posts/store',  [PostController::class, 'store' ])->name('posts.store');
    
    Route::get('posts/{post}/edit',    [PostController::class, 'edit'  ])->name('posts.edit');
    Route::post('posts/{post}/update', [PostController::class, 'update'])->name('posts.update');

    Route::get('post_responses/create',  [PostResponseController::class, 'create'   ])->name('post_responses.create');
    Route::post('post_responses/store',  [PostResponseController::class, 'store'    ])->name('post_responses.store');

    Route::get('/logout',       [LoginController::class, 'logout'       ])->name('logout');
});

Route::get('posts',         [PostController::class, 'index'         ])->name('posts.index');
Route::get('posts/{post}',  [PostController::class, 'show'          ])->name('posts.show');
