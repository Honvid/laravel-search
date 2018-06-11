<?php

namespace LinkDoc\Facades;

/*
|--------------------------------------------------------------------------
| CLASS NAME: Search
|--------------------------------------------------------------------------
| @author    honvid
| @datetime  2018-06-08 17:08
| @package   Honvid\Facades
| @description:
|
*/

use Illuminate\Support\Facades\Facade;

class Search extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'search';
    }
}