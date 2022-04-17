<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ThemeController extends Controller
{
    /**
     * カラーテーマの更新処理
     *
     * @return view
     */
    public function update(Request $request)
    {
        $user = $request->user();
        $theme_keys = array_keys(User::THEMES);

        $request->validate([
            'theme' => ['required', Rule::in($theme_keys)]
        ]);

        $user->theme = $request->theme;
        $user->save();

        $date = $request['date'];

        return redirect()->route('show', ['date' => $date])->with('success', 'テーマを変更しました');
    }
}
