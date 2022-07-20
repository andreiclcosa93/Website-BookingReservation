@include('front.partials.head')


<body>

   @include('front.partials.topbar')

     <!-- Header Section Begin -->
    <header class="header-section">

        @include('front.partials.secondtopbar')

    </header>
    <!-- Header End -->


    @include('admin.partials.messages')

    {{-- dinamic section --}}

    @yield('content')

    <!-- Footer Section start -->

    @include('front.partials.footer')

     <!-- Footer Section End -->

    {{-- script section --}}

    @include('front.partials.scripts')

</body>

</html>
