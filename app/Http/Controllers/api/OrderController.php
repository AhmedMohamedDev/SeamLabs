<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\Delivery;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function createOrder(Request $request)
    {
        $orderFactory = new OrderFactory();
        $order = $orderFactory->initialize($request->order_type);
        return $order->create($request);
    }
}
