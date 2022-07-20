@extends('admin.template')

@section('content')

<br><h1 style="text-align: center;">Administrare Utilizatori - <span class="text-info">{{ $users->total() }}</span></h1>
<br>
@if(isset($search))
    <h2>Rezultatele cautarii dupa <span class="text-info">{{ $search }}</span></h2><br>
    <a href="{{ route('admin.users.list') }}" class="btn btn-primary">All users</a><br>
@endif
<br>

<div class="card mb-4">
    <div class="card-body">
        <table class="table">
            <thead>

                <th scope="col">Nr</th>
                <th scope="col">Nume</th>
                <th scope="col">Email</th>
                <th scope="col">Telefon</th>

            </thead>
            <tbody>
                @forelse ($users as $user )
                    <tr>
                        <td>{{ $users->currentPage() > 1 ? $loop->iteration + $users->perPage() * ($users->currentPage() - 1) : $loop->iteration }}</td>
                        <td>
                        @if($user->reservations()->count() >0)
                        {{  $user->name }} <span class="text-info"><a href="{{ route('admin.reservations.list',['user_id'=> $user->id]) }}">{{ $user->reservations()->count() }} rezervari</a></span><br>

                        @else
                        {{  $user->name }} <span class="text-info">( nici o rezervare)</span>

                        @endif
                        </td>
                        <td>{{ $user->email }} </td>
                        <td>{{ $user->phone }} </td>
                    </tr>

                        @empty
                            <div class="alert alert-info">
                                Nu exista utilizatori in baza de date
                            </div>
                        @endforelse
            </tbody>
        </table>
    </div>
    <div class="cad-footer">
        {{-- paginatia pentru lista de utilizatori --}}
        {{ $users->links() }}
    </div>
</div>

@endsection

@section('customCss')
<style>

</style>
@endsection
