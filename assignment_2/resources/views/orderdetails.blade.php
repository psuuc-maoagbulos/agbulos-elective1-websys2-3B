@extends('show')

@section('title', 'Order Details')

@section('header', 'Order Details ')

@section('content')
    <form>
        <label>Transaction No:</label>
        <input type="text" name="transNo" value="{{ $transNo }}"readonly><br><br>
        <label>Order No:</label>
        <input type="text" name="orderNo" value="{{ $orderNo }}"readonly><br><br>
        <label>Item ID:</label>
        <input type="text" name="itemId" value="{{ $itemId }}"readonly><br><br>
        <label>Item Name:</label>
        <input type="text" name="name" value="{{ $name }}"readonly><br><br>
        <label>Price:</label>
        <input type="text" name="price" value="{{ $price }}"readonly><br><br>
        <label>Quantity:</label>
        <input type="text" name="qty" value="{{ $qty }}"readonly><br><br>
    </form>
@endsection
