@extends('layouts.components.main')

@section('header')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h1 mb-0 text-gray-900">Kategori</h1>
    <a href="/categories/create" class="d-none d-sm-inline-block btn btn-md bg-gradient-warning shadow-sm text-white"><i
            class="fa fa-plus fa-sm text-white"></i> Tambah Kategori </a>
</div>
@endsection

@section('content')
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body table-responsive">
                    <table class="table table-bordered">
                        <thead class="text-center">
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($categories as $category)
                                <tr>
                                <td class="text-center">{{ $loop->iteration }}</td>
                                <td>{{ $category->name }}</td>
                                <td>
                                    <div class="d-flex justify-content-center">
                                        <a href="/categories/edit/{{ $category->id }}" class="btn btn-sm btn-warning mr-2"><i class="fa-solid fa-pen-to-square"></i></a>
                                        <button type="submit" class="btn btn-sm btn-danger" href="#" data-toggle="modal" data-target="#deleteModal-{{ $category->id }}"><i class="fa-solid fa-trash"></i></button>
                                    </div>
                                </td>
                            </tr>
                            <div class="modal fade" id="deleteModal-{{ $category->id }}" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel{{ $category->id }}" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <form action="/categories/{{ $category->id }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="deleteModalLabel{{ $category->id }}">Hapus Kategori</h5>
                                            </div>
                                            <div class="modal-body" id="modalBody-{{ $category->id }}">
                                                Apakah kamu yakin ingin menghapus kategori <strong>{{ $category->name }}</strong>?
                                            </div>
                                            <div class="modal-footer">
                                                <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                                                <button type="button" id="deleteButton-{{ $category->id }}" class="btn btn-danger" >Hapus</button>
                                                <button type="submit" id="confirmButton-{{ $category->id }}" class="btn btn-danger">Yakin, Hapus</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script>

    </script>

@endsection
