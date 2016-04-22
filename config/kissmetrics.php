<?php
return [
    /*
    |--------------------------------------------------------------------------
    | API
    |--------------------------------------------------------------------------
    |
    | In order to send data to Kissmetrics, application
    | must communicate with corresponding API. For this, api key needs to be
    | specified.
    |
    */
    'api_key' => env('KISSMETRICS_API_KEY', null),
];