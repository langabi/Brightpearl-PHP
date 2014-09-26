<?php

return array(

    /*
    |--------------------------------------------------------------------------
    | Operations
    |--------------------------------------------------------------------------
    |
    | This array of operations is translated into methods that complete these
    | requests based on their configuration.
    |
    */

    "operations" => array(

        /**
         *    getDevToolsDatacenter() method
         *
         *    reference: TBA
         */
        "getDevToolsDatacenter" => array(
            "httpMethod" => "GET",
            "uri" => "/developer-tools/{dev_reference}/account-location/{account_code}",
            "summary" => "Get account datacenter",
            "responseModel" => "defaultJsonResponse",
            "parameters" => array(

                "dev_token" => [
                    "type" => "string",
                    "location" => "header",
                    "required" => false,
                    "sentAs" => "brightpearl-dev-token",
                ],

            ),
        ),

    ),

    /*
    |--------------------------------------------------------------------------
    | Models
    |--------------------------------------------------------------------------
    |
    | This array of models is specifications to returning the response
    | from the operation methods.
    |
    */

    "models" => array(

    ),
);
