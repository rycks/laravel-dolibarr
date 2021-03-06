<?php
namespace Caprel\Dolibarr\Models;

use Caprel\Dolibarr\Models\DolibarrCommonObject;

class DolibarrProducts extends DolibarrCommonObject
{
    protected $fillable = [
        "id",
        "sortfield",
        "sortorder",
        "limit",
        "page",
        "mode",
        "category",
        "sqlfilters",
        "ids_only",
        "objectlabel",
        "variant_filter",
        "pagination_data",
    ];

    protected $attributes = [
        "id" => null,
        "sortfield" => "t.rowid",
        "sortorder" => "ASC",
        "limit" => 100,
        "page" => "",
        "mode" => "",
        "category" => "",
        "sqlfilters" => "",
        "ids_only" => "",
        "objectlabel" => "",
        "variant_filter" => "",
        "pagination_data" => "",
    ];

    public function __construct(array $attributes = [])
    {
        $attributes['objectlabel'] =  "products";
        parent::__construct($attributes);
    }

    /**
     * get all sub products (kit)
     *
     * @param   int  $productID  id product
     *
     * @return  array  list of products
     */
    public function subProducts($productID)
    {
        $result = ($this->CallAPI(
            "GET",
            $this->objectlabel . '/' . $productID . '/subproducts/',
        ));
        return $result;
    }
}
