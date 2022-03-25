<?php

namespace Caprel\Dolibarr\Models;

use Caprel\Dolibarr\Models\DolibarrCommonObject;

class DolibarrContacts extends DolibarrCommonObject
{
    protected $fillable = [
        "sortfield",
        "sortorder",
        "limit",
        "page",
        "thirdparty_ids",
        "category",
        "sqlfilters",
        "includecount",
        "includeroles",
        "objectlabel"
    ];

    protected $attributes = [
        "sortfield" => "t.rowid",
        "sortorder" => "ASC",
        "limit" => 100,
        "page" => "",
        "thirdparty_ids" => "",
        "category" => "",
        "sqlfilters" => "",
        "includecount" => "",
        "includeroles" => "",
        "objectlabel" => ""
    ];

    public function __construct(array $attributes = [])
    {
        $attributes['objectlabel'] =  "contacts";
        parent::__construct($attributes);
    }
}
