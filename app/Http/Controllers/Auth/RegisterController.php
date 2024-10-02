<?php

namespace App\Http\Controllers\Auth;

use App\Http\Requests\Auth\RegisterRequest; 
use App\Models\Users;
use Carbon\Carbon;
use Inertia\Inertia;
use Inertia\Response;
use App\Rules\UserTypeRules;

class RegisterController 
{

    public function index(): Response
    {
        return Inertia::render('cadastroView');
    }

    public function store(RegisterRequest $request)
    {
        $dataNascimento = Carbon::parse($request->dataNascimento);
        $idade = $dataNascimento->age;

        if ($idade < 18 && !$request->cpfResp) {
            return redirect()->back()->withErrors(['dataNascimento' => 'Você deve fornecer o CPF do responsável se for menor de 18 anos.']);
        }

        $userType = UserTypeRules::getType($dataNascimento);

        Users::create([
            'name' => $request->nome,
            'email' => $request->email,
            'password' => hash('sha256', $request->senha),
            'cpf' => $request->cpf,
            'date_of_birth' => $dataNascimento,
            'guardian_cpf' => $idade < 18 ? $request->cpfResp : null,
            'user_type' => $userType,
        ]);

        return redirect()->route(route: 'home')->with('success', 'Cadastro realizado com sucesso!');
    }
}
