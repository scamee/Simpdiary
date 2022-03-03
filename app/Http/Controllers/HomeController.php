<?php

namespace App\Http\Controllers;

use App\Facades\Calendar;
use Illuminate\Http\Request;
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
            'home',
            [
                'weeks'         => Calendar::getWeeks(),
                'month'         => Calendar::getMonth(),
                'prev'          => Calendar::getPrev(),
                'next'          => Calendar::getNext(),
            ]
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
        $diary = Diary::where('user_id', $user['id'])->where('diary_date', $date)->first();


        return view(
            'show',
            compact('user', 'date', 'diary'),
            [
                'weeks'         => Calendar::getWeeks(),
                'month'         => Calendar::getMonth(),
                'prev'          => Calendar::getPrev(),
                'next'          => Calendar::getNext(),
            ]
        );
    }

    //createメソッド
    public function create($date)
    {
        $user = \Auth::user();

        return view(
            'create',
            compact('user', 'date'),
            [
                'weeks'         => Calendar::getWeeks(),
                'month'         => Calendar::getMonth(),
                'prev'          => Calendar::getPrev(),
                'next'          => Calendar::getNext(),
            ]
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
        $diary = Diary::select('title', 'health', 'content')->where('user_id', $user['id'])->where('diary_date', $date)->first();

        return view(
            'edit',
            compact('user', 'date', 'diary'),
            [
                'weeks'         => Calendar::getWeeks(),
                'month'         => Calendar::getMonth(),
                'prev'          => Calendar::getPrev(),
                'next'          => Calendar::getNext(),
            ]
        );
    }

    //編集アクション
    public function store(Request $request)
    {
        $data = $request->all();

        $Diary_test = Diary::insertGetId([
            "diary_date" => $data["diary_date"],
            "user_id" => $data["user_id"],
            "title" => $data["title"],
            "health" => $data["select"],
            "content" => $data["content"],
        ]);

        // リダイレクト処理
        return redirect()->route('home');
    }
}
