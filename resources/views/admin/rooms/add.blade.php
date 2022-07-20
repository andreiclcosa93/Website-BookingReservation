@extends('admin.template')

@section('content')
<h2 class="my-4 text-center">Adaugarea unei camere</h2>


<div class="card p-2">
    <form action="{{ route('admin.rooms.create') }}" method="POST" enctype="multipart/form-data">
        @csrf
    <div class="card-header">
        <h4>Adaugarea unei camere in baza de date</h4>
    </div>

    <div class="card-body">
        <div class="row my-3">
            <div class="col-md-6">
                <label for="name" class="form-label">Denumire camera</label>
                <input name="name" type="text" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="tipul camerei">
                @error('name')
                <div class="invalid-feedback">
                   {{ $message }}
                  </div>
                  @enderror
            </div>

            <div class="col-md-3">
                <label for="number" class="form-label">Numar de camere</label>
                <input name="number" type="number" class="form-control @error('number') is-invalid @enderror" id="number" placeholder="numarul de camere">
                @error('number')
                <div class="invalid-feedback">
                   {{ $message }}
                  </div>
                  @enderror
            </div>

            <div class="col-md-3">
                <label for="price" class="form-label">Pretul/Noapte</label>
                <input name="price" type="number" class="form-control @error('price') is-invalid @enderror" id="price" placeholder="Pretul/Noapte">
                @error('price')
                <div class="invalid-feedback">
                   {{ $message }}
                  </div>
                  @enderror
            </div>
        </div>

        <div class="row my-3">
            <div class="col-md-6">
                <label for="description" class="form-label">Descrierea Camerei</label>
                <textarea name="description" class="form-control @error('description') is-invalid @enderror" id="description" rows="6"></textarea>
                @error('description')
                <div class="invalid-feedback">
                   {{ $message }}
                  </div>
                  @enderror
            </div>

            <div class=" col-md-3">
                <div id="img-preview">
                   <img class="img-form" src="{{ asset('images/rooms/room.png') }}" style="max-height:200px;"alt="">
                </div>
                <div class="custom-file">
                   <input accept="image/*" name="photo" type="file" class="form-control @error('photo') is-invalid @enderror" id="photoFile" />
                   <label class="custom-file-label" for="photoFile">  </label>
               </div>
               @error('photo')

               <div class="invalid-feedback">
                  {{ $message }}
                 </div>
                 @enderror
            </div>

            <div class="col-md-3">
                <label for="position" class="form-label">Pozitia in pagina</label>
                <input name="position" value="{{ old('position',10) }}" type="number" class="form-control @error('position') is-invalid @enderror" id="price" placeholder="positia pe pagina publica">
                @error('position')
                <div class="invalid-feedback">
                   {{ $message }}
                  </div>
                  @enderror

                  <div class="form-check mt-3">
                    <input name="active" class="form-check-input" type="checkbox" value="1" checked >
                    <label class="form-check-label" for="flexCheckDefault">
                      Camera activa
                    </label>
                  </div>
            </div>
        </div>
    </div>

    <div class="card-footer">

            <a href="{{ route('admin.rooms.list') }}" class="btn btn-dark float-start">Return</a>
            <button class="btn btn-primary float-end" type="submit">Add Room</button>

    </div>
</form>
</div>

@endsection

@push('customJs')
<script src="//cdn.ckeditor.com/4.18.0/standard/ckeditor.js"></script>
<script>
    // ClassicEditor
    //     .create( document.querySelector( '#description' ) )
    //     .catch( error => {
    //         console.error( error );
    //     } );

    CKEDITOR.replace( 'description' );
</script>

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



@endpush
