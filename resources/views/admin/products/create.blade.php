@extends('admin.layouts.app')

@section('title','Add Product')

@section('content')

<div class="container-fluid">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>
            <h3 class="fw-bold">Add Product</h3>
            <small class="text-muted">Create a new tea product</small>
        </div>

        <a href="{{ route('admin.products.index') }}"
           class="btn btn-secondary">

            Back

        </a>

    </div>

    <form action="{{ route('admin.products.store') }}"
          method="POST"
          enctype="multipart/form-data">

        @include('admin.products.form')

    </form>

</div>

@endsection