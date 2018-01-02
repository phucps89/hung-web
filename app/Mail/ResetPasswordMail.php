<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ResetPasswordMail extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public $email, $name, $newPassword;

    public function __construct($email, $name, $newPassword)
    {
        //
        $this->email = $email;
        $this->name = $name;
        $this->newPassword = $newPassword;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this
            ->from("phuctran.it.89@gmail.com", "Phuc Dai Ca")
            ->subject("Reset Password")
            ->to($this->email, $this->name)
            ->view('reset_password_mail');
    }
}
