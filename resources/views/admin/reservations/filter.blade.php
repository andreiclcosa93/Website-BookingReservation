@extends('admin.template')

@section('content')
<div class="m-3">
<h1 class="my-3">Rezervarile hotelului - {{ $reservations->total() }}</h1>

<div class="card my-4 p-3">
    <div class="card-header">
        <div class="row">
            <div class="col-md-4">
                <h4>Rezervari pentru luna <span class="text-info"> {{ $date_filtered->format("M - Y") }}</span></h4>

            </div>
            <div class="col-md-4">


                <form action="{{ route('admin.reservations.filterMonth') }}" method="GET">
                    @csrf
                    <div class="row mb-3">
                      <label for="monthSearch" class="col-sm-2 col-form-label">Rezervari lunare</label>
                      <div class="col-sm-4">
                        <input name="month" type="date" class="form-control" id="monthSearch" style="max-width: 200px;">
                      </div>
                      <div class="col-sm-2">
                          <button class="btn btn-primary" type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
                      </div>
                    </div>
                </form>
            </div>
        </div>

    </div>

    <div class="card-body">
        <table class="table table-striped">
            <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Nume</th>
                  <th scope="col">Camera</th>
                  <th scope="col">Creat</th>
                  <th scope="col">Check in / out</th>
                  <th scope="col">Pret / zile </th>
                  <th scope="col">Total </th>
                  <th scope="col">Conf. </th>
                </tr>
              </thead>
              <tbody>
              @forelse($reservations as $reservation)
              <tr>
                <th scope="row">{{ $reservations->currentPage() > 1 ? $loop->iteration + $reservations->perPage() * ($reservations->currentPage() - 1) : $loop->iteration }}</th>
                <td>
                    <a href="{{ route('admin.reservations.list',['user_id'=>$reservation->user->id]) }}" title="reservari ale utilizatorului">{{ $reservation->user->name }}</a>
                </td>
                <td>
                    <a href="{{ route('admin.reservations.list',['room_id'=>$reservation->room->id]) }}" title="rezervari pentru aceasta camera">
                    {{ $reservation->room->name }}
                    </a>

                </td>
                <td>{{ $reservation->created_at->format('M d Y') }}</td>
                <td>{{ $reservation->checkin_at->format('M d Y') }} / {{ $reservation->checkout_at->format('M d Y') }}</td>
                <td>{{ $reservation->room->price }} / {{ $reservation->checkout_at->diffInDays($reservation->checkin_at) }}</td>
                <td>{{ $reservation->room->price * $reservation->checkout_at->diffInDays($reservation->checkin_at) }}</td>
                <td class="{{ $reservation->confirmed_at ? 'bg-success' : 'bg-danger' }} text-light"
                >{!! $reservation->confirmed_at ? '<i class="fa fa-check" aria-hidden="true"></i> ' . $reservation->confirmed_at->format('M d Y') :'<i class="fa fa-ban" aria-hidden="true"></i>'!!}</td>

              </tr>

              @empty
            <div class="alert alert-info">
                <h3>Nu exista rezervari pentru hotel</h3>
            </div>
                @endforelse
              </tbody>
        </table>
    </div>
    <div class="card-footer">
{{-- linkurile de paginatie --}}
       {{ $reservations->links()}}
    </div>
</div>
</div>





@endsection
