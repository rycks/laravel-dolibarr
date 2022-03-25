<?php

namespace Caprel\Dolibarr\Models;

use Illuminate\Database\Eloquent\Model;
use Caprel\Dolibarr\Traits\DolibarrTrait;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Collection;

class DolibarrCommonObject extends Model
{
    use DolibarrTrait;

    public function get($filter = []): Collection
    {
        $data = [];
        foreach ($this->fillable as $key) {
            if (isset($this->$key) && $this->$key != "") {
                $data[$key] = $this->$key;
            }
        }

        $url = $this->objectlabel;
        if (isset($filter['id'])) {
            $url .= '/' . $filter['id'];
            $data = [];
        }

        Log::debug("DolibarrCommonObject::get for " . $this->objectlabel . ", url=$url , data request is " . json_encode($data) . " and filter : " .json_encode($filter));
        $result = ($this->CallAPI(
            "GET",
            $url,
            $data
        ));

        if ($result === null or isset($result->error)) {
            if (isset($result->error->message)) {
                Log::error("dolibarr: " . $result->error->message);
            }
            return collect([]);
        }

        Log::debug("DolibarrCommonObject::get for " . $this->objectlabel . ", data result is " . gettype($result));
        return collect($result);
    }

    public function where($fieldname, $operator, $value)
    {
        $this->sqlfilters = "(t." . $fieldname . ":" . $operator . ":'" . $value . "')";
        return $this;
    }

    public function orderBy($field, $order='ASC')
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
