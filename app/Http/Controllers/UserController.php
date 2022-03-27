<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserValidateRequest;
use App\Http\Requests\PasswordValidateRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class UserController extends Controller
{

    /**
     * ユーザー名の変更処理
     *
     * @return
     */
    public function userUpdate(UserValidateRequest $request)
    {
        $validated = $request->validated();

        User::where('id', $validated['user_id'])->update(
            [
                'name' => $validated['username']
            ]
        );

        return redirect()->route('show', ['date' => $validated['date']])->with('success', 'アカウント情報を変更しました。');
    }

    /**
     * パスワードの変更処理
     *
     * @return
     */
    public function passwordUpdate(PasswordValidateRequest $request)
    {
        $validated = $request->validated();

        $user = Auth::user();
        $user->password = bcrypt($request->get('new_password'));
        $user->save();

        return redirect()->route('show', ['date' => $validated['date']])->with('success', 'パスワードを変更しました。');
    }
}
