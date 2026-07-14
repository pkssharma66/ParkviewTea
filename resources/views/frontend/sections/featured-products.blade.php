<section class="py-5 bg-light">

<div class="container">

<h2 class="section-title text-center">

Featured Products

</h2>

<div class="row mt-5">

@for($i=1;$i<=4;$i++)

<div class="col-lg-3">

<div class="product-card">

<img
src="{{ asset('assets/images/products/product.png') }}"
class="img-fluid">

<h5 class="mt-3">

Park View Green Tea

</h5>

<h4 class="text-success">

₹299

</h4>

<a href="#" class="btn btn-theme w-100">

Add To Cart

</a>

</div>

</div>

@endfor

</div>

</div>

</section>
<section class="best-selling py-5">

<div class="container">

<div class="section-title">
<h2>Best Selling Products</h2>
<p>Most Loved by Customers</p>
</div>

<div class="row">

@foreach($bestSellerProducts as $product)

<div class="col-lg-3 col-md-6">

@include('frontend.partials.product-card')

</div>

@endforeach

</div>

</div>

</section>