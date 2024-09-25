<?php

namespace App\Events;

use App\Models\Loans;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class LoanCreatedEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $loan;

    public function __construct(Loans $loan)
    {
        $this->loan = $loan;
        \Log::info('LoanCreatedEvent');
    }

    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
