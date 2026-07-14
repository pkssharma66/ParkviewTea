@extends('admin.layouts.app')

@section('title','Edit Banner')

@section('content')

<div class="container-fluid">

<div class="card shadow">

<div class="card-header">

<h4>Edit Banner</h4>

</div>

<div class="card-body">

<form action="{{ route('admin.banners.update',$banner->id) }}"
      method="POST"
      enctype="multipart/form-data">

@csrf

@method('PUT')

@include('admin.banners.form')

<button class="btn btn-primary">

Update Banner

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