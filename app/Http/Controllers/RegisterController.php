<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class RegisterController extends Controller
{
    /**
     * Shows a User Register page.
     * 
     * @return View
     */
    public function show(): View
    {
        return view('auth.register');
    }

    /**
     * Receives a Registration request
     * 
     * @param RegisterRequest $request
     * 
     * @return RedirectResponse
     */
    public function register(RegisterRequest $request) : RedirectResponse {
        $user = User::create($request->validated());
        auth()->login($user);

        return redirect('/')->with('success', "Account successfully registered.");
    }
}
