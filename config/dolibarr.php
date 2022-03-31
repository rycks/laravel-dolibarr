<?php

return [

    /*
     * In case of login/pass authentication, please set theses keys
     * Note: you have to use login+password OR api_key
     *
     */
    'login'=> env('DOLIBARR_USER_LOGIN',""),
    'password' => env('DOLIBARR_USER_PASSWORD',""),

    /*
     * In case of dolibarr uses .htaccess like authentication
     * system
     */
    'auth_access' => env('DOLIBARR_AUTH_ACCESS',false),

    /*
     * In case of direct API authentication
     * That information is available on dolibarr/user card
     *
     */
    'api_key' => env('DOLIBARR_API_KEY',""),

    /*
     * Your dolibarr URI, https://mydolibarr.cap-rel.fr/ for example
     *
     */
    'server_uri' => env('DOLIBARR_SERVER_URI',""),

    /*
     * You can specify a special user agent 'signature' for your dolibarr
     *
     */
    'user_agent' => env('DOLIBARR_USER_AGENT',""),
];
