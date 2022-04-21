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


class HomeController extends Controller
{
    /**
     * このコントローラーはログイン時のみ使用可能
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * 初期ログイン時に現在日時の日記を表示する(showにredirect)
     *
     * @return view
     */
    public function index()
    {
        $date = Calendar::getNow();

        /* 初期ログイン時はタグがないため、作成 */
        $tagModel = new Tag();
        $tags =  $tagModel->where('user_id', \Auth::id())->first();
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

        return redirect()->route('show', ['date' => $date]);
    }


    /**
     * ログインユーザーの日記一覧を表示する
     * 未記入ならcreateにredirect
     *
     * @return view
     */
    public function show($date)
    {

        /* 未記入ならcreateにredirect */
        $diary = Diary::where('diary_date', $date)->where('user_id', \Auth::id())->first();

        $user = \Auth::user();
        $partner = $user->partner_id;
        $partner_diary = Diary::where('user_id', $partner)->where('diary_date', $date)->first();

        $images = Image::where('user_id', \Auth::id())->where('diary_date', $date)->get();

        //ログインユーザー・パートナー双方が未記入->create
        if (!isset($diary)) {
            if (!isset($partner_diary)) {
                return redirect()->route('create', ['date' => $date]);
            }
            //パートナーのみ記入->partnerShow
            return redirect()->route('partnerShow', ['date' => $date]);
        }
        //ログインユーザーが記入->show
        return view(
            'show',
            [
                "images" => $images
            ],
            compact('date', 'diary', 'partner_diary')
        );
    }

    /**
     * ログインユーザーの日記一覧を表示する
     *
     * @return view
     */
    public function partnerShow($date)
    {
        $user = \Auth::user();
        $partner = $user->partner_id;
        $partner_diary = Diary::where('user_id', $partner)->where('diary_date', $date)->first();

        $my_diary = Diary::where('user_id', \Auth::id())->where('diary_date', $date)->first();

        $images = Image::where('user_id', $partner)->where('diary_date', $date)->get();

        //ログインユーザー・パートナーが未記入
        if (!isset($partner_diary)) {
            if (!isset($my_diary)) {
                return redirect()->route('create', ['date' => $date]);
            }
            //ログインユーザーのみ記入->partnerShow
            return redirect()->route('show', ['date' => $date]);
        }
        //パートナーが記入->view(partner-show)
        return view(
            'partner-show',
            [
                "images" => $images
            ],
            compact('date', 'partner_diary', 'my_diary', 'partner')
        );
    }

    /**
     * 日記データ新規作成画面
     * 既に記入済みならeditにredirect
     *
     * @return view
     */
    public function create($date)
    {
        $completed = Diary::where('user_id', \Auth::id())->where('diary_date', $date)->first();

        if ($completed) {
            return redirect()->route('edit', ['date' => $date]);
        } else {
            return view(
                'create',
                compact('date')
            );
        }
    }


    /**
     * 日記データの編集画面
     *
     * @return view
     */
    public function edit($date)
    {
        $diary = Diary::where('user_id', \Auth::id())->where('diary_date', $date)->first();

        $images = Image::where('user_id', \Auth::id())->where('diary_date', $date)->get();

        return view(
            'edit',
            ['images' => $images],
            compact('date', 'diary')
        );
    }

    /**
     * 日記データの新規作成処理
     * 画像データを受け取った場合は追加で画像処理も実行
     * @return
     */
    public function store(DiaryValidateRequest $request)
    {

        $validated = $request->validated();

        if ($request->hasFile('diary_imgs')) {
            $files = $request->file('diary_imgs');
            foreach ($files as $upload_image) {
                $path = $upload_image->store('uploads', "public");
                Image::create([
                    "user_id" => \Auth::id(),
                    "diary_date" => $validated["diary_date"],
                    "file_name" => $upload_image->getClientOriginalName(),
                    "file_path" => $path
                ]);
            }
        }

        Diary::create([
            "diary_date" => $validated["diary_date"],
            "user_id" => \Auth::id(),
            "title" => $validated["title"],
            "health_id" => $validated["select"],
            "content" => $validated["content"],
        ]);

        return redirect()->route('show', ['date' => $validated["diary_date"]])->with('success', '日記の追加が完了しました。');
    }

    /**
     * 日記データの編集処理
     *
     * @return
     */
    public function update(DiaryValidateRequest $request)
    {
        $validated = $request->validated();


        if ($request->hasFile('diary_imgs')) {
            $files = $request->file('diary_imgs');
            foreach ($files as $upload_image) {
                $path = $upload_image->store('uploads', "public");
                Image::create([
                    "user_id" => \Auth::id(),
                    "diary_date" => $validated["diary_date"],
                    "file_name" => $upload_image->getClientOriginalName(),
                    "file_path" => $path
                ]);
            }
        }

        Diary::where("user_id", \Auth::id())->where("diary_date", $validated["diary_date"])
            ->update([
                "title" => $validated["title"],
                "health_id" => $validated["select"],
                "content" => $validated["content"],
            ]);

        return redirect()->route('show', ['date' => $validated["diary_date"]])->with('success', '日記の編集が完了しました。');
    }

    /**
     * 日記データの削除処理
     *
     * @return
     */
    public function delete(Request $request)
    {
        $diary_date = $request->diary_date;

        Diary::where("diary_date", $diary_date)->where("user_id", \Auth::id())->delete();
        Image::where("diary_date", $diary_date)->where("user_id", \Auth::id())->delete();

        return redirect()->route('create', ['date' => $diary_date])->with('success', '日記の削除が完了しました。');
    }
}
