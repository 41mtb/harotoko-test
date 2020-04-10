<?php namespace App\Facades\Services;

use Illuminate\Support\Facades\Facade;

class Ticket extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'ticketService';
    }
}
