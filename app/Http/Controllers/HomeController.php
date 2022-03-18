<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Facades\Calendar;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\DiaryValidateRequest;
use App\Http\Requests\TagValidateRequest;
use App\Models\Diary;
use App\Models\Tag;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        /* $date = Calendar::getWeeks(); */

        $date = Calendar::getNow();

        return view(
            'home',
            compact('date')
        );
    }



    //showメソッド
    public function show($date)
    {
        /* if (!isset($urlpram->date)) {
            $date = Calendar::getNow();
        } else {
            $date = $urlpram->date;
        } */

        $user = \Auth::user();
        $diary = Diary::where('diary_date', $date)->where('user_id', $user['id'])->first();

        $tagModel = new Tag();
        $tags =  $tagModel->where('user_id', \Auth::id())->first();

        if (!isset($tags)) {
            $title_01 = '付き合ってから';
            $title_02 = 'デートまで';
            $now = Calendar::getNow();

            $datum = [
                ['user_id' => \Auth::id(), 'title' => $title_01, 'set_day' => $now],
                ['user_id' => \Auth::id(), 'title' => $title_02, 'set_day' => $now],
            ];

            DB::table('tags')
                ->insert(
                    $datum
                );
        }

        return view(
            'show',
            compact('date', 'diary')
        );
    }

    //createメソッド
    public function create($date)
    {
        return view(
            'create',
            compact('date')
        );
    }


    //編集画面
    public function edit($date)
    {
        /* $user = \Auth::user(); */

        //URL正規表現確認 -> 一致しなければ404notfound
        /* $preg = '/^[0-9]{4}-[0-9]{2}-[0-9]{1,2}$/';
        if (!preg_match($preg, $date)) {
            abort(404);
        } */

        //消す
        $diary = Diary::select('title', 'health_id', 'content')->where('user_id', \Auth::id())->where('diary_date', $date)->first();

        return view(
            'edit',
            compact('date', 'diary')
        );
    }

    //編集アクション
    public function store(DiaryValidateRequest $request)
    {

        $validated = $request->validated();

        if (isset($validated['diary_img'])) {

            $upload_image = $validated['diary_img'];
            $path = $upload_image->store('uploads', "public");

            Diary::create([
                "diary_date" => $validated["diary_date"],
                "user_id" => $validated["user_id"],
                "title" => $validated["title"],
                "health_id" => $validated["select"],
                "content" => $validated["content"],
                "file_name" => $upload_image->getClientOriginalName(),
                "file_path" => $path
            ]);
        } else {
            Diary::create([
                "diary_date" => $validated["diary_date"],
                "user_id" => $validated["user_id"],
                "title" => $validated["title"],
                "health_id" => $validated["select"],
                "content" => $validated["content"],
            ]);
        }

        $diary_date = $validated["diary_date"];
        return redirect()->route('show', ['date' => $diary_date]);
    }

    //更新
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

    public function tagupdate(TagValidateRequest $request)
    {

        $validated = $request->validated();

        $user = \Auth::user();

        Tag::where("user_id", $user['id'])->where("id", $request['id'])
            ->update([
                "title" => $validated["tag-title"],
                "set_day" => $validated["tag-setday"]
            ]);

        return redirect()->route('show', ['date' => '2022-03-14']);
    }
}
