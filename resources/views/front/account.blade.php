@extends('front.template')

@section('content')

<!-- Breadcrumb Section Begin -->
<hr style="background-color: #E9AF64;">
<div class="breadcrumb-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-text">
                    <h2>Rezervari cont {{ Auth::user()->name }}</h2>
                    <h3>email: {{ Auth::user()->email }}; telefon::{{ Auth::user()->phone }}</h3>
                    <div class="bt-option">
                        <a href="{{ route('home') }}">Acasa</a>
                       <span>Rezervari cont</span>
                    </div>
                </div>
            </div>
        </div>


    </div>
</div>

<section class="room-details-section spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
            </div>
            <div class="col-lg-9">
                <h2>Rezervarile mele - {{ $user->reservations()->count() }}</h2>

                <hr>
                <table class="table">
                    <thead>
                        <tr>
                          <th scope="col">#</th>
                          <th scope="col">Camera</th>
                          <th scope="col">Check in</th>
                          <th scope="col">Check out</th>
                          <th scope="col">Zile</th>
                          <th scope="col">Pret</th>
                          <th scope="col">Total</th>
                          <th scope="col">Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        @forelse ($user->reservations()->sortByDesc('created_at') as $reservation )
                        <tr class=" {{ $reservation->confirmed_at ? 'bg-success text-light' : '' }}">
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{ $reservation->room->name }}</td>
                            <td>{{ $reservation->checkin_at->format('M d Y') }}</td>
                            <td>{{ $reservation->checkout_at->format('M d Y') }}</td>
                            <td>{{ $reservation->checkout_at->diffInDays($reservation->checkin_at) }}</td>
                            <td>{{ $reservation->room->price }}</td>
                            <td>{{ $reservation->checkout_at->diffInDays($reservation->checkin_at) *  $reservation->room->price  }}</td>
                            <td>
                                @if(!$reservation->confirmed_at)
                                    <form action="{{ route('reservations.delete',$reservation->id) }}" class="d-none" id="delete-{{ $reservation->id }}" method="POST">
                                        @csrf
                                        @method('delete')
                                    </form>
                                    <button  onclick="event.preventDefault();cancel('delete-{{ $reservation->id }}')" class="btn btn-danger">Anuleaza</button>
                                @endif
                            </td>
                          </tr>
                        @empty
                            <div class="alert alert-info">
                                Nu aveti nici o rezervare facuta
                            </div>
                        @endforelse
                      </tbody>

                </table>


            </div>
        </div>
    </div>
</section>

@endsection

@push('customJs')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>


        window.cancel = function(formId) {
            Swal.fire({
                icon: 'question',
                text: 'Rezervarea va fi anulata ?',
                showCancelButton: true,
                confirmButtonText: 'Anuleaza',
                confirmButtonColor: '#e3342f',
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById(formId).submit();
                }
            });
        }
    </script>
@endpush
