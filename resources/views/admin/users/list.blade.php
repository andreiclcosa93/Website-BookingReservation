@extends('admin.template')

@section('content')
<h1 style="text-align: center;">Administrare Utilizatori- <span class="text-info">{{ $users->total() }}</span></h1>
@if(isset($search))
<h2>Rezultatele cautarii dupa <span class="text-info">{{ $search }}</span></h2>
<a href="{{ route('admin.users.list') }}">All users</a>
@endif
<br>

{{-- <ol class="breadcrumb mb-4">


    <li class="breadcrumb-item"><a href="{{ route('admin.panel') }}">Control Panel</a></li>
    <li class="breadcrumb-item active">Utilizatori</li>
</ol> --}}


<div class="d-flex flex-row mb-5">



        <button style=" background-color: #212529;" type="button" class=" btn-lg"><a style="color:white; text-decoration:none;" href="{{ route('admin.panel') }}">Panou Principal</a></button> &nbsp;&nbsp;
        <button style=" background-color: #212529;" type="button" class="btn-lg"><a style="color:white; text-decoration:none; " href="#">Utilizatori</a></button>

{{-- <li class="breadcrumb-item"><a href="{{ route('admin.panel') }}">Control Panel</a></li> --}}

</div>



<div class="card mb-4">
    <div class="card-body">
        <table class="table">
            <thead>

                <th scope="col">#Nr</th>
                <th scope="col">Nume (id)</th>
                <th scope="col">Email</th>
                <th scope="col">Telefon</th>
                <th scope="col">Actions</th>

            </thead>
            <tbody>
                @forelse ($users as $user )
                <tr>
                        <td>{{ $users->currentPage() > 1 ? $loop->iteration + $users->perPage() * ($users->currentPage() - 1) : $loop->iteration }}
                        </td>
                        <td>{{ $user->name }} <span class="text-info">({{ $user->id }})</span></td>
                        <td>{{ $user->email }} </td>
                        <td>{{ $user->phone }} </td>
                        <td>
                            <button class="btn btn-danger">Block</button>
                        </td>
                </tr

                @empty
                    <div class="alert alert-info">
                        Nu exista utilizatori in baza de date
                    </div>
                @endforelse

            </tbody>
    </div>
    <div class="cad-footer">
        {{ $users->links() }}
    </div>

</div>

@endsection

@section('customCss')
<style>

</style>
@endsection
