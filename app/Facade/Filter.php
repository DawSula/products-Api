<?php

namespace App\Facade;

use App\Helpers\Filter as HelpersFilter;
use Illuminate\Support\Facades\Facade;

class Filter extends Facade{
    protected static function getFacadeAccessor()
    {
        return HelpersFilter::class;
    }
}
