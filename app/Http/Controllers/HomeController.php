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

    public function create()
    {
        $user = \Auth::user();
        return view('create', compact('user'));
    }

    public function show($date)
    {
        $user = \Auth::user();
        $diaries = Diary::where('user_id', $user['id'])->where('diary_date', $date)->get();



        return view(
            'show',
            compact('user', 'diaries'),
            [
                'weeks'         => Calendar::getWeeks(),
                'month'         => Calendar::getMonth(),
                'prev'          => Calendar::getPrev(),
                'next'          => Calendar::getNext(),
                'date'          => Calendar::getDay($date)
            ]
        );
    }

    public function edit($date)
    {
        $user = \Auth::user();

        return view(
            'edit',
            compact('user', 'date'),
            [
                'weeks'         => Calendar::getWeeks(),
                'month'         => Calendar::getMonth(),
                'prev'          => Calendar::getPrev(),
                'next'          => Calendar::getNext(),
            ]
        );
    }

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
