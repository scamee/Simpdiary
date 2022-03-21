<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Facades\Calendar;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\DiaryValidateRequest;
use App\Models\Diary;
use App\Models\Image;
use App\Models\Tag;
use Carbon\Carbon;
use Illuminate\Auth\Events\Validated;

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
        $diary = Diary::where('diary_date', $date)->where('user_id', \Auth::id())->first();

        $tagModel = new Tag();
        $tags =  $tagModel->where('user_id', \Auth::id())->first();

        $images = Image::where('user_id', \Auth::id())->where('diary_date', $date)->get();

        if (!isset($tags)) {
            $title_01 = '付き合ってから';
            $now = Carbon::now();
            $now_1 = $now->subDays(100);

            $title_02 = 'デートまで';
            $now = Carbon::now();
            $now_2 = $now->addDays(30);

            $datum = [
                ['user_id' => \Auth::id(), 'title' => $title_01, 'set_day' => $now_1],
                ['user_id' => \Auth::id(), 'title' => $title_02, 'set_day' => $now_2],
            ];

            DB::table('tags')
                ->insert(
                    $datum
                );
        }

        return view(
            'show',
            [
                "images" => $images
            ],
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

        if ($request->hasFile('diary_img')) {
            $upload_image = $validated['diary_img'];
            $path = $upload_image->store('uploads', "public");
            Image::create([
                "user_id" => \Auth::id(),
                "diary_date" => $validated["diary_date"],
                "file_name" => $upload_image->getClientOriginalName(),
                "file_path" => $path
            ]);
        }

        Diary::create([
            "diary_date" => $validated["diary_date"],
            "user_id" => \Auth::id(),
            "title" => $validated["title"],
            "health_id" => $validated["select"],
            "content" => $validated["content"],
        ]);

        $diary_date = $validated["diary_date"];
        return redirect()->route('show', ['date' => $diary_date]);
    }

    //更新
    public function update(DiaryValidateRequest $request)
    {
        $validated = $request->validated();

        $diary_date = $validated["diary_date"];

        if ($request->hasFile('diary_img')) {
            $upload_image = $validated['diary_img'];
            $path = $upload_image->store('uploads', "public");
            Image::create([
                "user_id" => \Auth::id(),
                "diary_date" => $validated["diary_date"],
                "file_name" => $upload_image->getClientOriginalName(),
                "file_path" => $path
            ]);
        }

        Diary::where("user_id", \Auth::id())->where("diary_date", $diary_date)
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
