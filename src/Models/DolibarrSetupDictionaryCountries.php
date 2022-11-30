<?php

namespace Caprel\Dolibarr\Models;

use Caprel\Dolibarr\Models\DolibarrCommonObject;

class DolibarrSetupDictionaryCountries extends DolibarrCommonObject
{
    protected $fillable = [
        "id",
        "sortfield",
        "sortorder",
        "limit",
        "page",
        "filter",
        "lang",
        "sqlfilter",
        "objectlabel"
    ];

    protected $attributes = [
        "id" => null,
        "sortfield" => "",
        "sortorder" => "",
        "limit" => "2000",
        "page" => "",
        "filter" => "",
        "lang" => "",
        "sqlfilter" => "",
        "objectlabel" => ""
    ];

    public function __construct(array $attributes = [])
    {
        $attributes['objectlabel'] =  "setup/dictionary/countries";
        parent::__construct($attributes);
    }
}
