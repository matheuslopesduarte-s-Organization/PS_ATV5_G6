<?php

namespace App\Http\Controllers\Admin;

use App\Models\Loans;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Resources\Admin\LoanResource;

class LoanController 
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

    public function active(Request $request, $id) {

        $loan = Loans::findOrFail($id);
        $loan->status = 'active';
        $loan->loan_date = Carbon::now();
        $loan->return_deadline = Carbon::now()->addMonths(2);
        $loan->save();
    }

    public function return(Request $request, $id) {
        $loan = Loans::findOrFail($id);
        $loan->status = 'returned';
        $loan->return_date = Carbon::now();
        $loan->book->stock += 1;
        $loan->book->save();
        $loan->save();
    }

}
