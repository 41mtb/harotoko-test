<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    protected $guarded = ['id'];
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function shop()
    {
        return $this->belongsTo(Shop::class);
    }

    public function ticketImages()
    {
        return $this->hasMany(TicketImage::class);
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}
