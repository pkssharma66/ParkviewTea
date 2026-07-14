@extends('admin.layouts.app')

@section('title', 'Banner Management')

@section('content')

<div class="container-fluid">

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3>Banner Management</h3>

        <a href="{{ route('admin.banners.create') }}" class="btn btn-success">
            <i class="fa fa-plus"></i> Add Banner
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

                <thead class="table-dark">

                <tr>

                    <th>ID</th>

                    <th>Image</th>

                    <th>Title</th>

                    <th>Subtitle</th>

                    <th>Status</th>

                    <th>Order</th>

                    <th width="180">Action</th>

                </tr>

                </thead>

                <tbody>

                @forelse($banners as $banner)

                    <tr>

                        <td>{{ $banner->id }}</td>

                        <td>

                            <img src="{{ asset('uploads/banners/'.$banner->image) }}"
                                 width="120"
                                 class="img-thumbnail">

                        </td>

                        <td>{{ $banner->title }}</td>

                        <td>{{ $banner->subtitle }}</td>

                        <td>

                            @if($banner->status)

                                <span class="badge bg-success">Active</span>

                            @else

                                <span class="badge bg-danger">Inactive</span>

                            @endif

                        </td>

                        <td>{{ $banner->sort_order }}</td>

                        <td>

                            <a href="{{ route('admin.banners.edit',$banner->id) }}"
                               class="btn btn-warning btn-sm">

                                Edit

                            </a>

                            <form action="{{ route('admin.banners.destroy',$banner->id) }}"
                                  method="POST"
                                  style="display:inline">

                                @csrf
                                @method('DELETE')

                                <button onclick="return confirm('Delete Banner?')"
                                        class="btn btn-danger btn-sm">

                                    Delete

                                </button>

                            </form>

                        </td>

                    </tr>

                @empty

                    <tr>

                        <td colspan="7" class="text-center">

                            No Banner Found

                        </td>

                    </tr>

                @endforelse

                </tbody>

            </table>

        </div>

    </div>

</div>

@endsection