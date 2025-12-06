<?php

return [
    'default' => 'etisalat',

    'etisalat' => [
        'key' => env('SMS_ACCESS_KEY_ID'),
        'secret' => env('SM_SECRET_ACCESS_KEY'),
    ],

    'smsglobal' => [
        'key' => env('SMS_SG_ACCESS_KEY_ID'),
        'secret' => env('SMS_SG_SECRET_ACCESS_KEY'),
    ],
];
