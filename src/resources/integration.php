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
         *    getWebhook() method
         *
         *    reference: https://www.brightpearl.com/developer/latest/integration/webhook/get.html
         */
        "getWebhook" => array(
            "httpMethod" => "GET",
            "uri" => "/{apiVersion}/{account_code}/integration-service/webhook/{id}",
            "summary" => "Get webhook(s) for resource events",
            "responseModel" => "defaultJsonResponse",
            "parameters" => array(

                "id" => array(
                    "type" => "string",
                    "location" => "uri",
                    "description" => "Id of webhook(s) to retrieve",
                    "required" => false,
                ),

            ),
        ),

        /**
         *    postWebhook() method
         *
         *    reference: https://www.brightpearl.com/developer/latest/integration/webhook/post.html
         */
        "postWebhook" => array(
            "httpMethod" => "POST",
            "uri" => "/{apiVersion}/{account_code}/integration-service/webhook",
            "summary" => "Create webhook for resource events",
            "responseModel" => "defaultJsonResponse",
            "parameters" => array(

                "subscribeTo" => array(
                    "type" => "string",
                    "location" => "json",
                    "description" => "Resource event to hook",
                    "required" => true,
                ),

                "httpMethod" => array(
                    "type" => "string",
                    "location" => "json",
                    "description" => "HTTP method to use for receiving the event data (ie. POST, GET, PUT, etc)",
                    "required" => true,
                ),

                "uriTemplate" => array(
                    "type" => "string",
                    "location" => "json",
                    "description" => "Your application's URI to receive the webhook's event",
                    "required" => true,
                ),

                "bodyTemplate" => array(
                    "type" => "string",
                    "location" => "json",
                    "description" => "Template to format the http body of the event",
                    "required" => true,
                ),

                "contentType" => array(
                    "type" => "string",
                    "location" => "json",
                    "description" => "Mime type of http body to use (xml, json, etc)",
                    "required" => true,
                ),

                "idSetAccepted" => array(
                    "type" => "boolean",
                    "location" => "json",
                    "description" => "Mime type of http body to use (xml, json, etc)",
                    "required" => true,
                ),

            ),
        ),

        /**
         *    deleteWebhook() method
         *
         *    reference: https://www.brightpearl.com/developer/latest/integration/webhook/delete.html
         */
        "deleteWebhook" => array(
            "httpMethod" => "DELETE",
            "uri" => "/{apiVersion}/{account_code}/integration-service/webhook/{id}",
            "summary" => "Delete webhook for resource events",
            "responseModel" => "defaultJsonResponse",
            "parameters" => array(

                "id" => array(
                    "type" => "integer",
                    "location" => "uri",
                    "description" => "Id of webhook to delete",
                    "required" => true,
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
