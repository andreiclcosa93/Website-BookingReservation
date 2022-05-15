@include('front.partials.head')


<body>

   @include('front.partials.topbar')

     <!-- Header Section Begin -->
    <header class="header-section">

        @include('front.partials.secondtopbar')

    </header>
    <!-- Header End -->
    @include('admin.partials.messages')

    @yield('content')

    <!-- Hero Section Begin -->

    <!-- Hero Section End -->

    <!-- About Us Section Begin -->
    {{-- @include('front.partials.about') --}}
    <!-- About Us Section End -->

    <!-- Services Section End -->
    @include('front.partials.services')
    <!-- Services Section End -->

    <!-- Home Room Section Begin -->
    {{-- @include('front.partials.room-section') --}}
    <!-- Home Room Section End -->

    <!-- Testimonial Section Begin -->
    {{-- @include('front.partials.testimonials') --}}
    <!-- Testimonial Section End -->

    <!-- Blog Section Begin -->
    {{-- @include('front.partials.blog') --}}
    <!-- Blog Section End -->

    <!-- Footer Section Begin -->

    @include('front.partials.footer')

     <!-- Footer Section End -->


    @include('front.partials.scripts')
</body>

</html>
