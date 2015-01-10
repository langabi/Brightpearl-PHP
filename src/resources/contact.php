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
         *    getContact() method
         *
         *    reference: https://www.brightpearl.com/developer/latest/contact/contact/get.html
         */
        "getContact" => array(
            "httpMethod" => "GET",
            "uri" => "/{apiVersion}/{account_code}/contact-service/contact/{id}",
            "summary" => "Retrieve Contact",
            "responseModel" => "defaultJsonResponse",
            "parameters" => array(

                "id" => array(
                    "type" => "string",
                    "location" => "uri",
                    "description" => "Contact id",
                    "required" => true,
                ),

            ),
        ),

        /**
         *    postContact() method
         *
         *    reference: https://www.brightpearl.com/developer/latest/contact/contact/post.html
         */
        "postContact" => array(
            "httpMethod" => "POST",
            "uri" => "/{apiVersion}/{account_code}/contact-service/contact/",
            "summary" => "Create Contact",
            "responseModel" => "defaultJsonResponse",
            "parameters" => array(

                "salutation" => array(
                    "type" => "string",
                    "location" => "json",
                    "description" => "Use this field to specify the salutation for the contact.",
                ),

                "firstName" => array(
                    "type" => "string",
                    "location" => "json",
                    "description" => "Use this field to specify the contact's first name",
                    "required" => true,
                ),

                "lastName" => array(
                    "type" => "string",
                    "location" => "json",
                    "description" => "Use this field to specify the contact's last name/surname.",
                    "required" => true,
                ),

                "postAddressIds" => array(
                    "type" => "array",
                    "location" => "json",
                    "description" => "Postal address ids.",
                    "required" => true,
                    "DEF" => array(
                        "type" => "integer",
                        "location" => "json",
                        "description" => "Set default address.",
                        "required" => true,
                    ),
                    "BIL" => array(
                        "type" => "integer",
                        "location" => "json",
                        "description" => "Set billing/invoice address.",
                    ),
                    "DEL" => array(
                        "type" => "integer",
                        "location" => "json",
                        "description" => "Set delivery address.",
                    ),
                ),

                "communication" => array(
                    "type" => "array",
                    "location" => "json",
                    "description" => "All the available contact info.",
                    "required" => false,
                    "emails" => array(
                        "type" => "array",
                        "location" => "json",
                        "description" => "Email addresses.",
                        "PRI" => array(
                            "type" => "string",
                            "location" => "json",
                            "description" => "Set primary email.",
                        ),
                        "SEC" => array(
                            "type" => "string",
                            "location" => "json",
                            "description" => "Set secondary email.",
                        ),
                        "TER" => array(
                            "type" => "string",
                            "location" => "json",
                            "description" => "Set tertiary email.",
                        ),
                    ),
                    "telephones" => array(
                        "type" => "array",
                        "location" => "json",
                        "description" => "Email addresses.",
                        "PRI" => array(
                            "type" => "string",
                            "location" => "json",
                            "description" => "Set primary phone.",
                        ),
                        "SEC" => array(
                            "type" => "string",
                            "location" => "json",
                            "description" => "Set secondary phone.",
                        ),
                        "MOB" => array(
                            "type" => "string",
                            "location" => "json",
                            "description" => "Set mobile phone.",
                        ),
                    ),
                    "messagingVoips" => array(
                        "type" => "array",
                        "location" => "json",
                        "description" => "Messaging/VOIP services contact info.",
                        "SKP" => array(
                            "type" => "string",
                            "location" => "json",
                            "description" => "Set Skype user name.",
                        ),
                    ),
                    "websites" => array(
                        "type" => "array",
                        "location" => "json",
                        "description" => "Website info.",
                        "PRI" => array(
                            "type" => "string",
                            "location" => "json",
                            "description" => "Set primary web site.",
                        ),
                    ),
                ),

                "contactStatus" => array(
                    "type" => "array",
                    "location" => "json",
                    "description" => "Use this field to specify the ID of the current status of the contact.",
                    "required" => false,
                    "current" => array(
                        "type" => "array",
                        "location" => "json",
                        "contactStatusId" => array(
                            "type" => "integer",
                            "location" => "json",
                        ),
                    ),
                ),

                "relationshipToAccount" => array(
                    "type" => "array",
                    "location" => "json",
                    "description" => "Use this field to specify the ID of the current status of the contact.",
                    "required" => false,
                    "isSupplier" => array(
                        "type" => "boolean",
                        "location" => "json",
                    ),
                    "isStaff" => array(
                        "type" => "boolean",
                        "location" => "json",
                    ),
                ),

                "organisation" => array(
                    "type" => "array",
                    "location" => "json",
                    "description" => "Specify the ID of the current status of the contact.",
                    "required" => false,
                    "organisationId" => array(
                        "type" => "integer",
                        "location" => "json",
                    ),
                    "name" => array(
                        "type" => "string",
                        "location" => "json",
                    ),
                ),

                "marketingDetails" => array(
                    "type" => "array",
                    "location" => "json",
                    "description" => "Specify whether the contact is to receive an email newsletter.",
                    "required" => false,
                    "isReceiveEmailNewsletter" => array(
                        "type" => "boolean",
                        "location" => "json",
                    ),
                ),

                "financialDetails" => array(
                    "type" => "array",
                    "location" => "json",
                    "description" => "Specify financial details of the contact.",
                    "required" => false,
                    "priceListId" => array(
                        "type" => "integer",
                        "location" => "json",
                    ),
                    "taxCodeId" => array(
                        "type" => "string",
                        "location" => "json",
                    ),
                    "creditLimit" => array(
                        "type" => "string",
                        "location" => "json",
                    ),
                    "creditTermDays" => array(
                        "type" => "integer",
                        "location" => "json",
                    ),
                    "discountPercentage" => array(
                        "type" => "integer",
                        "location" => "json",
                    ),
                    "taxNumber" => array(
                        "type" => "string",
                        "location" => "json",
                    ),
                ),

                "assignment" => array(
                    "type" => "array",
                    "location" => "json",
                    "description" => "Specify the contact ID of the staff owner or lead source of the current contact.",
                    "required" => false,
                    "current" => array(
                        "type" => "array",
                        "location" => "json",
                        "staffOwnerContactId" => array(
                            "type" => "integer",
                            "location" => "json",
                        ),
                        "leadSourceId" => array(
                            "type" => "integer",
                            "location" => "json",
                        ),
                    ),
                ),

            ),
        ),

        /**
         *    getContactSearch() method
         *
         *    reference: https://www.brightpearl.com/developer/latest/contact/contact/search.html
         */
        "getContactSearch" => array(
            "httpMethod" => "GET",
            "uri" => "/{apiVersion}/{account_code}/contact-service/contact-search",
            "summary" => "Search contacts",
            "responseModel" => "defaultJsonResponse",
            "parameters" => array(

                "allEmail" => array(
                    "type" => "string",
                    "location" => "query",
                    "description" => "String contained (case insensitive) in any of the contact's email addresses",
                    "required" => false,
                ),

                "primaryEmail" => array(
                    "type" => "string",
                    "location" => "query",
                    "description" => "String contained in contact's primary email address",
                    "required" => false,
                ),

                "secondaryEmail" => array(
                    "type" => "string",
                    "location" => "query",
                    "description" => "String contained in contact's secondary email address",
                    "required" => false,
                ),

                "tertiaryEmail" => array(
                    "type" => "string",
                    "location" => "query",
                    "description" => "String contained in contact's tertiary email address",
                    "required" => false,
                ),

                "firstName" => array(
                    "type" => "string",
                    "location" => "query",
                    "description" => "String contained in contact's first name ",
                    "required" => false,
                ),

                "lastName" => array(
                    "type" => "string",
                    "location" => "query",
                    "description" => "String contained in contact's last name",
                    "required" => false,
                ),

                "isSupplier" => array(
                    "type" => "string",
                    "location" => "query",
                    "description" => "Whether the contact is a supplier (versus customer). 'true' or 'false'",
                    "required" => false,
                ),

                "pageSize" => array(
                    "type" => "integer",
                    "location" => "query",
                    "description" => "Set max results per page, default and max setting is 500",
                    "required" => false,
                ),

                "firstResult" => array(
                    "type" => "integer",
                    "location" => "query",
                    "description" => "Pagination pointer",
                    "required" => false,
                ),

            ),
        ),

        /**
         *    getContactAddress() method
         *
         *    reference: https://www.brightpearl.com/developer/latest/contact/postal-address/get.html
         */
        "getContactAddress" => array(
            "httpMethod" => "GET",
            "uri" => "/{apiVersion}/{account_code}/contact-service/postal-address/{id}",
            "summary" => "Retrieve Contact Address(es)",
            "responseModel" => "defaultJsonResponse",
            "parameters" => array(

                "id" => array(
                    "type" => "string",
                    "location" => "uri",
                    "description" => "Address id or id set/range",
                    "required" => true,
                ),

            ),
        ),

        /**
         *    postContactAddress() method
         *
         *    reference: https://www.brightpearl.com/developer/latest/contact/postal-address/post.html
         */
        "postContactAddress" => array(
            "httpMethod" => "POST",
            "uri" => "/{apiVersion}/{account_code}/contact-service/postal-address/",
            "summary" => "Create Contact Address",
            "responseModel" => "defaultJsonResponse",
            "parameters" => array(

                "addressLine1" => array(
                    "type" => "string",
                    "location" => "json",
                    "description" => "First address line",
                    "required" => true,
                ),

                "addressLine2" => array(
                    "type" => "string",
                    "location" => "json",
                    "required" => false,
                ),

                "addressLine3" => array(
                    "type" => "string",
                    "location" => "json",
                    "required" => false,
                ),

                "addressLine4" => array(
                    "type" => "string",
                    "location" => "json",
                    "required" => false,
                ),

                "postalCode" => array(
                    "type" => "string",
                    "location" => "json",
                    "description" => "Postal Code",
                    "required" => true,
                ),

                "countryIsoCode" => array(
                    "type" => "string",
                    "location" => "json",
                    "description" => "Specify the ISO code of the country for this address.",
                    "required" => false,
                ),

                "countryId" => array(
                    "type" => "string",
                    "location" => "json",
                    "description" => "Specify the Id of the country this address.",
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
