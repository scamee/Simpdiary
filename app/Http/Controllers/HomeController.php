<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StorePostRequest;
use App\Models\Diary;

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

        return view(
            'home'
        );
    }



    //showメソッド
    public function show($date)
    {
        //URL正規表現確認 -> 一致しなければ404notfound
        $preg = '/^[0-9]{4}-[0-9]{2}-[0-9]{1,2}$/';
        if (!preg_match($preg, $date)) {
            abort(404);
        }

        $user = \Auth::user();
        $diary = Diary::where('diary_date', $date)->where('user_id', $user['id'])->first();


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
        $user = \Auth::user();

        /* //正規表現確認
        $preg = '/^[0-9]{4}-[0-9]{2}-[0-9]{2}$/';
        if (!preg_match($preg, $date)) {
            $error = "正しくありません";
        } */

        //消す
        $diary = Diary::select('title', 'health_id', 'content')->where('user_id', $user['id'])->where('diary_date', $date)->first();

        return view(
            'edit',
            compact('date', 'diary')
        );
    }

    //編集アクション
    public function store(StorePostRequest $request)
    {
        $validated = $request->validated();

        $diary_date = $validated["diary_date"];

        Diary::create([
            "diary_date" => $validated["diary_date"],
            "user_id" => $validated["user_id"],
            "title" => $validated["title"],
            "health_id" => $validated["select"],
            "content" => $validated["content"],
        ]);

        return redirect()->route('show', ['date' => $diary_date]);
    }

    //更新
    public function update(Request $request)
    {
        $inputs = $request->all();
        $diary_date = $inputs["diary_date"];

        Diary::where("diary_date", $diary_date)
            ->update([
                "title" => $inputs["title"],
                "health_id" => $inputs["select"],
                "content" => $inputs["content"],
            ]);

        return redirect()->route('show', ['date' => $diary_date]);
    }

    //削除
    public function delete(Request $request)
    {
        $inputs = $request->all();
        $diary_date = $inputs["diary_date"];

        Diary::where("diary_date", $diary_date)->delete();

        return redirect()->route('show', ['date' => $diary_date])->with('success', '日記の削除が完了しました。');
    }
}
