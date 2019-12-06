<?php

namespace App\Users\Domain\Mails;

use App\Users\Domain\Models\PasswordReset;
use App\Users\Domain\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ResetPassword extends Mailable
{
    use Queueable, SerializesModels;
    public $user;
    public $token;

    public function __construct(User $user, PasswordReset $passwordReset)
    {
        $this->user = $user;
        $this->token = $passwordReset->token;
    }

    public function build()
    {
        return $this->markdown('mails.resetPassword');
    }
}
