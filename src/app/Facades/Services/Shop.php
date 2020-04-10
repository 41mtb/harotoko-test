<?php namespace App\Facades\Services;

use Illuminate\Support\Facades\Facade;

class Shop extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'shopService';
    }
}
