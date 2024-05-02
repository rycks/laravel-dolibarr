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

    /**
     * add a tag / categorie on a thirdparty
     *
     * @param   [type]  $id     soc (thirdpart) id
     * @param   [type]  $catID  dolibarr category id
     *
     * @return  [type]          [return description]
     */
    public function addCategorie($id, $catID)
    {
        $result = ($this->CallAPI(
            "POST",
            $this->objectlabel . '/' . $id . '/categories/' . $catID
        ));
        return $result;
    }
}
