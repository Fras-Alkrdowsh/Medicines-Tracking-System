<?php

namespace App\Listeners;

use App\Mail\StatusUpdatedMail;
use Illuminate\Support\Facades\Mail;
use App\Events\PharmacistStatusChanged;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class PharmacistStatusChangedListener
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
    public function handle(PharmacistStatusChanged $event)
    {
        $pharmacist = $event->pharmacist;
        Mail::to($pharmacist->email)->send(new StatusUpdatedMail($pharmacist));
    }
}
