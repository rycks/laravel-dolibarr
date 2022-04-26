<?php

namespace Caprel\Dolibarr\Models;

use Caprel\Dolibarr\Models\DolibarrCommonObject;

class DolibarrOrders extends DolibarrCommonObject
{
    protected $fillable = [
        "id",
        "sortfield",
        "sortorder",
        "limit",
        "page",
        "thirdparty_ids",
        "sqlfilters",
        "objectlabel"
    ];

    protected $attributes = [
        "id" => null,
        "sortfield" => "t.rowid",
        "sortorder" => "ASC",
        "limit" => 100,
        "page" => "",
        "thirdparty_ids" => "",
        "sqlfilters" => "",
        "objectlabel" => ""
    ];

    public function __construct(array $attributes = [])
    {
        $attributes['objectlabel'] =  "orders";
        parent::__construct($attributes);
    }

    public function deleteLine($orderID, $lineID)
    {
        $result = ($this->CallAPI(
            "DELETE",
            $this->objectlabel . '/' . $orderID . '/lines/' . $lineID
        ));
        return $result;
    }

    public function addLine($orderID, $data)
    {
        $result = ($this->CallAPI(
            "POST",
            $this->objectlabel . '/' . $orderID . '/lines/',
            json_encode($data)
        ));
        return $result;
    }
}
