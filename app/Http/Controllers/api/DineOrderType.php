<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\api\OrderInterface;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Reservation;
use App\Models\Waiter;

/*
In dine in type will add table number and service charge
and waiter name.
*/

class DineOrderType implements OrderInterface
{
    public function create(Request $request)
    {
        $waiterModel = new Waiter();
        $waiter = $waiterModel->where("name",$request->waiter_name)->first();
       
        // if(empty($waiter)){
        //     return response()->json("No Waiter Under This Name");
        // }

        $reservation = new Reservation();
        $reservation->table_number = $request->table_number;
        $reservation->service_charge = $request->service_charge;
        $reservation->waiter_id = 9;
        $reservation->save();

        return response()->json("Dine Order Created");
    }
}
