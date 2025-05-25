@extends('layouts.main')

@section('header')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h1 mb-0 text-gray-900">Dashboard</h1>
    </div>
@endsection

@section('content')
    <div class="row">
        <!-- Total Produk -->
        <div href="/products" class="col-xl-3 col-md-6 mb-4">
            <a href="/products" class="text-decoration-none">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                    Total Produk</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $productsCount }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-archive fa-2x text-primary"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </a>

        </div>

        <!-- Total Kategori -->
        <div class="col-xl-3 col-md-6 mb-4">
            <a href="/categories" class="text-decoration-none">
                <div class="card border-left-success shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                    Total Kategori</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $categoriesCount }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-layer-group fa-2x text-success"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </a>

        </div>
    </div>
@endsection
