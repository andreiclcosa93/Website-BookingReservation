@extends('front.template')

@section('content')

<!-- Breadcrumb Section Begin -->
<hr style="background-color: #E9AF64;">
<div class="breadcrumb-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-text">
                    <h2>Despre noi</h2>
                    <div class="bt-option">
                        <a href="{{ route('home') }}">Acasa</a>
                        <span>Despre noi</span>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

<!-- About Us Page Section Begin -->
<section class="aboutus-page-section spad">
    <div class="container">
        <div class="about-page-text">
            <div class="row">
                <div class="col-lg-6" data-aos="fade-right" data-aos-delay="300">
                    <div class="ap-title">
                        <h2>Bun venit la <span style="color:#E9AF64;"> Ajmal-JaiDam</span>!</h2>
                        <p>Cu o poveste in spate de peste 20 de ani, care merita spusa, o poveste
                            care merita promovata.<span style="color:#E9AF64;"> Complexul | Ajmal-JaiDam </span>
                            recunoscuta dupa petrecerile cu diferite tematici. Complexul Ajmal-JaiDam,
                            reprezinta una dintre cele mai luxoase locatii si cunoscute, atat pentru peisajele care inconjoara
                            complexul, cat si pentru petrecerile si evenimentele care au loc cu diferite tematici.</p>
                    </div>
                </div>
                <div class="col-lg-5 offset-lg-1" data-aos="fade-left" data-aos-delay="400">
                    <ul class="ap-services">
                        <li><i class="icon_check"></i> Petreceri pe Yacht.</li>
                        <li><i class="icon_check"></i> Plimbari cu Avionul.</li>
                        <li><i class="icon_check"></i> Piscina Privata.</li>
                        <li><i class="icon_check"></i> Pool Party.</li>
                        <li><i class="icon_check"></i> Petreceri Private.</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="about-page-services">
            <div class="row">
                <div class="col-md-4" data-aos="zoom-in" data-aos-delay="200">
                    <div class="ap-service-item set-bg" data-setbg="/front/img/about/pexels-prime-cinematics-2057610.jpg">
                        <div class="api-text">
                            {{-- <h3>Restaurants Services</h3> --}}
                        </div>
                    </div>
                </div>
                <div class="col-md-4" data-aos="zoom-in" data-aos-delay="400">
                    <div class="ap-service-item set-bg" data-setbg="/front/img/about/pexels-vincent-rivaud-2363807.jpg">
                        <div class="api-text">
                            {{-- <h3>Travel & Camping</h3> --}}
                        </div>
                    </div>
                </div>
                <div class="col-md-4" data-aos="zoom-in" data-aos-delay="600">
                    <div class="ap-service-item set-bg" data-setbg="/front/img/about/pexels-vincent-rivaud-2363808.jpg">
                        <div class="api-text">
                            {{-- <h3>Event & Party</h3> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- About Us Page Section End -->

<!-- Video Section Begin -->
<section class="video-section set-bg" data-setbg="/front/img/pexels-thorsten-technoman-338504.jpg">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="video-text">
                    <h2>Descoperiti complexul si serviciile noastre..</h2>
                    <p>Sa facem cele mai frumoase amintiri impreuna! Deschiderea sezonului de vara</p>

                         <a class="play-btn video-popup"><video autoplay muted loop >
                         <source src="front/img/blog/blog-template/pexels-kindel-media-7293667.mp4" type="video/mp4">

                         <source src="front/img/blog/blog-template/pexels-kindel-media-7293667.ogg" type="video/ogg">
                     </video></a>

                </div>
            </div>
        </div>
    </div>
</section><br><br><br><br><br><br><br><br><br>
<!-- Video Section End -->

<!-- Gallery Section Begin -->
<section class="gallery-section spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title">
                    <span>Galeria Foto</span>
                    <h2>Descopera Albumul nostru</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6" data-aos="flip-right" data-aos-delay="400">
                <div class="gallery-item set-bg" data-setbg="/front/img/gallery/pexels-asad-photo-maldives-1450354.jpg">
                    <div class="gi-text">
                        <h3>Plimbari cu avionul</h3>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6" data-aos="flip-right" data-aos-delay="600">
                        <div class="gallery-item set-bg" data-setbg="/front/img/gallery/pexels-sami-abdullah-7313084.jpg">
                            <div class="gi-text">
                                <h3>Vedere Apus</h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6" data-aos="flip-right" data-aos-delay="800">
                        <div class="gallery-item set-bg" data-setbg="/front/img/gallery/pexels-artem-beliaikin-2606523.jpg">
                            <div class="gi-text">
                                <h3>Vedere Ocean</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6" data-aos="flip-right" data-aos-delay="1000">
                <div class="gallery-item large-item set-bg" data-setbg="/front/img/gallery/pexels-pixabay-261394.jpg">
                    <div class="gi-text">
                        <h3>Piscina privata</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Gallery Section End -->
@endsection

@push('customJs')

    <script>

        AOS.init({
            duration: 600,
            offset: 150,
        });

    </script>

@endpush
