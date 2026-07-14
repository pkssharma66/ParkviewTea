@extends('admin.layouts.app')

@section('title','Edit Product')

@section('content')

<div class="container-fluid">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>

            <h3 class="fw-bold">

                Edit Product

            </h3>

        </div>

        <a href="{{ route('admin.products.index') }}"
           class="btn btn-secondary">

            Back

        </a>

    </div>

    <form action="{{ route('admin.products.update',$product->id) }}"
          method="POST"
          enctype="multipart/form-data">

        @csrf
        @method('PUT')

        @include('admin.products.form')

    </form>

</div>

@endsection