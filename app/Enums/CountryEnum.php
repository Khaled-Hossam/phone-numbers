<?php

namespace App\Enums;

class CountryEnum{
    const CAMEROON = [
        'country_name' => 'Cameroon',
        'country_code' => 237,
        'valid_phone_regex' => '#\(237\)\ ?[2368]\d{7,8}$#',
    ];

    const ETHIOPIA = [
        'country_name' => 'Ethiopia',
        'country_code' => 251,
        'valid_phone_regex' => '#\(251\)\ ?[1-59]\d{8}$#',
    ];

    const MOROCCO = [
        'country_name' => 'Morocco',
        'country_code' => 212,
        'valid_phone_regex' => '#\(212\)\ ?[5-9]\d{8}$#',
    ];

    const MOZAMBIQUE = [
        'country_name' => 'Mozambique',
        'country_code' => 258,
        'valid_phone_regex' => '#\(258\)\ ?[28]\d{7,8}$#',
    ];

    const UGANDA = [
        'country_name' => 'Uganda',
        'country_code' => 256,
        'valid_phone_regex' => '#\(256\)\ ?\d{9}$#',
    ];

    const DATA = [
        self::CAMEROON['country_code'] => self::CAMEROON,
        self::ETHIOPIA['country_code'] => self::ETHIOPIA,
        self::MOROCCO['country_code'] => self::MOROCCO,
        self::MOZAMBIQUE['country_code'] => self::MOZAMBIQUE,
        self::UGANDA['country_code'] => self::UGANDA,
    ];

}
