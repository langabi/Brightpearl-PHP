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
         *    getOrder() method
         *
         *    reference: https://www.brightpearl.com/developer/latest/order/order/get.html
         */
        "getOrder" => array(
            "httpMethod" => "GET",
            "uri" => "/{apiVersion}/{account_code}/order-service/order/{id}",
            "summary" => "Retrieve order(s) (https://www.brightpearl.com/developer/latest/order/order/get.html)",
            "responseModel" => "defaultJsonResponse",
            "parameters" => array(

                "id" => array(
                    "type" => "string",
                    "location" => "uri",
                    "description" => "Order id",
                    "required" => true,
                ),
                
            ),
        ),

        /**
         *    postOrder() method
         *
         *    reference: https://www.brightpearl.com/developer/latest/order/order/post.html
         */
        "postOrder" => array(
            "httpMethod" => "POST",
            "uri" => "/{apiVersion}/{account_code}/order-service/order/",
            "summary" => "Create order(s)",
            "responseModel" => "defaultJsonResponse",
            "parameters" => array(

                "orderTypeCode" => array(
                    "type" => "string",
                    "location" => "json",
                    "description" => "SO - Sales Order
                                      SC - Sales Credit
                                      PO - Purchase Order
                                      PC - Purchase Credit",
                    "required" => true,
                ),

                "reference" => array(
                    "type" => "string",
                    "location" => "json",
                    "description" => "The Customer/Supplier reference you wish to assign to this Order.",
                    "required" => false,
                ),

                "priceListId" => array(
                    "type" => "integer",
                    "location" => "json",
                    "description" => "The Id of the Price List you wish to use for this Order. 
                                      If no Price List Id is sent in the Customer/Supplier's assigned Price List is used.",
                    "required" => false,
                ),

                "placedOn" => array(
                    "type" => "string",
                    "location" => "json",
                    "description" => "The date this Order was placed on. If this is not specified todays date will be used. (ISO8601 format)",
                    "required" => false,
                ),

                "orderStatus" => array(
                    "type" => "array",
                    "location" => "json",
                    "description" => "The Id of the Status you wish to assign to this Order.",
                    "required" => false,
                    "orderStatusId" => array(
                        "type" => "integer",
                        "location" => "json",
                    ),
                ),

                "delivery" => array(
                    "type" => "array",
                    "location" => "json",
                    "description" => "The date you wish to have the Order delivered On.",
                    "required" => false,
                    "deliveryDate" => array(
                        "type" => "string",
                        "location" => "json",
                    ),
                    "shippingMethodId" => array(
                        "type" => "integer",
                        "location" => "json",
                    ),
                ),

                "invoices" => array(
                    "type" => "array",
                    "location" => "json",
                    "description" => "Array of invoice objects.",
                    "required" => false,
                ),

                "currency" => array(
                    "type" => "array",
                    "location" => "json",
                    "description" => "The currency you wish to set this Order to be.",
                    "required" => false,
                    "orderCurrencyCode" => array(
                        "type" => "string",
                        "location" => "json",
                    ),
                ),

                "parties" => array(
                    "type" => "array",
                    "location" => "json",
                    "description" => "The date you wish to have the Order delivered On.",
                    "required" => true,
                    "customer" => array(
                        "type" => "array",
                        "location" => "json",
                        "contactId" => array(
                            "type" => "integer",
                            "location" => "json",
                        ),
                    ),
                    "supplier" => array(
                        "type" => "array",
                        "location" => "json",
                        "contactId" => array(
                            "type" => "integer",
                            "location" => "json",
                        ),
                    ),
                    "delivery" => array(
                        "type" => "array",
                        "location" => "json",
                        "addressFullName" => array(
                            "type" => "string",
                            "location" => "json",
                        ),
                        "companyName" => array(
                            "type" => "string",
                            "location" => "json",
                        ),
                        "addressLine1" => array(
                            "type" => "string",
                            "location" => "json",
                        ),
                        "addressLine2" => array(
                            "type" => "string",
                            "location" => "json",
                        ),
                        "addressLine3" => array(
                            "type" => "string",
                            "location" => "json",
                        ),
                        "addressLine4" => array(
                            "type" => "string",
                            "location" => "json",
                        ),
                        "postalCode" => array(
                            "type" => "string",
                            "location" => "json",
                        ),
                        "countryId" => array(
                            "type" => "string",
                            "location" => "json",
                        ),
                        "countryIsoCode" => array(
                            "type" => "string",
                            "location" => "json",
                        ),
                        "telephone" => array(
                            "type" => "string",
                            "location" => "json",
                        ),
                        "mobileTelephone" => array(
                            "type" => "string",
                            "location" => "json",
                        ),
                        "email" => array(
                            "type" => "string",
                            "location" => "json",
                        ),
                    ),
                    "shippingMethodId" => array(
                        "type" => "integer",
                        "location" => "json",
                    ),
                ),

                "assignment" => array(
                    "type" => "array",
                    "location" => "json",
                    "description" => "Holds details of the assignment of the order such as which staff member is assigned to the order.",
                    "required" => false,
                    "current" => array(
                        "type" => "array",
                        "location" => "json",
                        "channelId" => array(
                            "type" => "integer",
                            "location" => "json",
                        ),
                        "leadSourceId" => array(
                            "type" => "integer",
                            "location" => "json",
                        ),
                        "projectId" => array(
                            "type" => "integer",
                            "location" => "json",
                        ),
                        "staffOwnerContactId" => array(
                            "type" => "integer",
                            "location" => "json",
                        ),
                        "teamId" => array(
                            "type" => "integer",
                            "location" => "json",
                        ),
                    ),
                ),

                "warehouseId" => array(
                    "type" => "string",
                    "location" => "json",
                    "description" => "The Id of the warehouse which will be used by default for fulfilment.",
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
