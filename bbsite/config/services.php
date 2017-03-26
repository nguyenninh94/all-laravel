<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Stripe, Mailgun, SparkPost and others. This file provides a sane
    | default location for this type of information, allowing packages
    | to have a conventional place to find your various credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
    ],

    'ses' => [
        'key' => env('SES_KEY'),
        'secret' => env('SES_SECRET'),
        'region' => 'us-east-1',
    ],

    'sparkpost' => [
        'secret' => env('SPARKPOST_SECRET'),
    ],

    'stripe' => [
        'model' => App\User::class,
        'key' => env('STRIPE_KEY'),
        'secret' => env('STRIPE_SECRET'),
    ],

    'google' => [
       'client_id' => '992990589598-002h5ah4c6bg7suvfqmrhgt51bvss8nu.apps.googleusercontent.com',
       'client_secret' => 'PJyYIikYRaja-ovLflYXcaFp',
       'redirect' => 'http://localhost:8000/user/google/callback',
    ],

    'facebook' => [
       'client_id' => '355243024843814',
       'client_secret' => '2bd20f40c1a98226c1172a3aab55a91a',
       'redirect' => 'http://localhost:8000/user/facebook/callback',
    ],

    'twitter' => [
       'client_id' => 'zDNoox4Fb7czLNuSr7VI1brav',
       'client_secret' => 'iyK68m5nEz3lp11KQKlEOqQdUUOaDr8W2ihcvHepFw1zGEpuYO',
       'redirect' => 'http://localhost:8000/user/twitter/callback',
    ],


];
