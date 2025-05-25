@extends('layouts.main')

@section('header')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h1 mb-0 text-gray-900">Produk</h1>
        <a href="/products/create" class="d-none d-sm-inline-block btn btn-md bg-gradient-warning shadow-sm text-white"><i
                class="fa fa-plus fa-sm text-white"></i> Tambah Produk </a>
    </div>
@endsection

@section('content')
    <div id="product-data">
        @include('admin.components.admin-products-table')
    </div>
@endsection
