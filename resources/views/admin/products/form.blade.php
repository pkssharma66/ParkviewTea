@if($errors->any())

<div class="alert alert-danger">

    <ul class="mb-0">

        @foreach($errors->all() as $error)

        <li>{{ $error }}</li>

        @endforeach

    </ul>

</div>

@endif
@csrf

<div class="row">

    <div class="col-lg-8">

        <div class="card shadow-sm mb-4">

            <div class="card-header">

                <strong>Product Information</strong>

            </div>

            <div class="card-body">

                <div class="row">

                    <div class="col-md-6 mb-3">

                        <label>Category *</label>

                        <select name="category_id"
                            class="form-select"
                            required>

                            <option value="">Select Category</option>

                            @foreach($categories as $category)

                            <option value="{{ $category->id }}"
                                {{ old('category_id',$product->category_id ?? '')==$category->id?'selected':'' }}>

                                {{ $category->name }}

                            </option>

                            @endforeach

                        </select>

                    </div>

                    <div class="col-md-6 mb-3">

                        <label>Product Name *</label>

                        <input
                            type="text"
                            id="name"
                            name="name"
                            class="form-control"
                            value="{{ old('name',$product->name ?? '') }}"
                            required>

                    </div>

                </div>

                <div class="row">

                    <div class="col-md-6 mb-3">

                        <label>Slug</label>

                        <input
                            type="text"
                            id="slug"
                            name="slug"
                            class="form-control"
                            value="{{ old('slug',$product->slug ?? '') }}">

                    </div>

                    <div class="col-md-3 mb-3">

                        <label>SKU</label>

                        <input
                            type="text"
                            name="sku"
                            class="form-control"
                            value="{{ old('sku',$product->sku ?? '') }}">

                    </div>

                    <div class="col-md-3 mb-3">

                        <label>Barcode</label>

                        <input
                            type="text"
                            name="barcode"
                            class="form-control"
                            value="{{ old('barcode',$product->barcode ?? '') }}">

                    </div>

                </div>

                <div class="row">

                    <div class="col-md-4 mb-3">

                        <label>Price *</label>

                        <input
                            type="number"
                            step="0.01"
                            name="price"
                            class="form-control"
                            value="{{ old('price',$product->price ?? '') }}"
                            required>

                    </div>


                    <div class="col-md-4 mb-3">

                        <label>Sale Price</label>

                        <input
                            type="number"
                            step="0.01"
                            name="sale_price"
                            class="form-control"
                            value="{{ old('sale_price',$product->sale_price ?? '') }}">

                    </div>
                    <div class="col-md-4 mb-3">

                        <label>Stock Quantity <span class="text-danger">*</span></label>

                        <input
                            type="number"
                            name="stock"
                            class="form-control"
                            min="0"
                            value="{{ old('stock', $product->stock ?? 0) }}"
                            required>

                    </div>

                    <div class="col-md-4 mb-3">

                        <label>Stock Status</label>

                        <select
                            name="stock_status"
                            class="form-select">

                            <option value="In Stock"
                                {{ old('stock_status',$product->stock_status ?? 'In Stock')=='In Stock' ? 'selected' : '' }}>
                                In Stock
                            </option>

                            <option value="Out of Stock"
                                {{ old('stock_status',$product->stock_status ?? '')=='Out of Stock' ? 'selected' : '' }}>
                                Out of Stock
                            </option>

                            <option value="Coming Soon"
                                {{ old('stock_status',$product->stock_status ?? '')=='Coming Soon' ? 'selected' : '' }}>
                                Coming Soon
                            </option>

                        </select>

                    </div>
                    <div class="col-md-4 mb-3">

                        <label>Weight</label>

                        <input
                            type="text"
                            name="weight"
                            class="form-control"
                            placeholder="250g / 500g / 1kg"
                            value="{{ old('weight',$product->weight ?? '') }}">

                    </div>

                </div>

                <div class="mb-3">

                    <label>Description</label>

                    <textarea
                        id="description"
                        name="description"
                        class="form-control"
                        rows="10">{{ old('description',$product->description ?? '') }}</textarea>

                </div>
                <div class="mb-3">

                    <label>Product Tags</label>

                    <input
                        type="text"
                        name="tags"
                        class="form-control"
                        placeholder="Organic, Premium, Green Tea"
                        value="{{ old('tags',$product->tags ?? '') }}">

                    <small class="text-muted">

                        Separate tags with commas.

                    </small>

                </div>

            </div>

        </div>

        <div class="card shadow-sm">

            <div class="card-header">

                <strong>SEO Information</strong>

            </div>

            <div class="card-body">

                <div class="mb-3">

                    <label>Meta Title</label>

                    <input
                        type="text"
                        class="form-control"
                        name="meta_title"
                        value="{{ old('meta_title',$product->meta_title ?? '') }}">

                </div>

                <div class="mb-3">

                    <label>Meta Description</label>

                    <textarea
                        name="meta_description"
                        class="form-control"
                        rows="5">{{ old('meta_description',$product->meta_description ?? '') }}</textarea>

                </div>

            </div>

        </div>

    </div>

    <div class="col-lg-4">

        <div class="card shadow-sm mb-4">

            <div class="card-header">

                <strong>Product Image</strong>

            </div>

            <div class="card-body">
                <input
                    type="file"
                    id="thumbnail"
                    name="thumbnail"
                    class="form-control"
                    accept="image/*">

                @if(isset($product) && $product->thumbnail)

                <img
                    src="{{ asset('uploads/products/'.$product->thumbnail) }}"
                    class="img-fluid rounded mb-3">

                @endif

                <img
                    id="preview"
                    class="img-fluid rounded mt-3"
                    style="display:none;max-height:220px;">

            </div>

        </div>

        <div class="card-body">

            <label class="form-label">Gallery Images</label>

            <input
                type="file"
                id="gallery"
                name="images[]"
                class="form-control"
                multiple
                accept="image/*">

            @if(isset($product))

            <div class="row mt-3">

                @foreach($product->images as $image)

                <div class="col-4 mb-2">

                    <img
                        src="{{ asset('uploads/products/'.$image->image) }}"
                        class="img-fluid rounded border">

                </div>

                @endforeach

            </div>

            @endif

            <div class="row mt-3" id="galleryPreview"></div>

        </div>

        <div class="card shadow-sm">

            <div class="card-header">

                <strong>Options</strong>

            </div>

            <div class="card-body">

                <div class="form-check mb-2">

                    <input
                        class="form-check-input"
                        type="checkbox"
                        name="featured"
                        value="1"
                        {{ old('featured',$product->featured ?? 0)?'checked':'' }}>

                    <label class="form-check-label">

                        Featured

                    </label>

                </div>

                <div class="form-check mb-2">

                    <input
                        class="form-check-input"
                        type="checkbox"
                        name="trending"
                        value="1"
                        {{ old('trending',$product->trending ?? 0)?'checked':'' }}>

                    <label>

                        Trending

                    </label>

                </div>

                <div class="form-check mb-3">

                    <input
                        class="form-check-input"
                        type="checkbox"
                        name="best_seller"
                        value="1"
                        {{ old('best_seller',$product->best_seller ?? 0)?'checked':'' }}>

                    <label>

                        Best Seller

                    </label>

                </div>

                <label>Status</label>

                <select
                    name="status"
                    class="form-select">

                    <option value="1"
                        {{ old('status',$product->status ?? 1)==1 ? 'selected' : '' }}>
                        Active
                    </option>

                    <option value="0"
                        {{ old('status',$product->status ?? 1)==0 ? 'selected' : '' }}>
                        Inactive
                    </option>

                </select>

            </div>

        </div>

        <button class="btn btn-success w-100 mt-4">

            Save Product

        </button>

    </div>

</div>

<script>
    const galleryPreview = document.getElementById('galleryPreview');

    document.getElementById('gallery').addEventListener('change', function() {

        galleryPreview.innerHTML = '';

        for (let file of this.files) {

            let reader = new FileReader();

            reader.onload = function(e) {

                galleryPreview.innerHTML += `
                <div class="col-4 mb-2">
                    <img src="${e.target.result}" class="img-fluid rounded border">
                </div>
            `;

            };

            reader.readAsDataURL(file);

        }

    });

    document.getElementById('name').addEventListener('keyup', function() {

        let slug = this.value
            .toLowerCase()
            .replace(/ /g, '-')
            .replace(/[^\w-]+/g, '');

        document.getElementById('slug').value = slug;

    });
</script>
<script>
    ClassicEditor
        .create(document.querySelector('#description'))
        .catch(error => {
            console.error(error);
        });
</script>
<script>
    document.getElementById('thumbnail').onchange = function(e) {

        const reader = new FileReader();

        reader.onload = function() {

            document.getElementById('preview').src = reader.result;

            document.getElementById('preview').style.display = 'block';

        }

        reader.readAsDataURL(e.target.files[0]);

    }
</script>