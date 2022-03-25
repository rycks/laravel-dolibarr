<?php
namespace Caprel\Dolibarr\Models;

use Caprel\Dolibarr\Models\DolibarrCommonObject;

class DolibarrWarehouses extends DolibarrCommonObject
{
    protected $fillable = [
        "sortfield",
        "sortorder",
        "limit",
        "page",
        "category",
        "sqlfilters",
        "objectlabel"
    ];

    protected $attributes = [
        "sortfield" => "t.rowid",
        "sortorder" => "ASC",
        "limit" => 100,
        "page" => "",
        "category" => "",
        "sqlfilters" => "",
        "objectlabel" => ""
    ];

    public function __construct(array $attributes = [])
    {
        $attributes['objectlabel'] =  "warehouses";
        parent::__construct($attributes);
    }
}
