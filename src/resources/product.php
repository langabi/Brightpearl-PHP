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
         *    getProduct() method
         *
         *    reference: https://www.brightpearl.com/developer/latest/product/product/get.html
         */
        "getProduct" => array(
            "httpMethod" => "GET",
            "uri" => "/{apiVersion}/{account_code}/product-service/product/{id}",
            "summary" => "Retrieve product(s)",
            "responseModel" => "getProductResponse",
            "parameters" => array(
 
                "id" => array(
                    "type" => "string",
                    "location" => "uri",
                    "description" => "Product id",
                    "required" => true,
                ),

            ),
        ),

        /**
         *    postProduct() method
         *
         *    reference: https://www.brightpearl.com/developer/latest/product/product/post.html
         */
        "postProduct" => array(
            "httpMethod" => "POST",
            "uri" => "/{apiVersion}/{account_code}/product-service/product/",
            "summary" => "Create product",
            "responseModel" => "postProductResponse",
            "parameters" => array(

                "brandId" => array(
                    "type" => "integer",
                    "location" => "json",
                    "description" => "The Id of the brand for this product.",
                    "required" => true,
                ),

                "productTypeId" => array(
                    "type" => "integer",
                    "location" => "json",
                    "description" => "The Id of the product type.",
                    "required" => false,
                ),

                "identity" => array(
                    "type" => "array",
                    "location" => "json",
                    "description" => "This section represents external identifying attributes of a product.",
                    "required" => false,
                    "sku" => array(
                        "type" => "string",
                        "location" => "json",
                    ),
                    "ean" => array(
                        "type" => "string",
                        "location" => "json",
                    ),
                    "upc" => array(
                        "type" => "string",
                        "location" => "json",
                    ),
                    "isbn" => array(
                        "type" => "string",
                        "location" => "json",
                    ),
                    "barcode" => array(
                        "type" => "string",
                        "location" => "json",
                    ),
                ),

                "stock" => array(
                    "type" => "array",
                    "location" => "json",
                    "description" => "This section is used to specify physical details about the product such as its weight and dimensions.",
                    "required" => false,
                    "stockTracked" => array(
                        "type" => "boolean",
                        "location" => "json",
                    ),
                    "weight" => array(
                        "type" => "array",
                        "location" => "json",
                        "magnitude" => array(
                            "type" => "number",
                            "location" => "json",
                        ),
                    ),
                ),

                "financialDetails" => array(
                    "type" => "array",
                    "location" => "json",
                    "description" => "This section specifies financial details of the product.",
                    "required" => false,
                    "taxable" => array(
                        "type" => "boolean",
                        "location" => "json",
                    ),
                    "taxCode" => array(
                        "type" => "array",
                        "location" => "json",
                        "id" => array(
                            "type" => "integer",
                            "location" => "json",
                        ),
                        "code" => array(
                            "type" => "string",
                            "location" => "json",
                        ),
                    ),
                ),

                "salesChannels" => array(
                    "type" => "array",
                    "location" => "json",
                    "description" => "This section specifies a list of sales channels.",
                    "required" => true,
                    "salesChannelName" => array(
                        "type" => "string",
                        "location" => "json",
                        "required" => true,
                    ),
                    "productName" => array(
                        "type" => "string",
                        "location" => "json",
                        "required" => true,
                    ),
                    "productCondition" => array(
                        "type" => "string",
                        "location" => "json",
                        "description" => "(default: new) This specifies the condition of the product. Possible values are: 'new', 'used' and 'refurbished'.",
                    ),
                    "categories" => array(
                        "type" => "array",
                        "location" => "json",
                        "required" => true,
                    ),
                    "description" => array(
                        "type" => "array",
                        "location" => "json",
                        "languageCode" => array(
                            "type" => "string",
                            "location" => "json",
                        ),
                        "text" => array(
                            "type" => "string",
                            "location" => "json",
                        ),
                        "format" => array(
                            "type" => "string",
                            "location" => "json",
                        ),
                    ),
                    "shortDescription" => array(
                        "type" => "array",
                        "location" => "json",
                        "languageCode" => array(
                            "type" => "string",
                            "location" => "json",
                        ),
                        "text" => array(
                            "type" => "string",
                            "location" => "json",
                        ),
                        "format" => array(
                            "type" => "string",
                            "location" => "json",
                        ),
                    ),
                ),

                "variations" => array(
                    "type" => "array",
                    "location" => "json",
                    "description" => "This field lists the options and option values that define the variation for this product.",
                    "required" => false,
                ),

                "seasonIds" => array(
                    "type" => "array",
                    "location" => "json",
                    "description" => "Specifies the Ids of the seasons for this product. Takes one or more integers.",
                ),

            ),
        ),

        /**
         *    getProductCategory() method
         *
         *    reference: https://www.brightpearl.com/developer/latest/product/brightpearl-category/get.html
         */
        "getProductCategory" => array(
            "httpMethod" => "GET",
            "uri" => "/{apiVersion}/{account_code}/product-service/brightpearl-category/{id}",
            "summary" => "Retrieve product(s)",
            "responseModel" => "getProductCategoryResponse",
            "parameters" => array(

                "id" => array(
                    "type" => "string",
                    "location" => "uri",
                    "description" => "Product category id(s) or null for all",
                    "required" => false,
                ),

            ),
        ),

        /**
         *    postProductCategory() method
         *
         *    reference: https://www.brightpearl.com/developer/latest/product/brightpearl-category/post.html
         */
        "postProductCategory" => array(
            "httpMethod" => "POST",
            "uri" => "/{apiVersion}/{account_code}/product-service/brightpearl-category/",
            "summary" => "Create product category",
            "responseModel" => "postProductCategoryResponse",
            "parameters" => array(

                "name" => array(
                    "type" => "string",
                    "location" => "json",
                    "description" => "This is the name of the Brightpearl Category.
                                      Duplicate names cannot be used at the same level in the hierarchy. 
                                      Max length 128", // add filter functionality to restrict max length
                    "required" => true,
                ),

                "parentId" => array(
                    "type" => "integer",
                    "location" => "json",
                    "description" => "Use this field to set the Category's parentId.
                                      If the field is not set then the category is set as a root category.
                                      Value 0 can also be used to set the category as a root category.",
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

        "getProductResponse" => array(
            "type" => "object",
            "additionalProperties" => array(
                "location" => "json",
            ),
        ),

        "postProductResponse" => array(
            "type" => "object",
            "additionalProperties" => array(
                "location" => "json",
            ),
        ),

        "getProductCategoryResponse" => array(
            "type" => "object",
            "additionalProperties" => array(
                "location" => "json",
            ),
        ),

        "postProductCategoryResponse" => array(
            "type" => "object",
            "additionalProperties" => array(
                "location" => "json",
            ),
        ),

    ),
);
