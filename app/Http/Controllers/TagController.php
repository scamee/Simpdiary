<?php

namespace App\Http\Controllers;

use App\Http\Requests\TagValidateRequest;
use App\Models\Tag;

class TagController extends Controller
{
    public function tagupdate(TagValidateRequest $request)
    {
        $validated = $request->validated();

        Tag::where("user_id", \Auth::id())->where("id", $request['id'])
            ->update([
                "title" => $validated["tag-title"],
                "set_day" => $validated["tag-setday"]
            ]);

        return redirect()->route('show', ['date' => '2022-03-14']);
    }
}
