<?php namespace App\Facades\Models;

use Illuminate\Support\Facades\Facade;

class Ticket extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'ticketModel';
    }
}
