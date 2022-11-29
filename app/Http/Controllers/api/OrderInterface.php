<?php
namespace App\Http\Controllers\api;
use Illuminate\Http\Request;

interface OrderInterface
{
    public function create(Request $request);
}