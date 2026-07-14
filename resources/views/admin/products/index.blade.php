@extends('admin.layouts.app')

@section('title', 'Products')

@section('content')

<div class="container-fluid">

    <!-- Page Header -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h3 class="fw-bold mb-0">Product Management</h3>
            <small class="text-muted">Manage all tea products</small>
        </div>

        <a href="{{ route('admin.products.create') }}" class="btn btn-success">
            <i class="fas fa-plus"></i> Add Product
        </a>
    </div>

    <!-- Success Message -->
    @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show">

        {{ session('success') }}

        <button class="btn-close" data-bs-dismiss="alert"></button>

    </div>
    @endif

    <div class="card shadow border-0">

        <div class="card-header bg-white">

            <h5 class="mb-0">
                Product List
            </h5>

        </div>

        <div class="card-body">

            <div class="table-responsive">

                <table id="productTable" class="table table-bordered table-hover align-middle">

                    <thead class="table-dark">

                        <tr>

                            <th width="60">#</th>

                            <th width="90">Image</th>

                            <th>Product</th>

                            <th>Category</th>

                            <th>SKU</th>

                            <th>Price</th>

                            <th>Sale Price</th>

                            <th>Stock</th>

                            <th>Status</th>

                            <th width="180">Action</th>

                        </tr>

                    </thead>

                    <tbody>

                        @forelse($products as $key=>$product)

                        <tr>

                            <td>
                                {{ $products->firstItem()+$key }}
                            </td>

                            <td>

                                @if($product->thumbnail)

                                <img src="{{ asset('uploads/products/'.$product->thumbnail) }}"
                                    width="70"
                                    class="rounded border">

                                @else

                                <img src="https://via.placeholder.com/70x70?text=No+Image"
                                    class="rounded border">

                                @endif

                            </td>

                            <td>

                                <strong>{{ $product->name }}</strong>

                                <br>

                                @if($product->featured)

                                <span class="badge bg-primary">
                                    Featured
                                </span>

                                @endif

                                @if($product->trending)

                                <span class="badge bg-warning text-dark">
                                    Trending
                                </span>

                                @endif

                                @if($product->best_seller)

                                <span class="badge bg-success">
                                    Best Seller
                                </span>

                                @endif

                            </td>

                            <td>

                                {{ $product->category->name ?? '-' }}

                            </td>

                            <td>

                                {{ $product->sku }}

                            </td>

                            <td>

                                ₹ {{ number_format($product->price,2) }}

                            </td>

                            <td>

                                @if($product->sale_price)

                                <span class="text-success">

                                    ₹ {{ number_format($product->sale_price,2) }}

                                </span>

                                @else

                                -

                                @endif

                            </td>

                            <td>

                                @if($product->stock>10)

                                <span class="badge bg-success">

                                    {{ $product->stock }}

                                </span>

                                @elseif($product->stock>0)

                                <span class="badge bg-warning">

                                    {{ $product->stock }}

                                </span>

                                @else

                                <span class="badge bg-danger">

                                    Out of Stock

                                </span>

                                @endif

                            </td>

                            <td>

                                @if($product->status)

                                <span class="badge bg-success">

                                    Active

                                </span>

                                @else

                                <span class="badge bg-secondary">

                                    Inactive

                                </span>

                                @endif

                            </td>

                            <td>

                                <a href="{{ route('admin.products.edit',$product->id) }}"
                                    class="btn btn-sm btn-warning">

                                    Edit

                                </a>

                                <form
                                    class="deleteForm"
                                    action="{{ route('admin.products.destroy',$product->id) }}"
                                    method="POST">

                                    @csrf

                                    @method('DELETE')

                                    <button
                                        type="submit"
                                        class="btn btn-danger btn-sm">

                                        Delete

                                    </button>

                                </form>

                            </td>

                        </tr>

                        @empty

                        <tr>

                            <td colspan="10" class="text-center">

                                No Products Found

                            </td>

                        </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

            <div class="mt-3">

                {{ $products->links() }}

            </div>

        </div>

    </div>

</div>

@endsection
<script>
    document.querySelectorAll('.deleteForm').forEach(function(form){

form.addEventListener('submit',function(e){

e.preventDefault();

Swal.fire({

title:'Delete Product?',

text:'You cannot undo this.',

icon:'warning',

showCancelButton:true,

confirmButtonColor:'#198754',

cancelButtonColor:'#dc3545'

}).then((result)=>{

if(result.isConfirmed){

form.submit();

}

});

});

});
</script>
<script>
    new DataTable('#productTable',{
pageLength:10,
responsive:true
});
</script>