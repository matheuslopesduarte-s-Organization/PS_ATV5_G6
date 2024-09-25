<?php

namespace App\Http\Controllers;

use App\Models\Loans;
use App\Models\Books;
use App\Models\Users;
use Illuminate\Http\Request;
use Inertia\Inertia;
use App\http\Resources\BookResource;
use Carbon\Carbon;
use App\Events\LoanCreatedEvent;

class LoanController extends Controller
{
    public function index() {
        
        $loans = Loans::with(['book', 'user'])->get();




    }

    public function create($id) {
        $book = Books::findOrFail($id);

        return Inertia::render('emprestimoView', [
            'book' => new BookResource($book),
        ]);

    }

    public function store(Request $request, $id)
    {
        $book = Books::findOrFail($id);

        $request->validate([
            'mes' => 'required|integer|between:1,12',
            'dia' => 'required|integer|between:1,31',
        ]);

        $loan = Loans::where('users_cpf', auth()->user()->cpf)->where('status', 'active')->first();
        if ($loan) {
            return redirect()->back()->with('error', 'Você já possui um livro emprestado!');
        }


        $loanDate = Carbon::createFromDate(null, $request->mes, $request->dia);

        $returnDeadline = $loanDate->copy()->addDays(30);

        $loan = Loans::create([
            'users_cpf' => auth()->user()->cpf,
            'book_isbn' => $book->isbn,
            'loan_date' => $loanDate,
            'return_date' => null, 
            'status' => 'active',
            'return_deadline' => $returnDeadline,
        ]);
        \Log::info('LoanController');
        event(new LoanCreatedEvent($loan));

    }

    // Mostrar um empréstimo específico
    public function show($id)
    {
        $loan = Loans::with(['book', 'user', 'penalties'])->findOrFail($id);

        return Inertia::render('loans/show', [
            'loan' => $loan,
        ]);
    }

    // Editar um empréstimo existente
    public function edit($id)
    {
        $loan = Loans::findOrFail($id);
        $users = Users::all();
        $books = Books::all();

        return Inertia::render('loans/edit', [
            'loan' => $loan,
            'users' => $users,
            'books' => $books,
        ]);
    }

    // Atualizar um empréstimo
    public function update(Request $request, $id)
    {
        $loan = Loans::findOrFail($id);
        $loan->update($request->validated());

        return redirect()->route('loans.index')->with('success', 'Empréstimo atualizado com sucesso!');
    }

    // Excluir um empréstimo
    public function destroy($id)
    {
        $loan = Loans::findOrFail($id);
        $loan->delete();

        return redirect()->route('loans.index')->with('success', 'Empréstimo excluído com sucesso!');
    }
}
