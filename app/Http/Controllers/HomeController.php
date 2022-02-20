<?php

namespace App\Http\Controllers;

use App\Facades\Calendar;
use app\Services\CalendarService;
use Illuminate\Http\Request;


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

    public function show($id)
    {
        $user = \Auth::user();

        return view(
            'show',
            compact('user'),
            [
                'weeks'         => Calendar::getWeeks(),
                'month'         => Calendar::getMonth(),
                'prev'          => Calendar::getPrev(),
                'next'          => Calendar::getNext(),
                'date'          => Calendar::getDay($id),

            ]
        );
    }

    public function store(Request $request)
    {
        $data = $request->all();

        dd($data);
        $user = \Auth::user();


        return view(
            'show',
            compact('user'),
            [
                'weeks'         => Calendar::getWeeks(),
                'month'         => Calendar::getMonth(),
                'prev'          => Calendar::getPrev(),
                'next'          => Calendar::getNext(),
            ]
        );
    }
}
