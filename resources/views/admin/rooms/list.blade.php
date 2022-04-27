@extends('admin.template')

@section('content')
<h1>Camerele hotelului</h1>
<a href="{{ route('admin.rooms.add') }}" class="btn btn-primary">Adauga camera</a>
<div class="row">
    @forelse ($rooms as $room)
<div class="col-md-4">
    <div class="card border m-2 p-2">
        <div class="card-header">
            <h2>{{ $room->name }}</h2>
        </div>
        <div class="card-body">

    <img src="{{ $room->photoUrl() }}" class="d-block mx-auto" alt="" style="max-height:300px; max-width:300px;">

    <p>
    <b>Nr camere:</b>{{ $room->number }}<br>

    <b>Pozitie pagina:</b>{{ $room->position }}<br>
    </p>
        </div>
        <div class="card-footer">
            <a href="{{ route('admin.rooms.edit',['id'=>$room->id]) }}" class="btn btn-success float-end">Edit</a>
            <a href="{{ route('admin.rooms.photos.edit',['id'=>$room->id]) }}" class="btn btn-success float-end"><i class="fas fa-images"></i>Photos</a>
            <form action="{{ route('admin.rooms.delete',$room->id) }}" class="d-none" id="form-delete-{{ $room->id }}" method="POST">
                @csrf
                @method('delete')

            </form>
            <button onclick="deleteConfirm('form-delete-{{ $room->id }}','{{ $room->name }}')" class="btn btn-danger float-start">Delete</button>
        </div>
    </div>





</div>

    @empty
        <div class="alert alert-info">Nu exista nici o camera inregistrata</div>
    @endforelse($rooms as $rooms)


</div>

@endsection

@push('customJs')
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        window.deleteConfirm = function(formId, name) {
            Swal.fire({
                icon: 'question',
                text: 'Confirmati stergerea camerei' + name + ' ?',
                showCancelButton: true,
                confirmButtonText: 'Delete',
                confirmButtonColor: '#e3342f',
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById(formId).submit();
                }
            });
        }
    </script>


@endpush
