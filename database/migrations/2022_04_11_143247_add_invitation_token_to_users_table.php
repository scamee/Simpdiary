<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddInvitationTokenToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('invitation_token', 50)->after('password')
                ->unique()
                ->nullable()
                ->default(null);
            $table->integer('partner_id')->after('password')
                ->unique()
                ->nullable()
                ->default(null);
            $table->date('birthday')->after('password')
                ->nullable()
                ->default(null);
            $table->string('hobby', 10)->after('password')
                ->nullable()
                ->default(null);
            $table->string('dream', 10)->after('password')
                ->nullable()
                ->default(null);
            $table->string('wanted', 10)->after('password')
                ->nullable()
                ->default(null);
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
            $table->dropColumn('invitation_token', 'partner_id');
        });
    }
}
