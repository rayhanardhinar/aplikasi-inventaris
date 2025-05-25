@extends('layouts.main')

@section('header')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h1 mb-0 text-gray-900">Tambah Kategori</h1>
    </div>
@endsection

@section('content')
    <div class="row">
        <div class="col">
            <form action="/categories/store" method="POST">
                @csrf
                @method('POST')
                <div class="card">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="name" class="form-label text-dark font-weight-bold">Nama</label>
                            <input type="text" name="name" id="name"
                                class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}">
                            @error('name')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="d-flex justify-content-end">
                            <a href="/products" class="btn btn-sm btn-outline-secondary mr-3">Batal</a>
                            <button type="submit" class="btn btn-sm btn-outline-primary">Simpan</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
