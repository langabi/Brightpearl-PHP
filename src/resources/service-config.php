<?php

return array(

    /*
    |--------------------------------------------------------------------------
    | Service Name
    |--------------------------------------------------------------------------
    |
    | Name of the API service these description configs are for.
    |
    */

    "name" => "Brightpearl",

    /*
    |--------------------------------------------------------------------------
    | Service Description
    |--------------------------------------------------------------------------
    |
    | Description of the API service.
    |
    */

    "description" => "Brightpearl API",

    /*
    |--------------------------------------------------------------------------
    | Service Configurations
    |--------------------------------------------------------------------------
    |
    | Configuration files of specfic service descriptions to load.
    |
    */

    "services" => array(
        "accounting",
        "auth",
        "contact",
        "order",
        "product",
        "integration",
        "warehouse",
    ),

    /*
    |--------------------------------------------------------------------------
    | Default models
    |--------------------------------------------------------------------------
    |
    | Default response models for typical usage of responses
    |
    */

    "models" => array(

        "defaultJsonResponse" => array(
            "type" => "object",
            "additionalProperties" => array(
                "location" => "json",
            ),
        ),

    ),

);
