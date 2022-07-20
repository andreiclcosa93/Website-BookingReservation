<br><br><br><br>
<section class="aboutus-section spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="about-text" data-aos="fade-right" data-aos-delay="200">
                    <div class="section-title">
                        <span>Despre Noi</span>
                        <h2>Complexul <br />Ajmal-JaiDam</h2>
                    </div>
                    <p class="f-para">Cu o poveste in spate de peste 20 de ani, care merita spusa, o poveste
                        care merita promovata.</p>
                    <p class="s-para">Complexul | Ajmal-JaiDam reprezinta una dintre cele mai luxoase locatii si cunoscute, atat pentru peisajele care inconjoara
                        complexul, cat si pentru petrecerile si evenimentele care au loc cu diferite tematici.</p>
                    <a href="{{ route('about') }}" class="primary-btn about-btn">Detaliere</a>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="about-pic" data-aos="fade-left" data-aos-delay="200">
                    <div class="row">
                        <div class="col-sm-6">
                            <img src="{{ asset('/front/img/about/about-1.jpg') }}" alt="">
                        </div>
                        <div class="col-sm-6">
                            <img src="{{ asset('/front/img/about/about-2.jpg') }}" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<br><br><br><br>


@push('customJs')

    <script>

        AOS.init({
            duration: 600,
            offset: 150,
        });

    </script>

@endpush
