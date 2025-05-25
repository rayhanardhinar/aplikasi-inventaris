@extends('layouts.main')

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
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($categories as $category)
                                <tr>
                                    <td class="text-center">{{ $loop->iteration }}</td>
                                    <td>{{ $category->name }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
