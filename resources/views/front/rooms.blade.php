@extends('front.template')

@section('content')

<!-- Breadcrumb Section Begin -->
<hr style="background-color: #E9AF64;">
<div class="breadcrumb-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-text">
                    <h2>Camerele noastre</h2>
                    <div class="bt-option">
                        <a href="{{ route('home') }}">Acasa</a>
                        <span>Camere</span>
                    </div>
                </div>
            </div>
        </div>


    </div>
</div>

<section class="rooms-section spad">
    <div class="container">
        <div class="row">
<!-- Breadcrumb Section End -->
@forelse($rooms as $room)
<div class="col-lg-4 col-md-6">
    <div class="room-item">
        <img src="{{ $room->photoUrl() }}" alt="">
        <div class="ri-text">
            <h4>{{ $room->name }}</h4>
            <h3>{{ $room->price }}<span>/ Pernight</span></h3>
            <table>
                <tbody>
                    <tr>
                        <td class="r-o">Nr camere:</td>
                        <td>{{ $room->number }}</td>
                    </tr>

                    <tr>
                        <td class="r-o">Detalii:</td>
                        <td></td>
                    </tr>
                </tbody>
            </table>
            <a href="#" class="primary-btn">Rezerva Camera</a>
        </div>
    </div>
</div>
@empty
    <div class="alert alert-info">
        Nu avem camere disponibile momentan
    </div>
@endforelse

        </div>
    </div>
</section>




@endsection
