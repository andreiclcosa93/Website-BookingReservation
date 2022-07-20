@extends('admin.template')

@section('content')

<h1 class="my-4 text-center">Mesaje de la vizitatori- <span class="text-info">{{ $messages->total() }}</span></h1>


<div class="card mb-4">
    <div class="card-body">
        <table class="table">
            <thead>

                <th scope="col">#Nr</th>
                <th scope="col">Data</th>
                <th scope="col">Nume </th>
                <th scope="col">Email</th>
                <th scope="col">Mesaj</th>
                <th scope="col">Rol</th>

            </thead>
            <tbody>
                @forelse ($messages as $message )
                <tr>
                        <td>{{ $messages->currentPage() > 1 ? $loop->iteration + $messages->perPage() * ($messages->currentPage() - 1) : $loop->iteration }}
                        </td>
                        <td>
                            {{ $message->created_at->format('d-M Y') }}
                        </td>
                        <td>
                        {{ $message->name }}
                           </td>
                        <td>{{ $message->email }} </td>
                        <td>{{ $message->message }} </td>
                        <td>
                            <form class="d-none" action="{{ route('admin.messages.delete', $message->id) }}" method="POST" id="form-delete-{{ $message->id }}">
                                @csrf
                                @method('delete')
                            </form>
                            <button onclick="deleteConfirm('form-delete-{{ $message->id }}')" class="btn btn-danger">Sterge mesaj</button>
                        </td>
                </tr

                @empty
                    <div class="alert alert-info">
                        Nu avem mesaje de la utilizatori
                    </div>
                @endforelse

            </tbody>
        </table>
    </div>
    <div class="cad-footer">
        {{-- paginatia pentru lista de utilizatori --}}
        {{ $messages->links() }}
    </div>

</div>

@endsection

@push('customJs')
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        window.deleteConfirm = function(formId) {
            Swal.fire({
                icon: 'question',
                text: 'Confirmati stergerea mesajului?',
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
