<?php namespace App\Facades\Models;

use Illuminate\Support\Facades\Facade;

class Profile extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'profileModel';
    }
}
