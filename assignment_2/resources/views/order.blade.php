@extends('show')

@section('title', 'Order Information')

@section('header', 'Order Information')

@section('content')
    <form>
        <label>Customer ID:</label>
        <input type="text" name="customerId" value="{{ $customerId }}"readonly><br><br>
        <label>Customer Name:</label>
        <input type="text" name="customerName" value="{{ $customerName }}"readonly><br><br>
        <label>Order No:</label>
        <input type="text" name="orderNo" value="{{ $orderNo }}"readonly><br><br>
        <label>Date:</label>
        <input type="date" name="date" value="{{ $date }}"><br><br>
    </form>
@endsection
