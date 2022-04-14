<?php

namespace App\Http\Controllers;

use App\Mail\InviteMail;
use Illuminate\Http\Request;
use App\Models\User;
use Mail;

class MailSendController extends Controller
{
    public function send(Request $request)
    {
        $inputs = $request->only('diary_date');

        $user = User::where('id', \Auth::id())->first();
        $user_name = $user->name;
        $token_url = $user->invitation_token;
        $invite_url = url('/invitation') . '/' . $token_url . '?user=' . \Auth::id();

        Mail::to($request->email)->send(new InviteMail($invite_url, $user_name));

        $diary_date = $inputs["diary_date"];
        return redirect()->route('show', ['date' => $diary_date])->with('success', '招待メールを送信しました。');
    }

    public function invitation($token)
    {
        /* $invate_user = ''; */

        if (isset($_GET['user'])) {
            $invate_user_id = $_GET['user'];
            $invate_user = USER::where('id', $invate_user_id)->where('invitation_token', $token)->first();

            USER::where('id', \Auth::id())
                ->update(
                    [
                        'partner_id' => $invate_user['id']
                    ]
                );

            USER::where('id', $invate_user['id'])
                ->update(
                    [
                        'partner_id' => \Auth::id()
                    ]
                );
        }
        return redirect()->route('home');
    }
}
