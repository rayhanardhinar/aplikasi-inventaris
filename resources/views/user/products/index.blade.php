@extends('layouts.main')

@section('header')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h1 mb-0 text-gray-900">Produk</h1>
    </div>
@endsection

@section('content')
    <div id="product-data">
        @include('user.components.user-products-table')
    </div>
@endsection
