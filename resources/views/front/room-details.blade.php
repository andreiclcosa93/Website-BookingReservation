@extends('front.template')

@section('content')

<!-- Breadcrumb Section Begin -->
<hr style="background-color: #E9AF64;">
<div class="breadcrumb-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-text">
                    <h2>Camera {{ $room->name }}</h2>
                    <div class="bt-option">
                        <a href="{{ route('home') }}">Acasa</a>
                        <a href="{{ route('rooms') }}">Camerele Noastre</a>
                        <span>{{ $room->name }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<section class="room-details-section spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="room-details-item">
                    <img class="d-block mx-auto" src="{{ $room->photoUrl() }}" alt="">
                    <div class="rd-text">
                        <div class="rd-title">
                        <div class="rdt-right">
                            <div class="rating">
                                <i class="icon_star"></i>
                                <i class="icon_star"></i>
                                <i class="icon_star"></i>
                                <i class="icon_star"></i>
                                <i class="icon_star-half_alt"></i>
                            </div>
                        </div>
                        <h2>{{ $room->price }} Ron<span>/Noapte</span></h2>
                        </div>
                    </div>

                    <table class="table">
                        <tbody>
                            @forelse($room->publicFacilities() as $facility)
                            <tr>
                                <td><i class="fa fa-check" aria-hidden="true"></i></td>
                                <td class="">{{ $facility->name }}: </td>
                                <td class="pl-2">{{ $facility->description }}</td>
                            </tr>
                            @empty

                            @endforelse
                        </tbody>
                    </table>
                </div>

            </div>
            <div class="col-lg-4">
                <div class="room-booking">
                    <h3>Rezervare</h3>
                    <form action="{{ route('reservations.create',$room->id) }}" method="POST">
                        @csrf
                        <div class="check-date">
                            <label for="checkin_at">Check In*:</label>
                            <input class="@error('checkin_at') is-invalid @enderror" value="{{ old('checkin_at') }}" name="checkin_at" type="date" required id="checkin_at" min="{{ date('Y-m-d')}}" />
                            @error('checkin_at')
                            <div class="invalid-feedback">
                               {{ $message }}
                              </div>
                              @enderror
                        </div>
                        <div class="check-date">
                            <label for="checkout_at">Check Out*:</label>
                            <input value="{{ old('checkout_at') }}" class="@error('checkout_at') is-invalid @enderror" name="checkout_at" type="date" required id="checkout_at" min="{{ date('Y-m-d') }}"/>
                            @error('checkout_at')
                            <div class="invalid-feedback">
                               {{ $message }}
                              </div>
                              @enderror
                        </div>
                        <div class="">
                            <label for="observations">Observatii:(optional, max 250 car)</label>
                            <input value="{{ old('observations') }}" class="form-control @error('observations') is-invalid @enderror" name="observations" type="text"  id="observations"/>
                            @error('observations')
                            <div class="invalid-feedback">
                               {{ $message }}
                              </div>
                              @enderror
                        </div>
                        @auth
                            <button type="submit">Rezerva camera</button>
                        @endauth
                        @guest
                            <div class="alert alert-warning">
                                Pentru a face o rezervare trebuie sa fiti logat
                            </div>
                        @endguest
                    </form>
                </div>
            </div>
        </div>
        <div class="row popup-gallery">
            @forelse ($room->publicPhotos() as $photo )
            <div class="col-md-4">
                <a href="{{ $photo->photoUrl() }}" class="magnific-gallery my-4">

                    <img class="" src="{{ $photo->photoUrl() }}" alt="{{ $photo->name }}"
                        title="{{ $photo->name }}" style="max-height: 300px;">
                </a>

              <div class="">
                  {{ $photo->info }}
              </div>
            </div>

            @empty

            @endforelse

        </div>
        <hr>
        <div class="row">
            <div class="col-md-12">
                {!! $room->description !!}
            </div>
        </div>

    </div>
</section>



@endsection

@push('customJs')
    {{-- <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script> --}}
    <!-- Magnific Popup core JS file -->
    {{-- <script src="magnific-popup/jquery.magnific-popup.js"></script> --}}
    <script src="/images/magnific/magnific.js"></script>

    <script>
        $(document).ready(function() {

            $('.popup-gallery').magnificPopup({
                delegate: 'a',
                type: 'image',
                gallery: {
                    enabled: true,
                    navigateByImgClick: true,
                    preload: [0, 1] // Will preload 0 - before current, and 1 after the current image
                }
            });
        });
    </script>
@endpush
@push('customCss')

    <!-- Magnific Popup core CSS file -->
    <link href="/images/magnific/magnific.css" media="all" rel="stylesheet" type="text/css" />
@endpush

