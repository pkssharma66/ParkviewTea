@extends('admin.layouts.app')

@section('content')

<div class="card">

<div class="card-header">

<h4>Change Password</h4>

</div>

<div class="card-body">

@if(session('success'))
<div class="alert alert-success">
{{ session('success') }}
</div>
@endif

@if(session('error'))
<div class="alert alert-danger">
{{ session('error') }}
</div>
@endif

<form method="POST" action="{{ route('admin.change.password.update') }}">

@csrf

<div class="mb-3">

<label>Current Password</label>

<input type="password"
name="current_password"
class="form-control">

</div>

<div class="mb-3">

<label>New Password</label>

<input type="password"
name="password"
class="form-control">

</div>

<div class="mb-3">

<label>Confirm Password</label>

<input type="password"
name="password_confirmation"
class="form-control">

</div>

<button class="btn btn-success">

Update Password

</button>

</form>

</div>

</div>

@endsection