<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class InviteMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($invite_url, $user_name)
    {
        $this->invite_url = $invite_url;
        $this->user_name = $user_name;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('招待メール')
            ->view('emails.partner_approval')
            ->with(['invite_url' => $this->invite_url, 'user_name' => $this->user_name]);
    }
}
