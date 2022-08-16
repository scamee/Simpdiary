<?php

namespace App\Http\Controllers;

use App\Http\Requests\TagValidateRequest;
use Illuminate\Http\Request;
use App\Models\User;

class TagController extends Controller
{

    /**
     * ウィジェット1の更新処理
     *
     * @return
     */
    public function tag1Update(TagValidateRequest $request)
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
    public function tag2Update(TagValidateRequest $request)
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
