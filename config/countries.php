<?php

return [
    'phone_numbers_validator' => [
        'Cameroon' => ['country-code' => '+237', 'regex' => '\(237\)\ ?[2368]\d{7,8}$'],
        'Ethiopia' => ['country-code' => '+251', 'regex' => '\(251\)\ ?[1-59]\d{8}$'],
        'Morocco' => ['country-code' => '+212', 'regex' => '\(212\)\ ?[5-9]\d{8}$'],
        'Mozambique' => ['country-code' => '+258', 'regex' => '\(258\)\ ?[28]\d{7,8}$'],
        'Uganda' => ['country-code' => '+256', 'regex' => '\(256\)\ ?\d{9}$'],
    ],
];