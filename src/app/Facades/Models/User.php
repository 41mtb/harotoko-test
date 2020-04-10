<?php namespace App\Facades\Models;

use Illuminate\Support\Facades\Facade;

class User extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'userModel';
    }
}
