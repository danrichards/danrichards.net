<?php

return [
    'email' => 'danrichardsri@gmail.com',
    'developers' => '108.34.215.71',
    'views' => [
        'nav' => [
            'danrichards.net' => [
//                'Home' => '/',
                'Resume' => 'Resume.DRichards.Software.Engineer.pdf',
//                'Talk' => 'contact'
            ],
            'danrichards.laravel' => [
                'Home' => '/',
                'Resume' => 'Resume.DRichards.Software.Engineer.pdf',
                'Blog' => 'blog',
                'Talk' => 'contact'
            ]
        ]
    ],
    /*
     * Google reCAPTCHA API keys
     *
     * https://developers.google.com/recaptcha/docs/php
     */
    'recaptcha' => [
        'danrichards.laravel' => [
            'public' => env('RECAPTCHA_PUBLIC'),
            'private' => env('RECAPTCHA_PRIVATE')
        ],
        'danrichards.net' => [
            'public' => env('RECAPTCHA_PUBLIC'),
            'private' => env('RECAPTCHA_PRIVATE')
        ]
    ]
];