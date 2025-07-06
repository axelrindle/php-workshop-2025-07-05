<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showLogin(): View
    {
        return view('auth.login');
    }

    public function handleLogin(LoginRequest $request): RedirectResponse
    {
        $payload = $request->validated();

        if (Auth::attempt($payload)) {
            return redirect()
                ->route('todo.index')
                ->with('message', 'Moin!');
        }

        return redirect()->back()
            ->withErrors([
                'email' => 'Invalid credentials!'
            ]);
    }

    public function handleLogout(): RedirectResponse
    {
        Auth::logout();

        return redirect()
            ->route('login')
            ->with('message', 'Galigrü');
    }
}
