<?php

namespace App\Listeners;

use App\Events\LoanCreatedEvent;
use App\Mail\LoanCreated;
use App\Mail\AdminLoanCreated;
use App\Models\Users;
use Illuminate\Support\Facades\Mail;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendLoanCreatedNotification implements ShouldQueue
{
    public function handle(LoanCreatedEvent $event)
    {
        Mail::to($event->loan->user->email)->send(new LoanCreated($event->loan));
        \Log::info('SendLoanCreatedNotification');
        $admins = Users::where('user_type', 'admin')->get();
        foreach ($admins as $admin) {
            Mail::to($admin->email)->send(new AdminLoanCreated($event->loan));
        }
    }
}
