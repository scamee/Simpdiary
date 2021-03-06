<?php

namespace App\Http\Controllers;

use App\Http\Requests\TagValidateRequest;
use App\Models\Tag;

class TagController extends Controller
{

    /**
     * ウィジェットの更新処理
     *
     * @return
     */
    public function tagUpdate(TagValidateRequest $request)
    {
        $validated = $request->validated();

        Tag::where("user_id", \Auth::id())->where("id", $request['id'])
            ->update([
                "title" => $validated["tag-title"],
                "set_day" => $validated["tag-setday"]
            ]);

        return redirect()->route('home');
    }
}
