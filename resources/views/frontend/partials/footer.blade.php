<footer class="footer-section">

    <!-- Newsletter -->
    <div class="footer-newsletter">

        <div class="container">

            <div class="row align-items-center">

                <div class="col-lg-6">

                    <h2>Join Our Tea Community 🍃</h2>

                    <p>
                        Subscribe to receive exclusive offers, new arrivals and healthy tea tips.
                    </p>

                </div>

                <div class="col-lg-6">

                    <form class="newsletter-form">

                        <input type="email"
                            placeholder="Enter your email address">

                        <button type="submit">

                            Subscribe

                        </button>

                    </form>

                </div>

            </div>

        </div>

    </div>

    <!-- Main Footer -->

    <div class="footer-main">

        <div class="container">

            <div class="row gy-5">

                <!-- Company -->

                <div class="col-lg-4">

                    @if($setting && $setting->logo)

                        <img src="{{ asset('uploads/settings/'.$setting->logo) }}"
                            height="70"
                            class="mb-4">

                    @else

                        <h2 class="footer-logo">

                            Park View Tea

                        </h2>

                    @endif

                    <p>

                        Experience the authentic taste of premium tea,
                        sourced directly from carefully selected gardens
                        and packed with freshness.

                    </p>

                    <div class="footer-social">

                        <a href="#"><i class="fab fa-facebook-f"></i></a>

                        <a href="#"><i class="fab fa-instagram"></i></a>

                        <a href="#"><i class="fab fa-twitter"></i></a>

                        <a href="#"><i class="fab fa-youtube"></i></a>

                    </div>

                </div>

                <!-- Quick Links -->

                <div class="col-lg-2">

                    <h5>Quick Links</h5>

                    <ul>

                        <li>

                            <a href="{{ url('/') }}">

                                Home

                            </a>

                        </li>

                        <li>

                            <a href="{{ url('/shop') }}">

                                Shop

                            </a>

                        </li>

                        <li>

                            <a href="#">

                                About

                            </a>

                        </li>

                        <li>

                            <a href="#">

                                Contact

                            </a>

                        </li>

                    </ul>

                </div>

                <!-- Categories -->

                <div class="col-lg-3">

                    <h5>Tea Categories</h5>

                    <ul>

                        @foreach(\App\Models\Category::where('status',1)->take(6)->get() as $category)

                            <li>

                                <a href="{{ route('category.products',$category->slug) }}">

                                    {{ $category->name }}

                                </a>

                            </li>

                        @endforeach

                    </ul>

                </div>

                <!-- Contact -->

                <div class="col-lg-3">

                    <h5>Contact Us</h5>

                    <ul class="footer-contact">

                        <li>

                            <i class="fa-solid fa-location-dot"></i>

                            Bangalore, Karnataka

                        </li>

                        <li>

                            <i class="fa-solid fa-phone"></i>

                            +91 9876543210

                        </li>

                        <li>

                            <i class="fa-solid fa-envelope"></i>

                            info@parkviewtea.com

                        </li>

                    </ul>

                </div>

            </div>

            <hr>

            <div class="footer-bottom">

                <div>

                    © {{ date('Y') }}

                    Park View Tea.

                    All Rights Reserved.

                </div>

                <div>

                    <i class="fab fa-cc-visa fa-2x"></i>

                    <i class="fab fa-cc-mastercard fa-2x"></i>

                    <i class="fab fa-cc-paypal fa-2x"></i>

                    <i class="fab fa-cc-amazon-pay fa-2x"></i>

                </div>

            </div>

        </div>

    </div>

</footer>