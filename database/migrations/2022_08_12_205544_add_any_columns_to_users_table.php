<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAnyColumnsToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            //usersテーブルにカラム追加
            //partner_varified_at, tag1_name, tag1_date, tag2_name, tag2_date 追加
            $table->timestamp('partner_verified_at')->nullable()->after('partner_id');
            $table->string('tag1_title')->comment('タグタイトル1')->default('記念日まで')->after('wanted');
            $table->date('tag1_date')->comment('タグ設定日時1')->default('2023-01-01')->after('wanted');
            $table->string('tag2_title')->comment('タグタイトル2')->default('デートまで')->after('wanted');
            $table->date('tag2_date')->comment('タグ設定日時2')->default('2023-04-01')->after('wanted');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            //カラムの削除
            $table->dropColumn('partner_verified_at');
            $table->dropColumn('tag1_title');
            $table->dropColumn('tag1_date');
            $table->dropColumn('tag2_title');
            $table->dropColumn('tag2_date');
        });
    }
}
