<?php

namespace Caprel\Dolibarr\Models;

use Caprel\Dolibarr\Models\DolibarrCommonObject;

class DolibarrSetupCompany extends DolibarrCommonObject
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
        "limit" => "",
        "page" => "",
        "filter" => "",
        "lang" => "",
        "sqlfilter" => "",
        "objectlabel" => ""
    ];

    //Note if your API user is not admin, please add a custom config key in your dolibarr
    //API_LOGINS_ALLOWED_FOR_GET_COMPANY and your api user in value
    public function __construct(array $attributes = [])
    {
        $attributes['objectlabel'] =  "setup/company";
        parent::__construct($attributes);
    }
}
