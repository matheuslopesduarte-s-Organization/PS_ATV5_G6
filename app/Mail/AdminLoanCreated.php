<?php

namespace App\Mail;

use App\Models\Loans;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class AdminLoanCreated extends Mailable
{
    use Queueable, SerializesModels;

    public $loan;

    public function __construct(Loans $loan)
    {
        $this->loan = $loan;
    }

    public function build()
    {
        return $this->view('emails.admin_loan_created') // A view que você criará
                    ->subject('Novo Empréstimo Criado');
    }
}
