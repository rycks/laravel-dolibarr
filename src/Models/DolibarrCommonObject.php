<?php

namespace Caprel\Dolibarr\Models;

use Illuminate\Database\Eloquent\Model;
use Caprel\Dolibarr\Traits\DolibarrTrait;
use Illuminate\Support\Facades\Log;

class DolibarrCommonObject extends Model
{
    use DolibarrTrait;

    public function get() : array
    {
        $data = [];
        foreach ($this->fillable as $key) {
            if (isset($this->$key) && $this->$key != "") {
                $data[$key] = $this->$key;
            }
        }
        // Log::debug("DolibarrCommonObject::get for " . $this->objectlabel . ", data request is " . json_encode($data));

        $result = ($this->CallAPI(
            "GET",
            $this->objectlabel,
            $data
        ));

        if ($result == null or isset($result["error"])) {
            return [];
        }
        return $result;
    }

    public function where($a, $operator, $b)
    {
        $this->sqlfilters = "(t." . $a . ":" . $operator . ":'" . $b . "')";
        return $this;
    }

    public function orderBy($field, $order)
    {
        $this->sortfield = "t." . $field;
        $this->sortorder = $order;
        return $this;
    }

    public function limit($limit)
    {
        $this->limit = $limit;
        return $this;
    }

    public function mode($mode)
    {
        $this->mode = $mode;
        return $this;
    }
}
