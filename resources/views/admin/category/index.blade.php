@extends('admin.layouts.app')

@section('title','Categories')

@section('content')

<div class="container-fluid">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <h3>Category Management</h3>

        <a href="{{ route('admin.categories.create') }}" class="btn btn-success">
            <i class="fa fa-plus"></i> Add Category
        </a>

    </div>

    @if(session('success'))

    <div class="alert alert-success">

        {{ session('success') }}

    </div>

    @endif

    <div class="card shadow">

        <div class="card-body">

            <table class="table table-bordered table-hover align-middle">

                <thead class="table-success">

                <tr>

                    <th width="70">Image</th>

                    <th>Name</th>

                    <th>Slug</th>

                    <th>Home</th>

                    <th>Status</th>

                    <th>Sort</th>

                    <th width="170">Action</th>

                </tr>

                </thead>

                <tbody>

                @forelse($categories as $category)

                <tr>

                    <td>

                        @if($category->image)

                        <img src="{{ asset('uploads/categories/'.$category->image) }}"
                             width="60"
                             class="rounded">

                        @endif

                    </td>

                    <td>{{ $category->name }}</td>

                    <td>{{ $category->slug }}</td>

                    <td>

                        @if($category->show_home)

                        <span class="badge bg-primary">

                            Yes

                        </span>

                        @else

                        <span class="badge bg-secondary">

                            No

                        </span>

                        @endif

                    </td>

                    <td>

                        @if($category->status)

                        <span class="badge bg-success">

                            Active

                        </span>

                        @else

                        <span class="badge bg-danger">

                            Inactive

                        </span>

                        @endif

                    </td>

                    <td>{{ $category->sort_order }}</td>

                    <td>

                        <a href="{{ route('admin.categories.edit',$category->id) }}"
                           class="btn btn-warning btn-sm">

                            <i class="fa fa-edit"></i>

                        </a>

                        <form action="{{ route('admin.categories.destroy',$category->id) }}"
                              method="POST"
                              style="display:inline">

                            @csrf

                            @method('DELETE')

                            <button class="btn btn-danger btn-sm"
                                    onclick="return confirm('Delete Category?')">

                                <i class="fa fa-trash"></i>

                            </button>

                        </form>

                    </td>

                </tr>

                @empty

                <tr>

                    <td colspan="7" class="text-center">

                        No Categories Found

                    </td>

                </tr>

                @endforelse

                </tbody>

            </table>

        </div>

    </div>

</div>

@endsection