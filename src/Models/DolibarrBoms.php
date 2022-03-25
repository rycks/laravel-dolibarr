<?php

namespace Caprel\Dolibarr\Models;

use Caprel\Dolibarr\Models\DolibarrCommonObject;

class DolibarrBoms extends DolibarrCommonObject
{
    protected $fillable = [
        "sortfield",
        "sortorder",
        "limit",
        "page",
        "sqlfilters",
        "objectlabel"
    ];

    protected $attributes = [
        "sortfield" => "t.rowid",
        "sortorder" => "ASC",
        "limit" => 100,
        "page" => "",
        "sqlfilters" => "",
        "objectlabel" => ""
    ];

    public function __construct(array $attributes = [])
    {
        $attributes['objectlabel'] =  "boms";
        parent::__construct($attributes);
    }
}
