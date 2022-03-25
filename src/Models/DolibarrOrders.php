<?php

namespace Caprel\Dolibarr\Models;

use Caprel\Dolibarr\Models\DolibarrCommonObject;

class DolibarrOrders extends DolibarrCommonObject
{
    protected $fillable = [
        "sortfield",
        "sortorder",
        "limit",
        "page",
        "thirdparty_ids",
        "sqlfilters",
        "objectlabel"
    ];

    protected $attributes = [
        "sortfield" => "t.rowid",
        "sortorder" => "ASC",
        "limit" => 100,
        "page" => "",
        "thirdparty_ids" => "",
        "sqlfilters" => "",
        "objectlabel" => ""
    ];

    public function __construct(array $attributes = [])
    {
        $attributes['objectlabel'] =  "orders";
        parent::__construct($attributes);
    }
}
