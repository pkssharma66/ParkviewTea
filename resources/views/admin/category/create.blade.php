@extends('admin.layouts.app')

@section('title','Add Category')

@section('content')

<div class="container-fluid">

    <div class="card shadow">

        <div class="card-header">

            <h4>Add Category</h4>

        </div>

        <div class="card-body">

            <form method="POST"
                action="{{ route('admin.categories.store') }}"
                enctype="multipart/form-data">

                @csrf

                @include('admin.category.form')

                <button class="btn btn-success">

                    Save Category

                </button>

                <a href="{{ route('admin.categories.index') }}"
                    class="btn btn-secondary">

                    Back

                </a>

            </form>

        </div>

    </div>

</div>

@endsection