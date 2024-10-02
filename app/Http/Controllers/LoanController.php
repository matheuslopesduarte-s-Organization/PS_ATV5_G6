<?php

namespace App\Http\Controllers;

use App\Models\Loans;
use App\Models\Books;
use App\Models\Users;
use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Http\Resources\BookResource;

class LoanController extends Controller
{
    public function index()
    {

        $loans = Loans::with(['book', 'user'])->get();

        $loans = $loans->map(function ($loan) {
            return [
                'id' => $loan->id,
                'book' => new BookResource($loan->book),
                'user' => $loan->user,
                'loan_date' => $loan->loan_date,
                'return_date' => $loan->return_date,
                'status' => $loan->status,
            ];
        });

        $users = Users::where('guardian_cpf', auth()->user()->cpf)->get();

        return Inertia::render('seusLivrosView', [
            'loans' => $loans,
        ]);



    }

    public function create($id)
    {

        $book = Books::findOrFail($id);

        return Inertia::render('emprestimoView', [
            'book' => new BookResource($book),
        ]);

    }

    public function store(Request $request, $id)
    {
        $book = Books::findOrFail($id);

        $loan = Loans::where('users_cpf', auth()->user()->cpf)->where('status', '!=', 'returned')->first();
        if ($loan) {
            return redirect()->back()->withErrors(['error' => 'Você já possui um livro emprestado!']);
        }
        if ($book->stock <= 0) {
            return redirect()->back()->withErrors(['error' => 'Não há exemplares disponíveis para empréstimo!']);
        }

        $loan = Loans::create([
            'users_cpf' => auth()->user()->cpf,
            'book_isbn' => $book->isbn,
            'loan_date' => null,
            'return_date' => null,
            'status' => 'ready',
        ]);

        $book->stock--;
        $book->save();

    }

    public function show($id)
    {
        $loan = Loans::with(['book', 'user', 'penalties'])->findOrFail($id);

        return Inertia::render('loans/show', [
            'loan' => $loan,
        ]);
    }

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

    public function update(Request $request, $id)
    {
        $loan = Loans::findOrFail($id);
        $loan->update($request->validated());

        return redirect()->route('loans.index')->with('success', 'Empréstimo atualizado com sucesso!');
    }

    public function destroy($id)
    {
        $loan = Loans::findOrFail($id);
        $loan->delete();

        return redirect()->route('loans.index')->with('success', 'Empréstimo excluído com sucesso!');
    }
}
