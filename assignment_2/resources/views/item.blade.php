@extends('show')

@section('title', 'Item Information')

@section('header', 'Item Information')

@section('content')
    <form>
        <label>Item No:</label>
        <input type="text" name="itemNo" value="{{ $itemNo }}"readonly><br><br>
        <label>Name:</label>
        <input type="text" name="name" value="{{ $name }}"readonly><br><br>
        <label>Price:</label>
        <input type="text" name="price" value="{{ $price }}"readonly><br><br>
    </form>
@endsection