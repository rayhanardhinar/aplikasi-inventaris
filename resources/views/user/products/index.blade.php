@extends('layouts.main')

@section('header')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h1 mb-0 text-gray-900">Produk</h1>
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
