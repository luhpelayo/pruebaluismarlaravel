


<?php 
return [ 
    'client_id' => env('PAYPAL_CLIENT_ID',''),
    'secret' => env('PAYPAL_SECRET',''),
    'settings' => array(
        'mode' => env('PAYPAL_MODE','sandbox'),
        'AUTHENTICATION_STATUS'=>'X',
        'http.ConnectionTimeOut' => 30,
        'LANDINGPAGE'=>'Billing',
        'log.LogEnabled' => true,
        'log.FileName' => storage_path() . '/logs/paypal_new.log',
        'log.LogLevel' => 'ERROR'
    ),
];