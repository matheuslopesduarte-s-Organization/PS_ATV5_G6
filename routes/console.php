<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote')->hourly();

Artisan::command('makeadmin {email}', function ($email) {
    $user = App\Models\Users::where('email', $email)->first();
    
    if (!$user) {
        $this->error("User {$email} not found.");
        return;
    }
    
    $user->user_type = 'admin';
    $user->save();
    $this->info("User {$email} is now an admin.");
})->purpose('Make a user an admin')->daily();