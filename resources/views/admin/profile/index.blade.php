@extends('admin.layouts.app')

@section('content')

<div class="card">

    <div class="card-header">
        <h4>My Profile</h4>
    </div>

    <div class="card-body">

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <form method="POST" action="{{ route('admin.profile.update') }}">
            @csrf

            <div class="mb-3">
                <label>Name</label>
                <input type="text"
                       name="name"
                       value="{{ old('name', $admin->name) }}"
                       class="form-control">
            </div>

            <div class="mb-3">
                <label>Email</label>
                <input type="email"
                       value="{{ $admin->email }}"
                       class="form-control"
                       readonly>
            </div>

            <div class="mb-3">
                <label>Mobile</label>
                <input type="text"
                       name="mobile"
                       value="{{ old('mobile', $admin->mobile) }}"
                       class="form-control">
            </div>

            <button class="btn btn-success">
                Update Profile
            </button>

        </form>

    </div>

</div>

@endsection