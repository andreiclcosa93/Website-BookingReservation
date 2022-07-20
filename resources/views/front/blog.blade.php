@extends('front.template')

@section('content')

 <!-- Breadcrumb Section Begin -->
<hr style="background-color: #E9AF64;">
<div class="breadcrumb-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-text">
                    <h2>Blogul nostru</h2>
                    <div class="bt-option">
                        <a href="{{ route('home') }}">Acasa</a>
                        <span>Blog</span>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
<!-- Breadcrumb Section End -->

<!-- Blog Section Begin -->
<section class="blog-section blog-page spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-6" data-aos="fade-right" data-aos-delay="200">
                <div class="blog-item set-bg" data-setbg="/front/img/blog/pexels-denys-gromov-7974f.jpg">
                    <div class="bi-text">
                        <span class="b-tag">Travel Trip</span>
                        <h4><a href="./blog-details.html">Plimbare cu Avionul</a></h4>
                        <div class="b-time"><i class="icon_clock_alt"></i> 15 Aprilie, 2019</div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6" data-aos="fade-right" data-aos-delay="300">
                <div class="blog-item set-bg" data-setbg="/front/img/blog/pexels-denys-gromov-7974828.jpg">
                    <div class="bi-text">
                        <span class="b-tag">Camping</span>
                        <h4><a href="./blog-details.html">Pool Party</a></h4>
                        <div class="b-time"><i class="icon_clock_alt"></i> 15 Aprilie, 2019</div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6" data-aos="fade-right" data-aos-delay="400">
                <div class="blog-item set-bg" data-setbg="/front/img/blog/pexels-marfil-graganza-aquino-2604792.jpg">
                    <div class="bi-text">
                        <span class="b-tag">Event</span>
                        <h4><a href="./blog-details.html">Pool Party</a></h4>
                        <div class="b-time"><i class="icon_clock_alt"></i> 21 Aprilie, 2019</div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6" data-aos="fade-right" data-aos-delay="500">
                <div class="blog-item set-bg" data-setbg="/front/img/blog/pexels-nudos-adicora-10877549.jpg">
                    <div class="bi-text">
                        <span class="b-tag">Trivago</span>
                        <h4><a href="./blog-details.html">Piscina privata</a></h4>
                        <div class="b-time"><i class="icon_clock_alt"></i> 22 Aprilie, 2019</div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6" data-aos="fade-right" data-aos-delay="600">
                <div class="blog-item set-bg" data-setbg="/front/img/blog/pexels-nudos-adicora-10877551.jpg">
                    <div class="bi-text">
                        <span class="b-tag">Camping</span>
                        <h4><a href="./blog-details.html">Piscina copii</a></h4>
                        <div class="b-time"><i class="icon_clock_alt"></i> 25 Aprilie, 2019</div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6" data-aos="fade-right" data-aos-delay="700">
                <div class="blog-item set-bg" data-setbg="/front/img/blog/pexels-nudos-adicora-10877702.jpg">
                    <div class="bi-text">
                        <span class="b-tag">Travel Trip</span>
                        <h4><a href="./blog-details.html">Piscina privata</a></h4>
                        <div class="b-time"><i class="icon_clock_alt"></i> 28 Aprilie, 2019</div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6" data-aos="fade-right" data-aos-delay="800">
                <div class="blog-item set-bg" data-setbg="/front/img/blog/pexels-nudos-adicora-10877838.jpg">
                    <div class="bi-text">
                        <span class="b-tag">Travel Trip</span>
                        <h4><a href="./blog-details.html">Zona Relaxare</a></h4>
                        <div class="b-time"><i class="icon_clock_alt"></i> 29 Aprilie, 2019</div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6" data-aos="fade-right" data-aos-delay="900">
                <div class="blog-item set-bg" data-setbg="/front/img/blog/pexels-trace-hudson-2535206.jpg">
                    <div class="bi-text">
                        <span class="b-tag">Event & Travel</span>
                        <h4><a href="./blog-details.html">Apus</a></h4>
                        <div class="b-time"><i class="icon_clock_alt"></i> 30 Aprilie, 2019</div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6" data-aos="fade-right" data-aos-delay="1000">
                <div class="blog-item set-bg" data-setbg="/front/img/blog/pexels-vincent-rivaud-2260779.jpg">
                    <div class="bi-text">
                        <span class="b-tag">Camping</span>
                        <h4><a href="./blog-details.html">Piscina VIP</a></h4>
                        <div class="b-time"><i class="icon_clock_alt"></i> 30 Aprilie, 2019</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Blog Section End -->

@endsection


@push('customJs')

    <script>

        AOS.init({
            duration: 600,
            offset: 150,
        });

    </script>

@endpush
