@extends('admin.layouts.auth')

@section('content')

<div class="card shadow">

<div class="card-header">
    <h4>Reset Password</h4>
</div>

<div class="card-body">

<form method="POST" action="{{ route('admin.password.update') }}">
@csrf

<input type="hidden" name="token" value="{{ $token }}">

<input type="hidden" name="email" value="{{ $email }}">

<div class="mb-3">
<label>New Password</label>
<input type="password"
       name="password"
       class="form-control"
       required>
</div>

<div class="mb-3">
<label>Confirm Password</label>
<input type="password"
       name="password_confirmation"
       class="form-control"
       required>
</div>

<button class="btn btn-success w-100">
Reset Password
</button>

</form>

</div>

</div>

@endsection