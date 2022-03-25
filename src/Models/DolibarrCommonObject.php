<?php
/**
 * DolibarrCommonObject.php
 *
 * Copyright (c) 2022 Eric Seigne <eric.seigne@cap-rel.fr>
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Affero General Public License as
 * published by the Free Software Foundation, either version 3 of the
 * License, or (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU Affero General Public License for more details.
 *
 * You should have received a copy of the GNU Affero General Public License
 * along with this program.  If not, see <https://www.gnu.org/licenses/>.
 */
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
        foreach($this->fillable as $key) {
            if (isset($this->$key) && $this->$key != "") {
                $data[$key] = $this->$key;
            }
        }
        Log::debug("DolibarrCommonObject::get for " . $this->objectlabel . ", data request is " . json_encode($data));

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
