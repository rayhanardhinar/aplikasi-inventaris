<div class="card shadow mb-4">
    <div class="card-body">
        <div class="table-responsive">
            <div class="row">
                <div class="col-sm-12">

                </div>
            </div>
            <table class="table table-bordered dataTable" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th style="width: 60px">No</th>
                        <th style="width: 191px">Nama</th>
                        <th style="width: 170px">Deskripsi</th>
                        <th style="width: 90px">Jumlah</th>
                        <th style="width: 120px">Harga</th>
                        <th style="width: 80px">Kategori</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $product)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $product->name }}</td>
                            <td>{{ $product->description ?? '-' }}</td>
                            <td>{{ $product->quantity }}</td>
                            <td>{{ 'Rp ' . number_format($product->price, 2, ',', '.') }}
                            </td>
                            <td>{{ $product->category->name }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div class="card-footer">
        {{ $products->links('pagination::bootstrap-5') }}
    </div>
</div>
