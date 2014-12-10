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

        /**
         *    postSalesReceipt() method
         *
         *    reference: https://www.brightpearl.com/developer/latest/accounting/sales-receipt/post.html
         */
        "postSalesReceipt" => array(
            "httpMethod" => "POST",
            "uri" => "/{apiVersion}/{account_code}/accounting-service/sales-receipt",
            "summary" => "This method allows you to create a Sales Receipt for a customer account against just a customer account or against an order or even against an invoice for an order.

Things to be aware of:

You do not need an orderId or an invoiceReference if a customerId is provided.
You do not need a customerId if an orderId is provided.
The customer associated with the customerId must be a primary customer
If an orderId and a customerId is provided, the customer must be associated with the order.
You can over pay a invoice. The overpaid proportion will be placed against the customers account.
The bankAccountNominalCode must be a valid nominal code
channelId is optional.",
            "responseModel" => "defaultJsonResponse",
            "parameters" => array(

                "orderId" => array(
                    "type" => "string",
                    "location" => "json",
                    "description" => "",
                    "required" => false,
                ),

                "customerId" => array(
                    "type" => "string",
                    "location" => "json",
                    "description" => "",
                    "required" => false,
                ),

                "received" => array(

                    "type" => "array",
                    "location" => "json",
                    "description" => "",
                    "required" => true,

                    "currency" => array(
                        "type" => "string",
                        "location" => "json",
                        "description" => "",
                        "required" => true,
                    ),

                    "value" => array(
                        "type" => "string",
                        "location" => "json",
                        "required" => true,
                    ),
                ),

                "invoiceReference" => array(
                    "type" => "string",
                    "location" => "json",
                    "required" => false,
                ),

                "bankAccountNominalCode" => array(
                    "type" => "string",
                    "location" => "json",
                    "required" => true,
                ),

                "description" => array(
                    "type" => "string",
                    "location" => "json",
                    "description" => "Description",
                    "required" => false,
                ),

                "taxDate" => array(
                    "type" => "string",
                    "location" => "json",
                    "description" => "Tax Date",
                    "required" => true,
                ),

                "channelId" => array(
                    "type" => "integer",
                    "location" => "json",
                    "description" => "The channel to associate the sales receipt with.",
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
