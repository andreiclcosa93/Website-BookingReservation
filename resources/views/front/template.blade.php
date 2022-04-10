@include('front.partials.head')

<body>

   @include('front.partials.topbar')

     <!-- Header Section Begin -->
    <header class="header-section">

        @include('front.partials.secondtopbar')

    </header>
    <!-- Header End -->
    @include('admin.partials.messages')

    <!-- Hero Section Begin -->
    <section class="hero-section">

        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="hero-text">
                        <h1>Sona A Luxury Hotel</h1>
                        <p>Here are the best hotel booking sites, including recommendations for international
                            travel and for finding low-priced hotel rooms.</p>
                        <a href="#" class="primary-btn">Discover Now</a>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-5 offset-xl-2 offset-lg-1">
                    <div class="booking-form">
                        <h3>Booking Your Hotel</h3>
                        <form action="#">
                            <div class="check-date">
                                <label for="date-in">Check In:</label>
                                <input type="text" class="date-input" id="date-in">
                                <i class="icon_calendar"></i>
                            </div>
                            <div class="check-date">
                                <label for="date-out">Check Out:</label>
                                <input type="text" class="date-input" id="date-out">
                                <i class="icon_calendar"></i>
                            </div>
                            <div class="select-option">
                                <label for="guest">Guests:</label>
                                <select id="guest">
                                    <option value="">2 Adults</option>
                                    <option value="">3 Adults</option>
                                </select>
                            </div>
                            <div class="select-option">
                                <label for="room">Room:</label>
                                <select id="room">
                                    <option value="">1 Room</option>
                                    <option value="">2 Room</option>
                                </select>
                            </div>
                            <button type="submit">Check Availability</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="hero-slider owl-carousel">
            <div class="hs-item set-bg" data-setbg="img/hero/hero-1.jpg"></div>
            <div class="hs-item set-bg" data-setbg="img/hero/hero-2.jpg"></div>
            <div class="hs-item set-bg" data-setbg="img/hero/hero-3.jpg"></div>
        </div>

    </section>
    <!-- Hero Section End -->

    <!-- About Us Section Begin -->
    @include('front.partials.about')
    <!-- About Us Section End -->

    <!-- Services Section End -->
    @include('front.partials.services')
    <!-- Services Section End -->

    <!-- Home Room Section Begin -->
    @include('front.partials.room-section')
    <!-- Home Room Section End -->

    <!-- Testimonial Section Begin -->
    @include('front.partials.testimonials')
    <!-- Testimonial Section End -->

    <!-- Blog Section Begin -->
    @include('front.partials.blog')
    <!-- Blog Section End -->

    <!-- Footer Section Begin -->

    @include('front.partials.footer')

     <!-- Footer Section End -->


    @include('front.partials.scripts')
</body>

</html>
