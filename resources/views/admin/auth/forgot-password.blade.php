@extends('admin.layouts.auth')

@section('content')

<div class="card shadow">

    <div class="card-header">
        <h4>Forgot Password</h4>
    </div>

    <div class="card-body">

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <form method="POST" action="{{ route('admin.forgot.password.send') }}">
            @csrf

            <div class="mb-3">
                <label>Email</label>

                <input type="email"
                       name="email"
                       class="form-control"
                       required>
            </div>

            <button class="btn btn-success w-100">
                Send Reset Link
            </button>

        </form>

    </div>

</div>

@endsection