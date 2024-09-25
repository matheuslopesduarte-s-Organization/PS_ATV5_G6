<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Response;
use Inertia\Inertia;
use App\Http\Requests\Auth\LoginRequest;

class LoginController extends Controller
{
    public function index(): Response
    {
        return Inertia::render(component: "loginView");
    } 
    public function store(LoginRequest $request): Response | RedirectResponse
    {
        $request->authenticate();

        $request->session()->regenerate();
        
    
        return redirect()->route('home')->with('success', 'Login realizado com sucesso!');

    }
    public function destroy(Request $request): Response | RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        
        $request->session()->regenerateToken();

        return redirect()->route('home')->with('success', 'Logout realizado com sucesso!');
    }
}
