<?php namespace App\Facades\Services;

use Illuminate\Support\Facades\Facade;

class Profile extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'profileService';
    }
}
