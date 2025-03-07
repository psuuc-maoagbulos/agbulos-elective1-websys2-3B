@extends('show')

@section('title', 'Customer Information')

@section('header', 'Customer Information')

@section('content')
    <form>
        <label>Customer ID:</label>
        <input type="text" name="id" value="{{ $id }}" readonly>
        
        <br><br>

        <label>Name:</label>
        <input type="text" name="name" value="{{ $name }}" readonly>
        
        <br><br>

        <label>Address:</label>
        <input type="text" name="address" value="{{ $address }}" readonly>
        
        <br>
    </form>
@endsection
