<div class="mb-3">

<label>Title</label>

<input type="text"
       name="title"
       class="form-control"
       value="{{ old('title',$banner->title ?? '') }}"
       required>

</div>

<div class="mb-3">

<label>Subtitle</label>

<input type="text"
       name="subtitle"
       class="form-control"
       value="{{ old('subtitle',$banner->subtitle ?? '') }}">

</div>

<div class="mb-3">

<label>Button Text</label>

<input type="text"
       name="button_text"
       class="form-control"
       value="{{ old('button_text',$banner->button_text ?? '') }}">

</div>

<div class="mb-3">

<label>Button Link</label>

<input type="text"
       name="button_link"
       class="form-control"
       value="{{ old('button_link',$banner->button_link ?? '') }}">

</div>

<div class="mb-3">

<label>Sort Order</label>

<input type="number"
       name="sort_order"
       class="form-control"
       value="{{ old('sort_order',$banner->sort_order ?? 1) }}">

</div>

<div class="mb-3">

<label>Status</label>

<select name="status" class="form-control">

<option value="1"
{{ old('status',$banner->status ?? 1)==1 ? 'selected':'' }}>

Active

</option>

<option value="0"
{{ old('status',$banner->status ?? 1)==0 ? 'selected':'' }}>

Inactive

</option>

</select>

</div>

<div class="mb-3">

<label>Banner Image</label>

<input type="file"
       name="image"
       class="form-control">

@if(isset($banner) && $banner->image)

<div class="mt-3">

<img src="{{ asset('uploads/banners/'.$banner->image) }}"
     width="250"
     class="img-thumbnail">

</div>

@endif

</div>