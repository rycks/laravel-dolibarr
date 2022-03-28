<?php

namespace Caprel\Dolibarr\Models;

use Illuminate\Support\Facades\Log;
use Caprel\Dolibarr\Models\DolibarrCommonObject;

class DolibarrThirdparties extends DolibarrCommonObject
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
        "objectlabel"
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
        "objectlabel" => ""
    ];

    public function __construct(array $attributes = [])
    {
        // Log::debug("Constructeur de DolibarrThirdparties");

        $attributes['objectlabel'] =  "thirdparties";
        parent::__construct($attributes);
    }
}
