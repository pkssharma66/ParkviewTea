@extends('admin.layouts.app')

@section('content')

<div class="row">
    <h2 class="mb-4">

Welcome,

{{ $admin->name }}

</h2>

<div class="col-md-3">

<div class="card shadow">

<div class="card-body">

<h5>

Products

</h5>

<h2>

0

</h2>

</div>

</div>

</div>

<div class="col-md-3">

<div class="card shadow">

<div class="card-body">

<h5>

Orders

</h5>

<h2>

0

</h2>

</div>

</div>

</div>

<div class="col-md-3">

<div class="card shadow">

<div class="card-body">

<h5>

Customers

</h5>

<h2>

0

</h2>

</div>

</div>

</div>

<div class="col-md-3">

<div class="card shadow">

<div class="card-body">

<h5>

Revenue

</h5>

<h2>

₹0

</h2>

</div>

</div>

</div>

</div>

@endsection