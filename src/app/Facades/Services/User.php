<?php namespace App\Facades\Services;

use Illuminate\Support\Facades\Facade;

class User extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'userService';
    }
}
