<?php
return [
    'timeout' => 30, // timeout in seconds
    /*
    |--------------------------------------------------------------------------
    | Channel Configuration
    |--------------------------------------------------------------------------
    */
    'channel' => [
        /*
        |--------------------------------------------------------------------------
        | Channel Token
        |--------------------------------------------------------------------------
        */
        'token' => env('CRUNCHZAPP_CHANNEL_TOKEN'),
    ],
    /*
    |--------------------------------------------------------------------------
    | Global Configuration
    |--------------------------------------------------------------------------
    */
    'global' => [
        /*
        |--------------------------------------------------------------------------
        | Global Token
        |--------------------------------------------------------------------------
        */
        'token' => env('CRUNCHZAPP_GLOBAL_TOKEN')
    ],
    /*
    |--------------------------------------------------------------------------
    | One Time Password Configuration
    |--------------------------------------------------------------------------
    */
    'otp' => [
        /*
        |--------------------------------------------------------------------------
        | OTP Code Configuration
        |--------------------------------------------------------------------------
        */
        'code' => [
            'length' => 4, // otp code length
            'useLetter' => true, // otp code use letter
            'useNumber' => true, // otp code use number
            'allCapital' => true, // otp code capitalization
            'name' => env('APP_NAME'), // otp name
            'expires' => 1800 // in seconds ( 30 minutes )
        ],
        /*
        |--------------------------------------------------------------------------
        | OTP Link Configuration
        |--------------------------------------------------------------------------
        */
        'link' => [
            'prompt' => 'Give me a code to login at '.env('APP_NAME'),
            'respond' => [
                'success' => 'Here is your code, make sure it still safe and secret!',
                'failed' => 'Your number or code was not valid'
            ],
            'callback' => [
                'success' => 'https://www.domain.com/validate/success',
                'failed' => 'https://www.domain.com/validate/failed'
            ]
        ]
    ]
];
