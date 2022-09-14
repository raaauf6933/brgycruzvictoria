<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class AccountCreated extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(
            public $user,
            public $password
        )
    {
        //
    }

    public function build()
    {
        return $this->from(env('MAIL_FROM_ADDRESS'), 'E-Barangay System | Barangay Cruz Victoria')
                    ->subject('E-Barangay System | Barangay Cruz Victoria - Account Created')
                    ->markdown('emails.account_created', [
                        'user' => $this->user,
                        'password' => $this->password,

        ]); // with params
    }
}
