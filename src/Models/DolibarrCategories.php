<?php
namespace Caprel\Dolibarr\Models;

use Caprel\Dolibarr\Models\DolibarrCommonObject;

class DolibarrCategories extends DolibarrCommonObject
{
    protected $fillable = [
        "id",
        "sortfield",
        "sortorder",
        "limit",
        "page",
        "type",
        "sqlfilters",
        "objectlabel"
    ];

    protected $attributes = [
        "id" => null,
        "sortfield" => "t.rowid",
        "sortorder" => "ASC",
        "limit" => 100,
        "page" => "",
        "type" => "",
        "sqlfilters" => "",
        "objectlabel" => ""
    ];

    public function __construct(array $attributes = [])
    {
        $attributes['objectlabel'] = "categories";
        parent::__construct($attributes);
    }

    /**
     * add a tag / categorie on a object
     *
     * @param   int     $categID     [$categID description]
     * @param   String  $objectType  [$objectType description]
     * @param   int     $objectID    [$objectID description]
     *
     * @return  [type]               [return description]
     */
    public function addCategorieOnObject(int $categID, String $objectType, int $objectID)
    {
        $url = $this->objectlabel . '/' . $categID . '/objects/' . $objectType . '/' . $objectID;
        $result = ($this->CallAPI(
            "POST",
            $url,
            null
        ));
        return $result;
    }
}
