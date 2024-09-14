<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Usuarios;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Inertia\Response;
use Inertia\Inertia;
use Illuminate\Support\Facades\Log;
class LoginController extends Controller
{
    public function index(): Response
    {
        return Inertia::render(component: "loginView");
    } 
    public function store(Request $request): Response|RedirectResponse
    {
        $request->validate(rules: [
            'email' => 'required|email',
            'password' => 'required',
        ]);
        
        $credentials = [
            'email'=> $request->email,
            'senha'=> hash('sha256',$request->password),
        ];
        Log::info('Login attempt', $credentials);
        // attempt to authenticate the user
        $user = Usuarios::where('email', $credentials['email'])->first();

        if ($user && $user->senha === $credentials['senha']) {
            auth()->login($user);
            $request->session()->regenerate();
            return redirect()->intended();
        }

        return back()->withErrors(provider: ['email' => 'The provided credentials do not match our records.']);
    }
    public function destroy(Request $request): Response|RedirectResponse
    {
        auth()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->intended();
    }
}
