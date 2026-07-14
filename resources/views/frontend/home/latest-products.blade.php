<section class="py-5 bg-white">

    <div class="container">

        <div class="section-title text-center mb-5">
            <h2>Latest Products</h2>
            <p>Fresh arrivals from Park View Tea</p>
        </div>

        <div class="row">

            @forelse($latestProducts as $product)

                <div class="col-lg-3 col-md-6 mb-4">

                    @include('frontend.partials.product-card')

                </div>

            @empty

                <div class="col-12 text-center">
                    <p>No Latest Products Available.</p>
                </div>

            @endforelse

        </div>

    </div>

</section>