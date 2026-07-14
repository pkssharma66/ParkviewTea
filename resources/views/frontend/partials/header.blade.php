<header>

    <!-- ===========================
         Top Announcement Bar
    ============================ -->

    <div class="top-bar">

        <div class="container">

            <div class="d-flex justify-content-between align-items-center">

                <div>

                    <i class="fa-solid fa-leaf text-warning"></i>

                    100% Organic Tea | Free Shipping Above ₹999

                </div>

                <div>

                    <a href="#" class="text-white me-3">

                        <i class="fab fa-facebook-f"></i>

                    </a>

                    <a href="#" class="text-white me-3">

                        <i class="fab fa-instagram"></i>

                    </a>

                    <a href="#" class="text-white">

                        <i class="fab fa-youtube"></i>

                    </a>

                </div>

            </div>

        </div>

    </div>

    <!-- ===========================
         Header
    ============================ -->

    <nav class="navbar navbar-expand-lg navbar-light custom-navbar">

        <div class="container">

            <!-- Logo -->

            <a class="navbar-brand" href="{{ url('/') }}">

                @if($setting && $setting->logo)

                    <img src="{{ asset('uploads/settings/'.$setting->logo) }}"
                        class="logo">

                @else

                    <span class="logo-text">

                        Park View Tea

                    </span>

                @endif

            </a>

            <button class="navbar-toggler"

                data-bs-toggle="collapse"

                data-bs-target="#mainMenu">

                <span class="navbar-toggler-icon"></span>

            </button>

            <div class="collapse navbar-collapse"

                id="mainMenu">

                <ul class="navbar-nav mx-auto">

                    <li class="nav-item">

                        <a class="nav-link"

                            href="{{ url('/') }}">

                            Home

                        </a>

                    </li>

                    <li class="nav-item">

                        <a class="nav-link"

                            href="{{ url('/shop') }}">

                            Shop

                        </a>

                    </li>

                    <!-- Categories -->

                    <li class="nav-item dropdown">

                        <a class="nav-link dropdown-toggle"

                            href="#"

                            data-bs-toggle="dropdown">

                            Categories

                        </a>

                        <ul class="dropdown-menu shadow-lg border-0">

                            @foreach(\App\Models\Category::where('status',1)->get() as $category)

                            <li>

                                <a class="dropdown-item"

                                    href="{{ route('category.products',$category->slug) }}">

                                    {{ $category->name }}

                                </a>

                            </li>

                            @endforeach

                        </ul>

                    </li>

                    <li class="nav-item">

                        <a class="nav-link"

                            href="#">

                            Blogs

                        </a>

                    </li>

                    <li class="nav-item">

                        <a class="nav-link"

                            href="#">

                            Contact

                        </a>

                    </li>

                </ul>

                <!-- Search -->

                <form class="search-box d-none d-lg-flex"

                    action="{{ url('/shop') }}"

                    method="GET">

                    <input

                        type="text"

                        name="search"

                        placeholder="Search tea...">

                    <button>

                        <i class="fa fa-search"></i>

                    </button>

                </form>

                <!-- Right Icons -->

                <div class="header-icons">

                    <a href="#">

                        <i class="fa-regular fa-heart"></i>

                    </a>

                    <a href="{{ route('cart') }}"

                        class="position-relative">

                        <i class="fa-solid fa-cart-shopping"></i>

                        @if(session('cart'))

                        <span class="cart-count">

                            {{ count(session('cart')) }}

                        </span>

                        @endif

                    </a>

                    @auth('customers')

                        <a href="{{ route('profile') }}"

                            class="btn-theme">

                            My Account

                        </a>

                    @else

                        <a href="{{ route('login') }}"

                            class="btn-theme">

                            Login

                        </a>

                    @endauth

                </div>

            </div>

        </div>

    </nav>

</header>