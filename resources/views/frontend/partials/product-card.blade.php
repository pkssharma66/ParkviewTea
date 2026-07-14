<div class="premium-product">

    <div class="product-image">

        @if($product->sale_price)

        <span class="sale-badge">

            SALE

        </span>

        @endif

        @if($product->best_seller)

        <span class="best-badge">

            BEST SELLER

        </span>

        @endif

        <a href="{{ route('product.details',$product->slug) }}">

            <img src="{{ asset('uploads/products/'.$product->thumbnail) }}"
                alt="{{ $product->name }}">

        </a>

        <div class="product-overlay">

            <a href="{{ route('product.details',$product->slug) }}"
                class="circle-btn">

                <i class="fa fa-eye"></i>

            </a>

            <a href="#"
                class="circle-btn">

                <i class="fa fa-heart"></i>

            </a>

        </div>

    </div>

    <div class="product-info">

        <small class="category-name">

            {{ $product->category->name ?? '' }}

        </small>

        <h4>

            <a href="{{ route('product.details',$product->slug) }}">

                {{ $product->name }}

            </a>

        </h4>

        <div class="rating">

            ★★★★★

        </div>

        <div class="price-box">

            @if($product->sale_price)

                <span class="old-price">

                    ₹{{ number_format($product->price,2) }}

                </span>

                <span class="new-price">

                    ₹{{ number_format($product->sale_price,2) }}

                </span>

            @else

                <span class="new-price">

                    ₹{{ number_format($product->price,2) }}

                </span>

            @endif

        </div>

        <a href="{{ route('product.details',$product->slug) }}"
            class="btn-cart">

            View Details

        </a>

    </div>

</div>