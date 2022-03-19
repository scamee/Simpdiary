<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ImageController extends Controller
{
    public function update(DiaryValidateRequest $request)
    {
        $validated = $request->validated();

        $diary_date = $validated["diary_date"];

        Diary::where("diary_date", $diary_date)
            ->update([
                "title" => $validated["title"],
                "health_id" => $validated["select"],
                "content" => $validated["content"],
            ]);

        return redirect()->route('show', ['date' => $diary_date]);
    }

    //削除
    public function delete(Request $request)
    {
        $user = \Auth::user();
        $inputs = $request->all();
        $diary_date = $inputs["diary_date"];

        Diary::where("diary_date", $diary_date)->where("user_id", $user['id'])->delete();

        return redirect()->route('show', ['date' => $diary_date])->with('success', '日記の削除が完了しました。');
    }
}
