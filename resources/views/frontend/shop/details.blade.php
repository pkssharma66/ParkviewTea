@extends('frontend.layouts.app')

@section('title',$product->name)

@section('content')

<div class="container py-5">

<div class="row">

<div class="col-lg-6">

<img
src="{{ asset('uploads/products/'.$product->thumbnail) }}"
class="img-fluid rounded shadow">

@if($product->images->count())

<div class="row mt-3">

@foreach($product->images as $image)

<div class="col-3">

<img
src="{{ asset('uploads/products/'.$image->image) }}"
class="img-thumbnail">

</div>

@endforeach

</div>

@endif

</div>

<div class="col-lg-6">

<h2>{{ $product->name }}</h2>

<h3 class="text-success">

₹{{ number_format($product->price,2) }}

</h3>

<p>

{!! $product->description !!}

</p>

<p>

<strong>Category :</strong>

{{ $product->category->name }}

</p>

<div class="d-grid gap-2">

    <form method="POST" action="{{ route('cart.add', $product->id) }}">
        @csrf

        <button type="submit" class="btn btn-success btn-lg w-100">
            <i class="fa fa-shopping-cart"></i> Add To Cart
        </button>
    </form>

    <button class="btn btn-outline-dark btn-lg">
        Buy Now
    </button>

</div>

</div>

</div>

<hr>

<h3 class="mb-4">

Related Products

</h3>

<div class="row">

@foreach($relatedProducts as $item)

<div class="col-md-3">

<div class="card">

<img
src="{{ asset('uploads/products/'.$item->thumbnail) }}"
class="card-img-top">

<div class="card-body text-center">

<h6>{{ $item->name }}</h6>

<a
href="{{ route('product.details',$item->slug) }}"
class="btn btn-success btn-sm">

View

</a>

</div>

</div>

</div>

@endforeach

</div>

</div>

@endsection