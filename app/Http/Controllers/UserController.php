<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserValidateRequest;
use App\Models\User;

class UserController extends Controller
{
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
}
