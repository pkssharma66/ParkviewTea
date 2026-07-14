@extends('admin.layouts.app')

@section('title','Add Banner')

@section('content')

<div class="container-fluid">

<div class="card shadow">

<div class="card-header">

<h4>Add Banner</h4>

</div>

<div class="card-body">

@if ($errors->any())

<div class="alert alert-danger">

<ul>

@foreach($errors->all() as $error)

<li>{{ $error }}</li>

@endforeach

</ul>

</div>

@endif

<form action="{{ route('admin.banners.store') }}"
      method="POST"
      enctype="multipart/form-data">

@csrf

@include('admin.banners.form')

<button class="btn btn-success">

Save Banner

</button>

<a href="{{ route('admin.banners.index') }}"
class="btn btn-secondary">

Back

</a>

</form>

</div>

</div>

</div>

@endsection