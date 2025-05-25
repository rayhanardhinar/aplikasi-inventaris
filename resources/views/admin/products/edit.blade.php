@extends('layouts.main')

@section('header')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h1 mb-0 text-gray-900">Ubah Produk</h1>
    </div>
@endsection

@section('content')
    <div class="row">
        <div class="col">
            <form action="/products/{{ $product->id }}" method="POST">
                @csrf
                @method('PUT')
                <div class="card">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="name" class="form-label text-dark font-weight-bold">Nama</label>
                            <input type="text" name="name" id="name"
                                class="form-control @error('name') is-invalid @enderror"
                                value="{{ old('name', $product->name) }}">
                            @error('name')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="" class="form-label text-dark font-weight-bold">Deskripsi</label>
                            <textarea name="description" id="description" cols="30" rows="10" class="form-control">{{ old('description', $product->description) }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="quantity" class="form-label text-dark font-weight-bold">Jumlah</label>
                            <input type="number" name="quantity" id="quantity"
                                class="form-control @error('name') is-invalid @enderror"
                                value="{{ old('quantity', $product->quantity) }}">
                            @error('quantity')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="price" class="form-label text-dark font-weight-bold">Harga</label>
                            <input type="number" name="price" id="price"
                                class="form-control @error('name') is-invalid @enderror"
                                value="{{ old('price', $product->price) }}">
                            @error('price')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="category_id" class="form-label text-dark font-weight-bold">Kategori</label>
                            <select name="category_id" id="category_id"
                                class="form-control @error('category_id') is-invalid @enderror">
                                <option value="" selected disabled>--- Pilih kategori barang ---</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}"
                                        {{ old('category_id', $product->category_id) == $category->id ? 'selected' : '' }}>
                                        {{ $category->name }}</option>
                                @endforeach
                            </select>
                            @error('category_id')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="d-flex justify-content-end">
                            <a href="/products" class="btn btn-sm btn-outline-secondary mr-3">Batal</a>
                            <button type="submit" class="btn btn-sm btn-outline-warning">Simpan</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
