<?php

namespace App\Users\Domain\Listeners;

use App\Users\Domain\Events\UserWasRegistered;
use App\Users\Domain\Mails\Activation;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;

class SendActivationMail implements ShouldQueue
{
    use Queueable;
    /**
     * Handle the event.
     *
     * @param  ActivationEvent  $event
     * @return void
     */
    public function handle(UserWasRegistered $event)
    {

        Mail::to($event->user->email)->send(new Activation($event->user, $event->user->activation));
    }
}
