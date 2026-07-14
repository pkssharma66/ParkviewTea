<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
        content="width=device-width, initial-scale=1.0">

    <title>@yield('title') | Park View Tea</title>

    <meta name="description"
        content="@yield('meta_description','Premium Organic Tea')">

    <meta name="csrf-token"
        content="{{ csrf_token() }}">

    <!-- Google Fonts -->

    <link rel="preconnect"
        href="https://fonts.googleapis.com">

    <link rel="preconnect"
        href="https://fonts.gstatic.com"
        crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600&family=Poppins:wght@400;500;600;700;800&family=Lora:wght@600;700&display=swap"
        rel="stylesheet">

    <!-- Bootstrap -->

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet">

    <!-- FontAwesome -->

    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css">

    <!-- Swiper -->

    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

    <!-- AOS -->

    <link rel="stylesheet"
        href="https://unpkg.com/aos@2.3.4/dist/aos.css" />

    <!-- Main CSS -->

    <link rel="stylesheet"
        href="{{ asset('assets/css/style.css') }}">

    <link rel="stylesheet"
        href="{{ asset('assets/css/responsive.css') }}">

</head>

<body>
    <div id="preloader">

<div class="loader"></div>

</div>

    {{-- Header --}}

    @include('frontend.partials.header')

    {{-- Content --}}

    <main>

        @yield('content')

    </main>

    {{-- Footer --}}

    @include('frontend.partials.footer')

    <!-- Bootstrap -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Swiper -->

    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

    <!-- AOS -->

    <script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>

    <script>
        AOS.init({

            duration: 800,

            once: true

        });
    </script>

    <script src="{{ asset('assets/js/main.js') }}"></script>

    @stack('scripts')
    <!-- WhatsApp -->

    <a href="https://wa.me/919876543210"
        class="whatsapp-btn"
        target="_blank">

        <i class="fab fa-whatsapp"></i>

    </a>

    <button id="topBtn">

<i class="fa fa-angle-up"></i>

</button>

<script>

let btn=document.getElementById("topBtn");

window.onscroll=function(){

if(document.documentElement.scrollTop>300){

btn.style.display="block";

}else{

btn.style.display="none";

}

}

btn.onclick=function(){

window.scrollTo({

top:0,

behavior:'smooth'

});

}

</script>

<a href="{{ route('cart') }}" class="floating-cart">

<i class="fa fa-shopping-cart"></i>

@if(session('cart'))

<span>

{{ count(session('cart')) }}

</span>

@endif

</a>

<script>

window.onload=function(){

document.getElementById("preloader").style.display="none";

}

</script>

</body>

</html>