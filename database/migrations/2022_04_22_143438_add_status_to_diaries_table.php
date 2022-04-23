<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddStatusToDiariesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('diaries', function (Blueprint $table) {
            $table->string('mood_id')
                ->default('mood_1')->after('health_id')->comment('気分= 良い:1 普通:2 悪い:3');
            $table->string('weather_id')
                ->default('weather_1')->after('health_id')->comment('天気= 晴れ:1 くもり:2 雨:3 雪:4 あられ:5');
            $table->integer('status')
                ->default(1)->after('user_id')->comment('状態= 公開:1 下書き:2');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('diaries', function (Blueprint $table) {
            $table->dropColumn('mood_id', 'weather_id', 'status');
        });
    }
}
