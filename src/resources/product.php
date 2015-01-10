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
            "responseModel" => "defaultJsonResponse",
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
         *    optionsProduct() method
         *
         *    reference: https://www.brightpearl.com/developer/latest/product/product/options.html
         */
        "optionsProduct" => array(
            "httpMethod" => "OPTIONS",
            "uri" => "/{apiVersion}/{account_code}/product-service/product/{id}",
            "summary" => "Retrieve URLs for retrieving product(s)",
            "responseModel" => "defaultJsonResponse",
            "parameters" => array(

                "id" => array(
                    "type" => "string",
                    "location" => "uri",
                    "description" => "Product id(s)",
                    "required" => false,
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
            "responseModel" => "defaultJsonResponse",
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
         *    getProductBrand() method
         *
         *    reference: https://www.brightpearl.com/developer/latest/product/brand/get.html
         */
        "getProductBrand" => array(
            "httpMethod" => "GET",
            "uri" => "/{apiVersion}/{account_code}/product-service/brand/{id}",
            "summary" => "Retrieve product brand(s)",
            "responseModel" => "defaultJsonResponse",
            "parameters" => array(

                "id" => array(
                    "type" => "string",
                    "location" => "uri",
                    "description" => "Product brand id(s) or null for all",
                    "required" => false,
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
            "summary" => "Retrieve product category(s)",
            "responseModel" => "defaultJsonResponse",
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
            "responseModel" => "defaultJsonResponse",
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

        /**
         *    getProductChannel() method
         *
         *    reference: https://www.brightpearl.com/developer/latest/product/channel/get.html
         */
        "getProductChannel" => array(
            "httpMethod" => "GET",
            "uri" => "/{apiVersion}/{account_code}/product-service/channel/{id}",
            "summary" => "Create product category",
            "responseModel" => "defaultJsonResponse",
            "parameters" => array(

                "id" => array(
                    "type" => "string",
                    "location" => "uri",
                    "description" => "This is the name of the Brightpearl Sales Channel(s) you're looking for",
                    "required" => false,
                ),

            ),
        ),

        /**
         *    getProductSearch() method
         *
         *    reference: https://www.brightpearl.com/developer/latest/product/product/search.html
         */
        "getProductSearch" => array(
            "httpMethod" => "GET",
            "uri" => "/{apiVersion}/{account_code}/product-service/product-search",
            "summary" => "Search products",
            "responseModel" => "defaultJsonResponse",
            "parameters" => array(

                "channelId" => array(
                    "type" => "integer",
                    "location" => "query",
                    "description" => "This is the name of the Brightpearl Sales Channel(s) you're looking for",
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
         *    getProductPriceList() method
         *
         *    reference: https://www.brightpearl.com/developer/latest/product/price-list/get.html
         */
        "getProductPriceList" => array(
            "httpMethod" => "GET",
            "uri" => "/{apiVersion}/{account_code}/product-service/price-list/{id}",
            "summary" => "Get product price list(s)",
            "responseModel" => "defaultJsonResponse",
            "parameters" => array(

                "id" => array(
                    "type" => "string",
                    "location" => "uri",
                    "description" => "This is the id of the product price list(s)",
                    "required" => false,
                ),

            ),
        ),

        /**
         *    getProductPrice() method
         *
         *    reference: https://www.brightpearl.com/developer/latest/product/product-price/get.html
         */
        "getProductPrice" => array(
            "httpMethod" => "GET",
            "uri" => "/{apiVersion}/{account_code}/product-service/product-price/{id}",
            "summary" => "Get product price(s)",
            "responseModel" => "defaultJsonResponse",
            "parameters" => array(

                "id" => array(
                    "type" => "string",
                    "location" => "uri",
                    "description" => "This is the id of the product(s)",
                    "required" => true,
                ),

            ),
        ),

        /**
         *    optionsProductPrice() method
         *
         *    reference: https://www.brightpearl.com/developer/latest/product/product-price/options.html
         */
        "optionsProductPrice" => array(
            "httpMethod" => "OPTIONS",
            "uri" => "/{apiVersion}/{account_code}/product-service/product-price/{id}",
            "summary" => "Get valid product price requests",
            "responseModel" => "defaultJsonResponse",
            "parameters" => array(

                "id" => array(
                    "type" => "string",
                    "location" => "uri",
                    "description" => "This is the id of the product(s)",
                    "required" => false,
                ),

            ),
        ),

        /**
         *    getProductPriceOnList() method
         *
         *    reference: https://www.brightpearl.com/developer/latest/product/product-price/get.html
         */
        "getProductPriceOnList" => array(
            "httpMethod" => "GET",
            "uri" => "/{apiVersion}/{account_code}/product-service/product-price/{id}/price-list/{list-id}",
            "summary" => "Get product prices",
            "responseModel" => "defaultJsonResponse",
            "parameters" => array(

                "id" => array(
                    "type" => "string",
                    "location" => "uri",
                    "description" => "This is the id of the product(s)",
                    "required" => true,
                ),

                "list-id" => array(
                    "type" => "string",
                    "location" => "uri",
                    "description" => "This is the id of the product list(s)",
                    "required" => true,
                ),

            ),
        ),

        /**
         *    optionsProductPriceOnList() method
         *
         *    reference: https://www.brightpearl.com/developer/latest/product/product-price/options.html
         */
        "optionsProductPriceOnList" => array(
            "httpMethod" => "OPTIONS",
            "uri" => "/{apiVersion}/{account_code}/product-service/product-price/{id}/price-list/{list-id}",
            "summary" => "Get valid product price requests",
            "responseModel" => "defaultJsonResponse",
            "parameters" => array(

                "id" => array(
                    "type" => "string",
                    "location" => "uri",
                    "description" => "This is the id of the product(s)",
                    "default" => "*",
                    "required" => false,
                ),

                "list-id" => array(
                    "type" => "string",
                    "location" => "uri",
                    "description" => "This is the id of the product list(s)",
                    "required" => true,
                ),

            ),
        ),

        /**
         *    getProductSupplier() method
         *
         *    reference: https://www.brightpearl.com/developer/latest/product/product%20supplier/get.html
         */
        "getProductSupplier" => array(
            "httpMethod" => "GET",
            "uri" => "/{apiVersion}/{account_code}/product-service/product/{id}/supplier",
            "summary" => "Retrieve ID codes for product supplier(s)",
            "responseModel" => "defaultJsonResponse",
            "parameters" => array(

                "id" => array(
                    "type" => "string",
                    "location" => "uri",
                    "description" => "Product id",
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
