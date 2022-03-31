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
     * activateLine for a contract
     *
     * @param   [type]  $id          contact id
     * @param   [type]  $lineID      line ID
     * @param   [type]  $attributes  attributes array
     *
     * @return  []                   [return description]
     */
    public function activateLine($id, $lineID, $attributes = [])
    {
        // Log::debug("DolibarrCommonObject call VALIDATE on " . $this->objectlabel . "...");
        $url = $this->objectlabel . '/' . $id . '/lines/' . $lineID . '/activate';
        $data = json_encode($attributes);
        // Log::debug("DolibarrCommonObject::POST for " . $this->objectlabel . ", url=$url , data request is " . $data);
        $result = ($this->CallAPI(
            "PUT",
            $url,
            $data
        ));
        return $result;
    }

}
