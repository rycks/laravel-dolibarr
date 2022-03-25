<?php

namespace Caprel\Dolibarr;

use Illuminate\Support\Facades\Facade;

class DolibarrFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'dolibarr';
    }
}
