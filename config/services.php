<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Mailgun, Postmark, AWS and more. This file provides the de facto
    | location for this type of information, allowing packages to have
    | a conventional file to locate the various service credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
        'endpoint' => env('MAILGUN_ENDPOINT', 'api.mailgun.net'),
    ],

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],

    'google' => [
        'client_id' => '525730356634-qnnjl50tbhid8082fcbra530l7sng1c2.apps.googleusercontent.com',
        'client_secret' => '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',
        'redirect' => 'http://127.0.0.1:8000/auth/google/callback',
    ],

    'linkedin' => [
        'client_id' => '77i33b3ypka8eb',
        'client_secret' => '3fgIyCXJo4ClvMNh',
        'redirect' => 'http://127.0.0.1:8000/auth/linkedin/callback'
    ],
 
];
