<section class="py-5 bg-white">

    <div class="container">

        <div class="section-title mb-4 text-center">
            <h2>Best Seller Products</h2>
            <p>Our customers' favorite premium teas</p>
        </div>

        <div class="row">

            @forelse($bestSellerProducts as $product)

                <div class="col-lg-3 col-md-6 mb-4">

                    @include('frontend.partials.product-card')

                </div>

            @empty

                <div class="col-12 text-center">
                    <p>No Best Seller Products Available.</p>
                </div>

            @endforelse

        </div>

    </div>

</section>