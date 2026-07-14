@extends('admin.layouts.app')

@section('title','Edit Category')

@section('content')

<div class="container-fluid">

    <div class="card shadow">

        <div class="card-header">

            <h4>Edit Category</h4>

        </div>

        <div class="card-body">

            <form method="POST"
                action="{{ route('admin.categories.update',$category->id) }}"
                enctype="multipart/form-data">

                @csrf

                @method('PUT')

                @include('admin.category.form')

                <button class="btn btn-primary">

                    Update Category

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