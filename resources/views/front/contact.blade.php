@extends('front.template')

@section('content')

<!-- Breadcrumb Section Begin -->
<hr style="background-color: #E9AF64;">
<div class="breadcrumb-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-text">
                    <h2>Contact</h2>
                    <div class="bt-option">
                        <a href="{{ route('home') }}">Acasa</a>
                        <span>Contact</span>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
  <!-- Contact Section Begin -->
  <section class="contact-section spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-4" data-aos="fade-right" data-aos-delay="600">
                <div class="contact-text">
                    <h2>Contact Info</h2>
                    <p><span style="color:#E9AF64;"> Complexul | Ajmal-JaiDam </span></p>
                    <table>
                        <tbody>
                            <tr>
                                <td class="c-o">Adresa:</td>
                                <td>856 Zone, Thailanda Ap. 35633, ASIA</td>
                            </tr>
                            <tr>
                                <td class="c-o">Telefon:</td>
                                <td>072 9090 230</td>
                            </tr>
                            <tr>
                                <td class="c-o">Email:</td>
                                <td>office.Ajmal@jaidam.com</td>
                            </tr>
                            <tr>
                                <td class="c-o">Fax:</td>
                                <td>072 9090 230</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-lg-7 offset-lg-1" data-aos="fade-left" data-aos-delay="800">
                <form action="{{ route('new-message') }}" class="contact-form" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-lg-6">
                            <input name="name" type="text" placeholder="Nume">
                        </div>
                        <div class="col-lg-6">
                            <input name="email" type="email" placeholder="Email">
                        </div>
                        <div class="col-lg-12">
                            <textarea name="message" placeholder="Introdu Mesaj"></textarea>
                            <button type="submit">Trimite Mesaj</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="map" data-aos="zoom-in" data-aos-delay="800">
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2742.35036985556!2d26.913087815595215!3d46.58031057913005!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x40b56fe3025554d1%3A0x3eb6db2bfc2aaa09!2sArena%20Mall!5e0!3m2!1sro!2sro!4v1653229596170!5m2!1sro!2sro"
                height="470" style="border:0;" allowfullscreen=""></iframe>
        </div>
    </div>
</section>
<!-- Contact Section End -->



@endsection

@push('customJs')

    <script>

        AOS.init({
            duration: 600,
            offset: 150,
        });

    </script>

@endpush
