<section id="categories" class="categories-section">

    <div class="container">

        <div class="section-heading text-center">

            <span class="section-badge">

                Our Collection

            </span>

            <h2>

                Explore Tea Categories

            </h2>

            <p>

                Discover premium teas carefully selected from the finest tea gardens.

            </p>

        </div>

        <div class="row g-4">

            @foreach($categories as $category)

            <div class="col-xl-3 col-lg-4 col-md-6">

                <a href="{{ route('category.products',$category->slug) }}"
                    class="text-decoration-none">

                    <div class="category-card">

                        <div class="category-image">

                            @if($category->image)

                            <img src="{{ asset('uploads/categories/'.$category->image) }}"
                                alt="{{ $category->name }}">

                            @else

                            <img src="{{ asset('assets/images/no-image.png') }}"
                                alt="No Image">

                            @endif

                        </div>

                        <div class="category-content">

                            <h4>{{ $category->name }}</h4>

                            <p class="text-muted mb-3">

                                {{ $category->products()->where('status',1)->count() }}

                                Products

                            </p>

                            <span>

                                View Collection

                                <i class="fa-solid fa-arrow-right ms-2"></i>

                            </span>

                        </div>

                    </div>

                </a>

            </div>

            @endforeach

        </div>

    </div>

</section>