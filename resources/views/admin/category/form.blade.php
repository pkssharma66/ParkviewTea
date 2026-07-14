<div class="row">

    <div class="col-md-6 mb-3">

        <label>Category Name</label>

        <input type="text"
            class="form-control"
            name="name"
            value="{{ old('name',$category->name ?? '') }}"
            required>

    </div>

    <div class="col-md-6 mb-3">

        <label>Category Image</label>

        <input type="file"
            class="form-control"
            name="image">

        @if(isset($category) && $category->image)

        <img src="{{ asset('uploads/categories/'.$category->image) }}"
            width="100"
            class="mt-2">

        @endif

    </div>

</div>

<div class="mb-3">

    <label>Category Banner</label>

    <input type="file"
        class="form-control"
        name="banner">

    @if(isset($category) && $category->banner)

    <img src="{{ asset('uploads/categories/'.$category->banner) }}"
        width="180"
        class="mt-2">

    @endif

</div>

<div class="mb-3">

    <label>Description</label>

    <textarea class="form-control"
        rows="5"
        name="description">{{ old('description',$category->description ?? '') }}</textarea>

</div>

<div class="row">

    <div class="col-md-6 mb-3">

        <label>SEO Title</label>

        <input type="text"
            class="form-control"
            name="meta_title"
            value="{{ old('meta_title',$category->meta_title ?? '') }}">

    </div>

    <div class="col-md-6 mb-3">

        <label>Sort Order</label>

        <input type="number"
            class="form-control"
            name="sort_order"
            value="{{ old('sort_order',$category->sort_order ?? 1) }}">

    </div>

</div>

<div class="mb-3">

    <label>SEO Description</label>

    <textarea class="form-control"
        rows="3"
        name="meta_description">{{ old('meta_description',$category->meta_description ?? '') }}</textarea>

</div>

<div class="row">

    <div class="col-md-6">

        <label>Status</label>

        <select class="form-control" name="status">

            <option value="1" {{ old('status',$category->status ?? 1)==1?'selected':'' }}>

                Active

            </option>

            <option value="0" {{ old('status',$category->status ?? 1)==0?'selected':'' }}>

                Inactive

            </option>

        </select>

    </div>

    <div class="col-md-6">

        <label>Show on Homepage</label>

        <select class="form-control" name="show_home">

            <option value="1" {{ old('show_home',$category->show_home ?? 1)==1?'selected':'' }}>

                Yes

            </option>

            <option value="0" {{ old('show_home',$category->show_home ?? 1)==0?'selected':'' }}>

                No

            </option>

        </select>

    </div>

</div>