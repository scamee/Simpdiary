<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserValidateRequest;
use App\Http\Requests\PasswordValidateRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class UserController extends Controller
{

    /**
     * ユーザー情報の変更処理
     *
     * @return
     */
    public function userUpdate(UserValidateRequest $request)
    {
        $validated = $request->validated();

        User::where('id', Auth::id())->update(
            [
                'name' => $validated['username'],
                'birthday' => $validated['birthday'],
                'hobby' => $validated['hobby'],
                'dream' => $validated['dream'],
                'wanted' => $validated['wanted'],
            ]
        );

        if ($request->hasFile('user_img')) {
            $upload_image = $validated['user_img'];
            $path = $upload_image->store('user_img', "public");
            User::where('id', Auth::id())->update(
                [
                    "file_name" => $upload_image->getClientOriginalName(),
                    "file_path" => $path
                ]
            );
        }

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
