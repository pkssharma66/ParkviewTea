<section class="featured-section">

    <div class="container">

        <div class="section-heading text-center">

            <span class="section-badge">

                Best Collection

            </span>

            <h2>

                Featured Products

            </h2>

            <p>

                Carefully selected premium teas crafted for every tea lover.

            </p>

        </div>

        <div class="row g-4">

            @foreach($featuredProducts as $product)

            <div class="col-lg-3 col-md-6">

                @include('frontend.partials.product-card')

            </div>

            @endforeach

        </div>

    </div>

</section>