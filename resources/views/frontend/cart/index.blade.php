@extends('frontend.layouts.app')

@section('title','Shopping Cart')

@section('content')

<div class="container py-5">

<h2 class="mb-4">Shopping Cart</h2>

@if(count($cart))

<table class="table table-bordered align-middle">

<thead>

<tr>

<th>Image</th>

<th>Product</th>

<th>Price</th>

<th width="150">Qty</th>

<th>Total</th>

<th></th>

</tr>

</thead>

<tbody>

@php $grandTotal=0; @endphp

@foreach($cart as $item)

@php

$total=$item['price']*$item['quantity'];

$grandTotal+=$total;

@endphp

<tr>

<td width="100">

<img src="{{ asset('uploads/products/'.$item['image']) }}"
width="80">

</td>

<td>{{ $item['name'] }}</td>

<td>₹{{ number_format($item['price'],2) }}</td>

<td>

<form method="POST"
action="{{ route('cart.update',$item['id']) }}">

@csrf

<input
type="number"
name="quantity"
class="form-control"
min="1"
value="{{ $item['quantity'] }}">

<button class="btn btn-success btn-sm mt-2">

Update

</button>

</form>

</td>

<td>

₹{{ number_format($total,2) }}

</td>

<td>

<a
href="{{ route('cart.remove',$item['id']) }}"
class="btn btn-danger btn-sm">

Remove

</a>

</td>

</tr>

@endforeach

</tbody>

</table>

<div class="text-end">

<h3>

Grand Total

₹{{ number_format($grandTotal,2) }}

</h3>

<a href="#" class="btn btn-success btn-lg">

Proceed to Checkout

</a>

</div>

@else

<div class="alert alert-warning">

Your cart is empty.

</div>

@endif

</div>

@endsection