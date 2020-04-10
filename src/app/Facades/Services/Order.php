<?php namespace App\Facades\Services;

use Illuminate\Support\Facades\Facade;

class Order extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'orderService';
    }
}
