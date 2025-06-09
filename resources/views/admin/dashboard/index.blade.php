@extends('layouts.main')

@section('header')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h1 mb-0 text-gray-900">Dashboard</h1>
    </div>
@endsection

@section('content')
    {{-- List Total --}}
    <div class="row">
        <!-- Total Produk -->
        <div class="col-xl-3 col-md-6 mb-4">
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

        {{-- Jumlah User --}}
        <div class="col-xl-3 col-md-6 mb-4">
            <a href="#" class="text-decoration-none">
                <div class="card border-left-warning shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                    Total User</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $usersCount }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-user fa-2x text-warning"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>

        {{-- Jumlah Role --}}
        <div class="col-xl-3 col-md-6 mb-4">
            <a href="#" class="text-decoration-none">
                <div class="card border-left-info shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                    Total Role</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $rolesCount }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-users fa-2x text-info"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>
    </div>

    {{-- Chart --}}
    <div class="row align-items-stretch">
        <div class="col-xl-4 col-md-6">
            <div class="card shadow mb-4 h-100">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Chart Produk</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <div class="chart-pie pt-4 pb-2">
                        <canvas id="myPieChart" data-labels='@json($categories->pluck('name'))'
                            data-values='@json($categories->pluck('product_count'))' data-colors='@json($categories->pluck('color'))'>
                        </canvas>
                    </div>
                    <div class="mt-4 text-center small">
                        @foreach ($categories as $category)
                            <span class="mr-2">
                                <i class="fas fa-circle" style="color: {{ $category->color }}"></i> {{ $category->name }}
                            </span>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

        {{-- Project Card --}}
        <div class="col-xl-8 col-md-6">
            <div class="card shadow mb-4 h-100">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Stock Gudang</h6>
                </div>
                <div class="card-body mb-4">
                    @foreach ($categories as $category)
                        <h4 class="small font-weight-bold">{{ $category->name }} <span
                                class="float-right">{{ $category->product_count }} Produk</span></h4>
                        <div class="progress mb-4">
                            <div class="progress-bar" role="progressbar"
                                style="width: {{ $category->product_count }}% ; background-color: {{ $category->color }}"
                                aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
