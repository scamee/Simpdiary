<?php

namespace App\Http\Controllers;

use App\Http\Requests\WidgetValidateRequest;
use App\Models\User;

class WidgetController extends Controller
{

    /**
     * ウィジェット1の更新処理
     *
     * @return
     */
    public function widget1Update(WidgetValidateRequest $request)
    {
        $validated = $request->validated();


        User::where("id", \Auth::id())
            ->update([
                "tag1_title" => $validated["tag-title"],
                "tag1_date" => $validated["tag-setday"]
            ]);

        return redirect()->route('home');
    }

    /**
     * ウィジェット2の更新処理
     *
     * @return
     */
    public function widget2Update(WidgetValidateRequest $request)
    {
        $validated = $request->validated();

        User::where("id", \Auth::id())
            ->update([
                "tag2_title" => $validated["tag-title"],
                "tag2_date" => $validated["tag-setday"]
            ]);

        return redirect()->route('home');
    }
}
