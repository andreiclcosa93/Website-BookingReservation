@extends('admin.template')

@section('content')
<h1>
    Selectarea facilitatilor pentru <span class="text-info">{{ $room->name }}</span>
</h1>
<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item"><a href="{{ route('admin.panel') }}">Control Panel</a></li>
    <li class="breadcrumb-item"><a href="{{ route('admin.rooms.list') }}">Camere</a></li>
    <li class="breadcrumb-item active">Facilitati {{ $room->name }}</li>
    <li class="breadcrumb-item"><a href="{{ route('admin.rooms.edit',$room->id) }}">Edit Room </a></li>
    <li class="breadcrumb-item"><a href="{{ route('admin.rooms.photos.edit',$room->id) }}">FotoGalery </a></li>
</ol>

<div class="row my-4">

    <div class="col-md-6 mx-auto p-3">
        <form action="{{ route('admin.room.facilities.attach', $room->id) }}" method="POST">
            @csrf
        <div class="card">
            <div class="card-header">Facilitati ale camerei {{ $room->name }}
                col
            </div>
            <div class="card-body">

                    <div class="row">
                        @forelse($facilities as $facility)
                        <div class="col-md-6 my-4">
                            <div class="form-check">
                                <input name="facilities[]" class="form-check-input" type="checkbox" value="{{ $facility->id }}" id="facility-{{ $facility->id }}" {{ $room->facilities()->find($facility->id) ? 'checked' :'' }} >
                                <label class="form-check-label" for="facility-{{ $facility->id }}">
                                 {{ $facility->name }}
                                </label>
                              </div>
                        </div>
                        @empty
                            Nu exista facilitati ale camerei
                        @endforelse


                    </div>

            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Set Facilities</button>
            </div>
        </form>
        </div>

    </div>
</div>

@endsection
