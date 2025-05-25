@extends('layouts.main')

@section('header')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h1 mb-0 text-gray-900">Produk</h1>
        <a href="/products/create" class="d-none d-sm-inline-block btn btn-md bg-gradient-warning shadow-sm text-white"><i
                class="fa fa-plus fa-sm text-white"></i> Tambah Produk </a>
    </div>
@endsection

@section('content')
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body table-responsive">
                    <table class="table table-bordered" style="table-layout: fixed">
                        <thead class="text-center">
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Deskripsi</th>
                                <th>Jumlah</th>
                                <th>Harga</th>
                                <th>Kategori</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $product)
                                <tr>
                                    <td class="text-center">{{ $loop->iteration }}</td>
                                    <td>{{ $product->name }}</td>
                                    <td>{{ $product->description ?? '-' }}</td>
                                    <td class="text-center">{{ $product->quantity }}</td>
                                    <td class="text-center">{{ 'Rp ' . number_format($product->price, 2, ',', '.') }}</td>
                                    <td class="text-center">{{ $product->category->name }}</td>
                                    <td>
                                        <div class="d-flex justify-content-center">
                                            <a href="/products/edit/{{ $product->id }}"
                                                class="btn btn-sm btn-warning mr-2"><i
                                                    class="fa-solid fa-pen-to-square"></i></a>
                                            <button type="submit" class="btn btn-sm btn-danger" href="#"
                                                data-toggle="modal" data-target="#deleteModal-{{ $product->id }}"><i
                                                    class="fa-solid fa-trash"></i></button>
                                        </div>
                                        <div class="modal fade" id="deleteModal-{{ $product->id }}" tabindex="-1"
                                            role="dialog" aria-labelledby="deleteModalLabel{{ $product->id }}"
                                            aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="deleteModalLabel{{ $product->id }}">
                                                            Hapus
                                                            Produk</h5>
                                                    </div>
                                                    <div class="modal-body">Apakah kamu yakin ingin menghapus
                                                        <strong>{{ $product->name }}</strong>?
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button class="btn btn-secondary" type="button"
                                                            data-dismiss="modal">Batal</button>
                                                        <form action="/products/{{ $product->id }}" method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-danger">Hapus</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="card-footer">
                    {{ $products->links('pagination::bootstrap-5') }}
                </div>
            </div>
        </div>
    </div>
@endsection
