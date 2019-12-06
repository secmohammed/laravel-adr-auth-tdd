<?php


namespace App\Users\Domain\Listeners;


use App\Users\Domain\Events\ResendActivation;
use App\Users\Domain\Mails\Activation;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;

class ResendActivationMail implements ShouldQueue
{
    use Queueable;

    public function handle(ResendActivation $event){
        Mail::to($event->user->email)->send(new Activation($event->user, $event->user->activation));
    }

}
