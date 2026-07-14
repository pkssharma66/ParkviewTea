<section class="hero-slider">

    <div id="heroCarousel" class="carousel slide carousel-fade" data-bs-ride="carousel">

        <div class="carousel-inner">

            @foreach($banners as $key=>$banner)

            <div class="carousel-item {{ $key==0 ? 'active' : '' }}">

                <div class="hero-image">

                    <img src="{{ asset('uploads/banners/'.$banner->image) }}"
                        class="w-100"
                        alt="{{ $banner->title }}">

                    <div class="hero-overlay"></div>

                </div>

                <div class="carousel-caption">

                    <div class="container">

                        <div class="row">

                            <div class="col-lg-7">

                                @if($banner->sub_title)

                                <span class="hero-subtitle">

                                    {{ $banner->sub_title }}

                                </span>

                                @endif

                                <h1>

                                    {{ $banner->title }}

                                </h1>

                                @if($banner->description)

                                <p>

                                    {{ $banner->description }}

                                </p>

                                @endif

                                <div class="mt-4">

                                    <a href="/shop" class="btn-theme me-3">

                                        Shop Now

                                    </a>

                                    <a href="#categories" class="btn btn-outline-light px-4 py-3 rounded-pill">

                                        Explore

                                    </a>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

            @endforeach

        </div>

        <button class="carousel-control-prev"
            type="button"
            data-bs-target="#heroCarousel"
            data-bs-slide="prev">

            <span class="carousel-control-prev-icon"></span>

        </button>

        <button class="carousel-control-next"
            type="button"
            data-bs-target="#heroCarousel"
            data-bs-slide="next">

            <span class="carousel-control-next-icon"></span>

        </button>

    </div>

</section>