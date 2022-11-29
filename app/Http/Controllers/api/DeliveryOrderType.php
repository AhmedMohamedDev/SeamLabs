<?php

namespace App\Http\Controllers\api;
use App\Http\Controllers\api\OrderInterface;
use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\Delivery;
use Illuminate\Http\Request;


class DeliveryOrderType implements OrderInterface
{
    public function create(Request $request)
    {
        $customer = new Customer();
            
        $customer->name  = $request->customer_name;
        $customer->phone = $request->customer_phone;
        $customer->save();
        
        $delivery = new Delivery();
        $delivery->fees  = $request->delivery_fees;
        $delivery->customer_id = $customer->id;
        $delivery->save();
        
       return response()->json("Delivery Order Created");
    }
}
