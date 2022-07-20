@extends('admin.template')

@section('content')

    <h2 class="my-4 text-center">Editarea galeriei foto pentru <span class="text-info">{{ $room->name }}</span>
        - <span class="text-danger">{{ $room->photos->count() }}</span>
    </h2>
    <ol class="breadcrumb mb-4 d-flex justify-content-center">
        <li class="breadcrumb-item"><a href="{{ route('admin.panel') }}">Control Panel</a></li>
        <li class="breadcrumb-item"><a href="{{ route('admin.rooms.list') }}">Camere</a></li>
        <li class="breadcrumb-item active">Galerie foto {{ $room->name }}</li>
        <li class="breadcrumb-item"><a href="{{ route('admin.rooms.edit',$room->id) }}">Edit Room </a></li>
    </ol><br>

    {{-- formularul pentru adaugarea unei imagini --}}
    <div class="row d-flex justify-content-center">
        <div class="col-md-6 ">
            <div class="card">
                <form action="{{ route('admin.rooms.photos.upload', $room->id) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="card-header">
                        <h4> Adaugarea unei imagini in galeria foto</h4>
                    </div>
                    <div class="card-body">

                        <div class="row">
                            <div class=" col-md-12">
                                <div id="img-preview">
                                    <img class="img-form" src="{{ asset('images/rooms/room.png') }}"
                                        style="max-height:200px;" alt="">
                                </div>

                                <div class="custom-file">
                                    <input accept="image/*" name="photo" type="file"
                                        class="form-control @error('photo') is-invalid @enderror" id="photoFile" />
                                    <label class="custom-file-label" for="photoFile"> </label>
                                </div>
                                @error('photo')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class=" col-md-12">
                                <label for="info" class="form-label">Info imagine</label>
                                <input name="info" type="text" class="form-control @error('info') is-invalid @enderror"
                                    id="info" placeholder="titlul imaginei">
                                @error('info')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="col-md-6">

                                <div class="form-check mt-3">
                                    <input name="visible" class="form-check-input" type="checkbox" value="1" checked>
                                    <label class="form-check-label" for="flexCheckDefault">
                                        Imagine publica
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button class="btn-primary btn" type="submit">Upload Image</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <hr>
    {{-- editarea imaginilor din galeria foto --}}
    <div class="row my-5">
        @forelse($room->photos->sortBy('order') as $photo)
            <div class="col-md-4 my-2">
                <form action="{{ route('admin.rooms.photos.update', $photo->id) }}" id="form-{{ $photo->id }}"
                    method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div class="card m-2 p-2 h-100 d-flex flex-column justify-content-between">

                        <div class="card-body">

                            <div>
                                <img class="galery" src="{{ $photo->photoUrl() }}" alt="">

                                <div class="custom-file">
                                    <input accept="image/*" name="photo" type="file"
                                        class="form-control @error('photo') is-invalid @enderror" id="photoFile" />
                                    <label class="custom-file-label" for="photoFile"> </label>
                                </div>
                                @error('photo')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div>

                                <label for="info" class="form-label">Info Photo</label>
                                <input name="info" type="text" class="form-control @error('info') is-invalid @enderror"
                                    id="info" placeholder="info camera" value="{{ old('info', $photo->info) }}">
                                @error('info')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror

                                <label for="order" class="form-label">Pozitia in galerie</label>
                                <input name="order" value="{{ old('position', $photo->order) }}" type="number"
                                    class="form-control @error('order') is-invalid @enderror" id="order"
                                    placeholder="positia in galeria publica">
                                @error('order')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror

                                <div class="form-check mt-3">
                                    <input name="visible" class="form-check-input" type="checkbox" value="1"
                                        {{ $photo->visible ? 'checked' : '' }}>
                                    <label class="form-check-label" for="flexCheckDefault">
                                        Imagine publica
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="card-footer bg-dark py-2">

                            <button class="btn-primary btn float-end" type="submit"
                                id="button-{{ $photo->id }}">Update</button>
                            <button onclick="event.preventDefault();deleteConfirm('form-delete-{{ $photo->id }}')"
                                class="btn-danger btn float-start" id="button-delete-{{ $photo->id }}">Delete</button>
                        </div>
                    </div>
                </form>
                <form class="d-none" action="{{ route('admin.rooms.photos.delete', $photo->id) }}" method="POST"
                    id="form-delete-{{ $photo->id }}">
                    @csrf
                    @method('delete')
                </form>
            </div>
            @empty
            <div class="col-md-12 alert alert-warning">
                Camera nu are nici o imagine in galeria foto
            </div>
            @endforelse
    </div>


@endsection

@push('customJs')
    <script>
        const chooseFile = document.getElementById("photoFile");
        const imgPreview = document.getElementById("img-preview");
        chooseFile.addEventListener("change", function() {
            getImgData();
        });

        function getImgData() {
            const files = chooseFile.files[0];
            if (files) {
                const fileReader = new FileReader();
                fileReader.readAsDataURL(files);
                fileReader.addEventListener("load", function() {
                    imgPreview.style.display = "block";
                    imgPreview.innerHTML = '<img src="' + this.result + '" style="max-height:200px;" />';
                });
            }
        }
    </script>


    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        window.deleteConfirm = function(formId) {
            Swal.fire({
                icon: 'question',
                text: 'Confirmati stergerea imaginii selectate ?',
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
