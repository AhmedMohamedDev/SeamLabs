<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Delivery extends Model
{
    use HasFactory;
    protected $table = 'delivery';
    
    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function delivery_team()
    {
        return $this->belongsTo(DeliveryTeam::class);
    }
}
