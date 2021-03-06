<?php

namespace Caprel\Dolibarr\Models;

use Caprel\Dolibarr\Models\DolibarrCommonObject;

class DolibarrContacts extends DolibarrCommonObject
{
    protected $fillable = [
        "id",
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
        "id" => null,
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

    /**
     * add a tag / categorie on a people/contact
     *
     * @param   [type]  $id     [$id description]
     * @param   [type]  $catID  [$catID description]
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
