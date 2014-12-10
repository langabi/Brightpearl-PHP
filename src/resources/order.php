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

        /**
         *    postOrderRow() method
         *
         *    reference: https://www.brightpearl.com/developer/latest/order/order-row/post.html
         */
        "postOrderRow" => array(
            "httpMethod" => "POST",
            "uri" => "/{apiVersion}/{account_code}/order-service/order/{orderId}/row",
            "summary" => "Create order row",
            "responseModel" => "defaultJsonResponse",
            "parameters" => array(

                "orderId" => array(
                    "type" => "string",
                    "location" => "uri",
                    "description" => "Order id",
                    "required" => true,
                ),

                "productId" => array(
                    "type" => "integer",
                    "location" => "json",
                    "description" => "The Id of the Product you wish to add an Order Row of.",
                    "required" => false,
                ),

                "productName" => array(
                    "type" => "string",
                    "location" => "json",
                    "description" => "The name of the Product you wish to add an Order Row of.",
                    "required" => false,
                ),

                "quantity" => array(
                    "type" => "array",
                    "location" => "json",
                    "description" => "Order Row Quantity",
                    "required" => true,
                    "magnitude" => array(
                        "type" => "string",
                        "location" => "json",
                        "description" => "The quantity of items in this row. For stock tracked Products this number has to be an integer, for non stock tracked Products this number can be a decimal with 2 decimal places.",
                        "required" => true,
                    ),
                ),

                "rowValue" => array(
                    "type" => "array",
                    "location" => "json",
                    "description" => "Order Row Value",
                    "required" => true,
                    "taxCode" => array(
                        "type" => "string",
                        "location" => "json",
                        "description" => "The Tax Code for this row.",
                        "required" => true,
                    ),
                    "rowNet" => array(
                        "type" => "array",
                        "location" => "json",
                        "description" => "The NET value of this row in the same currency as the order specified in two decimal places.",
                        "required" => true,
                        "value" => array(
                            "type" => "string",
                            "location" => "json",
                            "description" => "order row net value",
                            "required" => true,
                        ),
                    ),
                    "rowTax" => array(
                        "type" => "array",
                        "location" => "json",
                        "description" => "The NET tax value of this row in the same currency as the order specified in two decimal places.",
                        "required" => true,
                        "value" => array(
                            "type" => "string",
                            "location" => "json",
                            "description" => "order row tax value",
                            "required" => true,
                        ),
                    ),
                ),

                "nominalCode" => array(
                    "type" => "",
                    "location" => "json",
                    "description" => "The nominal code for this row.
                If you do not provide a nominal code, then the following rules will be used to decipher which nominal code will be applied to the row
                - The nominal code associated to the contact will be used
                - If the contact does not have a nominal code, the nominal code associated with the product will be used
                - If the product does not have a nominal code or it is not a Brightpearl product the default sales/purchases nominal code is used",
                    "required" => false,
                ),

            ),
        ),

        /**
         *    searchOrder() method
         *
         *    reference: https://www.brightpearl.com/developer/latest/order/order/search.html
         */
        "searchOrder" => array(

            "columns" => array(
                "type" => "array",
                "location" => "uri",
                "description" => "You may control the set of columns that are included in the results and the order in which they are presented. You may use the columns parameters and provide a comma separated list of column names. e.g. /contact-search?columns=contactId,firstName",
                "required" => false,
            ),

            "sort" => array(
                "type" => "string",
                "location" => "uri",
                "description" => "When you execute a resource, you may change the default sort order by setting a query parameter sort. The value of this parameter is a comma delimited list of 1-n column names with an optional sort direction separated by a pipe. e.g. /goods-out-note-search?sort=warehouseId,price|DESC",
                "required" => false,
            ),

            "pageSize" => array(
                "type" => "integer",
                "location" => "uri",
                "description" => "",
                "required" => false,
            ),

            "firstResult" => array(
                "type" => "integer",
                "location" => "uri",
                "description" => "",
                "required" => false,
            ),

            // filters
            "placedOn" => array(
                "type" => "string",
                "location" => "uri",
                "description" => "The date the order was placed.",
                "required" => false,
            ),

            "deliveryDate" => array(
                "type" => "string",
                "location" => "uri",
                "description" => "The date the delivery is set for.",
                "required" => false,
            ),

            "shippingMethodId" => array(
                "type" => "integer",
                "location" => "uri",
                "description" => "The ID of the Shipping Method.",
                "required" => false,
            ),

            "staffOwnerContactId" => array(
                "type" => "integer",
                "location" => "uri",
                "description" => "The ID of the Staff member who owns the Order.",
                "required" => false,
            ),

            "projectId" => array(
                "type" => "integer",
                "location" => "uri",
                "description" => "The ID of the project the Order is associated with.",
                "required" => false,
            ),

            "departmentId" => array(
                "type" => "integer",
                "location" => "uri",
                "description" => "The ID of the department the Order is associated with.",
                "required" => false,
            ),

            "leadSourceId" => array(
                "type" => "integer",
                "location" => "uri",
                "description" => "The ID of the lead source the Order is associated with.",
                "required" => false,
            ),

            "isClone" => array(
                "type" => "boolean",
                "location" => "uri",
                "description" => "Whether the order is a clone or not.",
                "required" => false,
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
        "ResponseSearchModel"
    ),
);
