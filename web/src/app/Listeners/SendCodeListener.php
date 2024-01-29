<?php

namespace App\Listeners;

use App\Events\SendCodeEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendCodeMail;

class SendCodeListener
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(SendCodeEvent $event): void
    {
        //
        Mail::to($event->user->email)->send(new SendCodeMail($event->user));
    }
}
