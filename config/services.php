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
	
	//Social media....
	
	'facebook' => [
	     'client_id' => '',
		 'client_secret' => '',
		 'redirect' => '',
	 ],
	 
	 'google' => [
	     'client_id' => '',
		 'client_secret' => '',
		 'redirect' => '',
	 ],
	 
	  'paytm-wallet' => [
        'env' => 'local', // values : (local | production)
        'merchant_id' => env('YOUR_MERCHANT_ID'),
        'merchant_key' => env('YOUR_MERCHANT_KEY'),
        'merchant_website' => env('YOUR_WEBSITE'),
        'channel' => env('YOUR_CHANNEL'),
        'industry_type' => env('YOUR_INDUSTRY_TYPE'),
    ],
'payumoney' => [                         // PayUMoney Parameters
        'merchantKey'  => env('INDIPAY_MERCHANT_KEY', ''),
        'salt'  => env('INDIPAY_SALT', ''),
        'workingKey' => env('INDIPAY_WORKING_KEY', ''),
        // Should be route address for url() function
        'successUrl' => env('INDIPAY_SUCCESS_URL', 'indipay/response'),
        'failureUrl' => env('INDIPAY_FAILURE_URL', 'indipay/response'),
    ],
    

];
