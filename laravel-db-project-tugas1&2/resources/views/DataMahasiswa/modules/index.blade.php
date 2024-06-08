@extends('DataMahasiswa.layouts.index')

@section('main-content')
    <div class="row mt-5">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header fw-bold">
                    Data Mahasiswa
                </div>
                <div class="card-body">
                    <table class="table table-striped">
                        @if (count($data) > 0)
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">NPM</th>
                                    <th scope="col">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $mahasiswa)
                                    <tr>
                                        <th>{{ $loop->index + 1 }}</th>
                                        <td>{{ $mahasiswa->email }}</td>
                                        <td>{{ $mahasiswa->nama }}</td>
                                        <td>{{ $mahasiswa->npm }}</td>
                                        <td>
                                            <div class="btn-group btn-group-sm" role="group">
                                                <a href="/details/{{ $mahasiswa->id }}" class="btn btn-primary btn-sm">
                                                    <i class="bi bi-eye-fill"></i>
                                                </a>
                                                <a href="/update/{{ $mahasiswa->id }}" class="btn btn-success btn-sm">
                                                    <i class="bi bi-pencil-square"></i>
                                                </a>
                                                <form action="/delete/{{ $mahasiswa->id }}" method="POST" style="display:inline;">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="submit" class="btn btn-danger btn-sm"
                                                        onclick="return confirm('Apakah data {{ $mahasiswa->nama }} tersebut mau dihapus?')">
                                                        <i class="bi bi-trash-fill"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        @else
                            <h3 class="text-center">No Record!</h3>
                        @endif
                    </table>
                </div>
            </div>
            <div class="mt-3">
                {{-- {{ $data->links() }} --}}
            </div>
        </div>
        <div class="col-lg-4">
            @include('DataMahasiswa.modules.create')
        </div>
    </div>
@endsection
