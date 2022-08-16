<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    const THEME_NORMAL = 'normal';
    const THEME_DARK = 'dark';
    const THEMES = [
        self::THEME_NORMAL => 'ノーマル',
        self::THEME_DARK => 'ダークモード'
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'invitation_token',
        'partner_id',
        'birthday',
        'hobby',
        'dream',
        'wanted',
        'theme',
        'file_path',
        'file_name',
        //Widgets(1,2)
        'tag1_title',
        'tag1_date',
        'tag2_title',
        'tag2_date'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
