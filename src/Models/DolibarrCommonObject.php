<?php
namespace Caprel\Dolibarr\Models;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Log;
use Illuminate\Database\Eloquent\Model;
use Caprel\Dolibarr\Traits\DolibarrTrait;

class DolibarrCommonObject extends Model
{
    use DolibarrTrait;

    public function get(): Collection
    {
        $data = [];
        foreach ($this->fillable as $key) {
            if (isset($this->$key) && $this->$key != "") {
                $data[$key] = $this->$key;
            }
        }

        $url = $this->objectlabel;
        if (isset($data['id']) && null !== $data['id']) {
            $url .= '/' . $data['id'];
            $data = [];
        }

        // Log::debug("DolibarrCommonObject::get for " . $this->objectlabel . ", url=$url , data request is " . json_encode($data));
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

        // Log::debug("DolibarrCommonObject::get for " . $this->objectlabel . ", data result is " . gettype($result));
        return collect($result);
    }

    public function where($fieldname, $operator, $value)
    {
        // Log::debug("DolibarrCommonObject call WHERE $fieldname $operator $value");
        if ($fieldname == "id") {
            $this->id = $value;
        } else {
            $this->sqlfilters = "(t." . $fieldname . ":" . $operator . ":'" . $value . "')";
        }
        return $this;
    }

    public function orderBy($field, $order = 'ASC')
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

    public function create($attributes)
    {
        // Log::debug("DolibarrCommonObject call CREATE on " . $this->objectlabel . "...");
        $url = $this->objectlabel;
        $data = json_encode($attributes);
        // Log::debug("DolibarrCommonObject::POST for " . $this->objectlabel . ", url=$url , data request is " . $data);
        $result = ($this->CallAPI(
            "POST",
            $url,
            $data
        ));
        return $result;
    }


    public function validate($id, $attributes)
    {
        // Log::debug("DolibarrCommonObject call VALIDATE on " . $this->objectlabel . "...");
        $url = $this->objectlabel . '/' . $id . '/validate';
        $data = json_encode($attributes);
        // Log::debug("DolibarrCommonObject::POST for " . $this->objectlabel . ", url=$url , data request is " . $data);
        $result = ($this->CallAPI(
            "POST",
            $url,
            $data
        ));
        return $result;
    }

    public function update(array $attributes = [], array $options = [])
    {
        // Log::debug("DolibarrCommonObject call UPDATE on " . $this->objectlabel . "...");
        $url = $this->objectlabel . '/' . $attributes['id'];
        $data = json_encode($attributes);
        // Log::debug("DolibarrCommonObject::PUT for " . $this->objectlabel . ", url=$url , data request is " . $data);
        $result = ($this->CallAPI(
            "PUT",
            $url,
            $data
        ));
        return $result;
    }

}


