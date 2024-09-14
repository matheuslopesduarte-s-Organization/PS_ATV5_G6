<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Response;
use Inertia\Inertia;
use Illuminate\Validation\Rules;
use App\Models\Usuarios;
use Carbon\Carbon;

class RegisterController extends Controller
{
    public function index(): Response {
        return Inertia::render(component: "cadastroView");
    }
    public function store(Request $request) {
        $request->validate([
            'nome' => 'required',
            'cpf' => 'required',
            'email' => 'required|email',
            'senha' => ['required', 'confirmed', Rules\Password::defaults()],
            'dataNascimento' => 'required|date',
        ]);

        $dataNascimento = Carbon::parse($request->dataNascimento);
        $idade = $dataNascimento->age;

        if ($idade < 18 || !$request->cpfResp) {
            return redirect()->back()->withErrors(['dataNascimento' => 'Você deve ter pelo menos 18 anos para se registrar. Você tem:'  . $idade . 'nascido em:' . $dataNascimento->format('d/m/Y')]);
        }

        Usuarios::create([
            'nome' => $request->nome,
            'email' => $request->email,
            'senha' => hash('sha256', $request->senha),
            'cpf' => $request->cpf,
            'data_nascimento' => $dataNascimento,
            'responsavel_cpf' => $request->cpfResp,
            'tipo_usuario' => 'adulto'
        ]);
        return redirect()->route('login');
    }

}
