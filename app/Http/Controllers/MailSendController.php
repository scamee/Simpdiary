<?php

namespace App\Http\Controllers;

use Mail;

class MailSendController extends Controller
{
    public function send()
    {

        $data = [];

        Mail::send('emails.partner_approval', $data, function ($message) {
            $message->to('abc987@example.com')->subject('件名');
        });
    }
}
