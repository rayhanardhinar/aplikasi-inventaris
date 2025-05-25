<div class="card shadow mb-4">
    <div class="card-body">
        <table class="table table-bordered" style="table-layout: fixed">
            <thead class="text-center">
                <tr>
                    <th style="width: 60px">No</th>
                    <th style="width: 191px">Nama</th>
                    <th style="width: 170px">Deskripsi</th>
                    <th style="width: 90px">Jumlah</th>
                    <th style="width: 120px">Harga</th>
                    <th style="width: 80px">Kategori</th>
                    <th style="width: 80px">Aksi</th>
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
                                <a href="/products/edit/{{ $product->id }}" class="btn btn-sm btn-warning mr-2"><i
                                        class="fa-solid fa-pen-to-square"></i></a>
                                <button type="submit" class="btn btn-sm btn-danger" href="#" data-toggle="modal"
                                    data-target="#deleteModal-{{ $product->id }}"><i
                                        class="fa-solid fa-trash"></i></button>
                            </div>
                            <div class="modal fade" id="deleteModal-{{ $product->id }}" tabindex="-1" role="dialog"
                                aria-labelledby="deleteModalLabel{{ $product->id }}" aria-hidden="true">
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
