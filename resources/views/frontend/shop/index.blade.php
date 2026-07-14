@extends('frontend.layouts.app')

@section('title','Tea Shop')

@section('content')

<div class="container py-5">

<div class="row">

<div class="col-lg-3">

<div class="card shadow-sm">

<div class="card-header">

<h5>Categories</h5>

</div>

<div class="list-group list-group-flush">

<a href="{{ route('shop') }}"
class="list-group-item">

All Products

</a>

@foreach($categories as $cat)

<a href="{{ route('category.products',$cat->slug) }}"
class="list-group-item">

{{ $cat->name }}

</a>

@endforeach

</div>

</div>

</div>

<div class="col-lg-9">

<form method="GET">

<div class="input-group mb-4">

<input
type="text"
name="search"
class="form-control"
placeholder="Search Tea..."

value="{{ request('search') }}">

<button class="btn btn-success">

Search

</button>

</div>

</form>

<div class="row">

@forelse($products as $product)

<div class="col-md-4 mb-4">

<div class="card product-card h-100 shadow">

<img
src="{{ asset('uploads/products/'.$product->thumbnail) }}"
class="card-img-top"
style="height:250px;object-fit:cover;">

<div class="card-body text-center">

<h5>{{ $product->name }}</h5>

<h4 class="text-success">

₹{{ number_format($product->price,2) }}

</h4>

<a
href="{{ route('product.details',$product->slug) }}"
class="btn btn-success">

View Details

</a>

</div>

</div>

</div>

@empty

<div class="col-12">

<div class="alert alert-warning">

No Products Found

</div>

</div>

@endforelse

</div>

{{ $products->links() }}

</div>

</div>

</div>

@endsection