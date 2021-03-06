<?php
/**
 * DolibarrAgendaevents.php
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

use Caprel\Dolibarr\Models\DolibarrCommonObject;

class DolibarrAgendaevents extends DolibarrCommonObject
{
    protected $fillable = [
        "id",
        "sortfield",
        "sortorder",
        "limit",
        "page",
        "user_ids",
        "sqlfilters",
        "objectlabel"
    ];

    protected $attributes = [
        "id" => null,
        "sortfield" => "t.id",
        "sortorder" => "ASC",
        "limit" => 100,
        "page" => "",
        "user_ids" => "",
        "sqlfilters" => "",
        "objectlabel" => ""
    ];

    public function __construct(array $attributes = []) {
        $attributes['objectlabel'] = "agendaevents";
        parent::__construct($attributes);
    }
}
