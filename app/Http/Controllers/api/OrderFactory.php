<?php
namespace App\Http\Controllers\api;
use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\Delivery;
use Illuminate\Http\Request;

class OrderFactory
{

    public function initialize(string $type)
    {
        switch ($type) {
            case 'delivery':
                return new DeliveryOrderType();
            case 'dine':
                 return new DineOrderType();
        }
    }
}