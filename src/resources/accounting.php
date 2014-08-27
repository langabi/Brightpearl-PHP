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
         *    getAccountingTaxCode() method
         *
         *    reference: https://www.brightpearl.com/developer/latest/accounting/tax-code/get.html
         */
        "getAccountingTaxCode" => array(
            "httpMethod" => "GET",
            "uri" => "/{apiVersion}/{account_code}/accounting-service/tax-code/{id}",
            "summary" => "Get tax code(s)",
            "responseModel" => "defaultJsonResponse",
            "parameters" => array(

                "id" => array(
                    "type" => "string",
                    "location" => "uri",
                    "description" => "Id of tax code(s) to get",
                    "required" => false,
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
