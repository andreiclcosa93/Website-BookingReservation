@extends('admin.template')

@section('content')
    <br><h1 class="text-center">Facilitati pentru camerele Complexului <span style="color: #E9AF64;">Ajmal-JaiDam</span></h1><br>

    <div class="row ">
        <div class="col-md-6 mx-auto my-4 bg-light p-2 border">
            <h3 class="text-center">Adaugarea unei facilitati pentru Complex</h3>
            <form action="{{ route('admin.facilities.create') }}" method="POST">
                @csrf
                <div class="row my-3">
                    <div class="col-md-6">
                        <label for="name" class="form-label">Facilitate</label>
                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name" />
                        @error('name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="col-md-3">
                        <label for="order" class="form-label">Ordine afisare</label>
                        <input type="number" name="order" class="form-control @error('order') is-invalid @enderror"
                            id="order" />
                        @error('order')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="col-md-3">
                        <div class="form-check mt-3">
                            <input name="visible" class="form-check-input" type="checkbox" value="1" checked>
                            <label class="form-check-label" for="flexCheckDefault">
                                Activ
                            </label>
                        </div>
                    </div>
                </div>
                <div class="row my-4">
                    <div class="col col-md-9">
                        <label for="description" class="form-label">Desriere (optional)</label>
                        <input type="text" name="description"
                            class="form-control @error('description') is-invalid @enderror" id="description" />
                        @error('description')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="col-md-3">
                        <button type="submit" class="btn btn-primary float-end">Adauga Facilitate</button>
                    </div>
                </div>
            </form>


        </div>
    </div><br>

    <div class="row">
        @forelse($facilities as $facility)
            <div class="col-md-4">
                <div class="card">

                    <form action={{ route('admin.facilities.update', $facility->id) }}
                        id="facility-update-{{ $facility->id }}" method="POST">
                        @csrf
                        @method('put')
                        <div class="card-header bg-primary text-light">
                            {{ $facility->name }}

                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item"><b>Facilitate:</b>
                                <input name="name" type="text" class="form-control"
                                    value="{{ old('name', $facility->name) }}">
                            </li>
                            <li class="list-group-item"><b>Order:</b>
                                <input name="order" type="number" class="form-control"
                                    value="{{ old('order', $facility->order) }}">
                            </li>
                            <li class="list-group-item"><b>Descriere:</b>
                                <input name="description" type="text" class="form-control"
                                    value="{{ old('description', $facility->description) }}">
                            </li>
                            <li class="list-group-item">
                                <button type="submit" class="button btn btn-primary float-end">Actualizeaza</button>
                                <div class="form-check mt-3">
                                    <input name="visible" class="form-check-input" type="checkbox" value="1"
                                        {{ $facility->visible ? 'checked' : '' }}>
                                    <label class="form-check-label" for="flexCheckDefault">
                                        Afisat
                                    </label>
                                </div>

                            </li>
                        </ul>
                    </form>

                    <div class="card-footer">
                        <form class="d-none" action="{{ route('admin.facilities.delete', $facility->id) }}"
                            method="POST" id="form-delete-{{ $facility->id }}">
                            @csrf
                            @method('delete')
                        </form>
                        <button onclick="event.preventDefault();deleteConfirm('form-delete-{{ $facility->id }}')"
                            class="btn btn-danger">Sterge</button>
                    </div>
                </div><br><br><br><br>
            </div>


@empty
    <div class="alert alert-info">
        Nu exista facilitati pentru camerele Complexului!
    </div>
    @endforelse

    </div>
@endsection

@push('customJs')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        window.deleteConfirm = function(formId) {
            Swal.fire({
                icon: 'question',
                text: 'Confirmati stergerea facilitatii selectate ?',
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
