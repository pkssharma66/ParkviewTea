<section class="py-5 bg-light">

    <div class="container">

        <div class="section-title">
            <h2>Trending Products</h2>
        </div>

        <div class="row">

            @forelse($trendingProducts as $product)

                <div class="col-lg-3 col-md-6 mb-4">

                    @include('frontend.partials.product-card')

                </div>

            @empty

                <div class="col-12 text-center">
                    <p>No Trending Products Found.</p>
                </div>

            @endforelse

        </div>

    </div>

</section>