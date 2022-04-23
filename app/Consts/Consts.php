<?php

namespace App\Consts;

class Consts
{
    public const HEALTH_GOOD = 'health_1';
    public const HEALTH_NORMAL = 'health_2';
    public const HEALTH_BAT = 'health_3';
    public const HEALTH_LIST = [
        '良い' => self::HEALTH_GOOD,
        '普通' => self::HEALTH_NORMAL,
        '悪い' => self::HEALTH_BAT,
    ];
    public const WEATHER_CLEAR = 'weather_1';
    public const WEATHER_CLOUDY = 'weather_2';
    public const WEATHER_RAIN = 'weather_3';
    public const WEATHER_THUNDER = 'weather_4';
    public const WEATHER_SNOW = 'weather_5';
    public const WEATHER_GRAUPEL = 'weather_6';
    public const WEATHER_LIST = [
        '晴れ' => self::WEATHER_CLEAR,
        'くもり' => self::WEATHER_CLOUDY,
        '雨' => self::WEATHER_RAIN,
        '雷' => self::WEATHER_THUNDER,
        '雪' => self::WEATHER_SNOW,
        'あられ' => self::WEATHER_GRAUPEL,
    ];

    public const MOOD_GOOD = 'mood_1';
    public const MOOD_NORMAL = 'mood_2';
    public const MOOD_BAT = 'mood_3';
    public const MOOD_LIST = [
        '良い' => self::MOOD_GOOD,
        '普通' => self::MOOD_NORMAL,
        '悪い' => self::MOOD_BAT,
    ];
}
