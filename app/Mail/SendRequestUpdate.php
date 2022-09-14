<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendRequestUpdate extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(public $request)
    {
        //
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from(env('MAIL_FROM_ADDRESS'), 'E-Barangay System | Barangay Cruz Victoria')
                    ->subject('E-Barangay System | Barangay Cruz Victoria - Services Request Update')
                    ->markdown('emails.send_request_update', [
                        'request' => $this->request,
                        'url' => route('resident.requests.index'),

            ]); // with params
    }
}
