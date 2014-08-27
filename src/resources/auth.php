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

        "postAuth" => array(
            "httpMethod" => "POST",
            "uri" => "/{account_code}/authorise",
            "summary" => "Retrieve Auth Token (https://www.brightpearl.com/developer/latest/tutorial/getting-started.html)",
            "responseModel" => "defaultJsonResponse",
            "parameters" => array(

                "apiAccountCredentials" => array(
                    "type" => "array",
                    "location" => "json",

                    "emailAddress" => array(
                        "type" => "string",
                        "location" => "json",
                        "description" => "Email for Auth",
                    ),

                    "password" => array(
                        "type" => "string",
                        "location" => "json",
                        "description" => "Email for Auth",
                    ),

                ),

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
