<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function customer($id, $name, $address)
    {
        return view('customer', compact('id', 'name', 'address'));
    }

    public function item($itemNo, $name, $price)
    {
        return view('item', compact('itemNo', 'name', 'price'));
    }

    public function order($customerId, $customerName, $orderNo, $date)
    {
        return view('order', compact('customerId', 'customerName', 'orderNo', 'date'));
    }

    public function orderDetails($transNo, $orderNo, $itemId, $name, $price, $qty)
    {
        return view('orderdetails', compact('transNo', 'orderNo', 'itemId', 'name', 'price', 'qty'));
    }
}
