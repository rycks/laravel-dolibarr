<?php


namespace Caprel\Dolibarr\Models;

use Caprel\Dolibarr\Models\DolibarrCommonObject;

class DolibarrDocuments extends DolibarrCommonObject
{
    protected $fillable = [
        "modulepart",
        "id",
        "ref",
        "sortfield",
        "sortorder",
        "sqlfilters",
        "objectlabel"
    ];

    protected $attributes = [
        "modulepart" => "",
        "id" => "",
        "ref" => "",
        "sortfield" => "t.rowid",
        "sortorder" => "ASC",
        "sqlfilters" => "",
        "objectlabel" => ""
    ];

    public function __construct(array $attributes = [])
    {
        $attributes['objectlabel'] =  "documents";
        parent::__construct($attributes);
    }
}
