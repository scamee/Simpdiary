<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;
    protected $fillable = [
        "user_id",
        "title1",
        "title2",
        "set_day1",
        "set_day2",
    ];
}
