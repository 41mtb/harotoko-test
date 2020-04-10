<?php namespace App\Facades\Models;

use Illuminate\Support\Facades\Facade;

class Order extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'orderModel';
    }
}
