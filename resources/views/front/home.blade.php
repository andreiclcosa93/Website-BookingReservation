@extends('front.template')

@section('content')

    @include('front.partials.hero')

    @include('front.partials.about')

    <!-- Services Section End -->
    @include('front.partials.services')

    @include('front.partials.room-section')

    {{-- afisam testimonialelele --}}
    @include('front.partials.testimonials');

     {{-- === sectiunea blog === --}}
     @include('front.partials.blog')

@endsection

