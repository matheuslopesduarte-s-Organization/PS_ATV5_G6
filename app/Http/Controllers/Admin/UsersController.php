<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Users;
use App\Http\Resources\Admin\UsersResource;

class UsersController
{
    public function index()
    {
        $users = Users::paginate(10);
        return inertia('admin/adminUsuariosView', [
            'users' => UsersResource::collection($users)
        ]);
    }

    public function show($id)
    {
        $user = Users::where('cpf', $id)->firstOrFail();
        return inertia('admin/adminUsuarioView', [
            'user' => $user
        ]);
    }
}
