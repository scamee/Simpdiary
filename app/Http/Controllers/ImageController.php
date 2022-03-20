<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Image;

class ImageController extends Controller
{
    public function imageUpdate(Request $request)
    {
        $inputs = $request->all();
        $diary_date = $request["diary_date"];

        if ($request->hasFile('diary_img')) {
            /* 元画像のstorageファイル削除 */
            Storage::delete('public/' . $request->file_path);

            $upload_image = $inputs['diary_img'];
            $path = $upload_image->store('uploads', "public");

            Image::where("user_id", \Auth::id())->where("diary_date", $diary_date)->where("id", $inputs['id'])
                ->update([
                    "file_name" => $upload_image->getClientOriginalName(),
                    "file_path" => $path,
                ]);
        }

        return redirect()->route('show', ['date' => $diary_date]);
    }

    public function imageDelete(Request $request)
    {
        $inputs = $request->all();
        $diary_date = $inputs["diary_date"];

        /* DB削除 */
        Image::where("user_id", \Auth::id())->where("diary_date", $diary_date)->where("id", $inputs['id'])->delete();
        /* storageファイル削除 */
        Storage::delete('public/' . $request->file_path);

        return redirect()->route('show', ['date' => $diary_date])->with('success', '画像の削除が完了しました。');
    }
}
