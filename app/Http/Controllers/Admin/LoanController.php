<?php

namespace App\Http\Controllers\admin;

use App\Models\Loans;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\Admin\LoanResource;

class LoanController extends Controller
{
    public function index(Request $request) {
        $loans = Loans::paginate(10);
        return inertia('admin/adminEmprestimosView', [
            'loans' => LoanResource::collection(resource: $loans)
        ]);
    }

    public function show($id) {
        $loan = Loans::findOrFail($id);
        return inertia('admin/adminEmprestimoView', [
            'loan' => new LoanResource($loan)
        ]);
    }
}
