@extends('layouts.app')

@section('title', 'Detail Pesanan')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-10">
        <div class="card shadow-sm">
            <div class="card-header bg-info text-white">
                <h4><i class="bi bi-eye me-2"></i>Detail Pesanan</h4>
            </div>
            <div class="card-body">
                <div class="row mb-4">
                    <div class="col-md-6">
                        <h6 class="text-muted">ID Pesanan</h6>
                        <p class="fs-5">#{{ $order->id }}</p>
                    </div>
                    <div class="col-md-6">
                        <h6 class="text-muted">Dibuat Pada</h6>
                        <p class="fs-5">{{ $order->created_at->format('d M Y H:i') }}</p>
                    </div>
                </div>

                <div class="row mb-4">
                    <div class="col-md-6">
                        <h6 class="text-muted">Nama Pelanggan</h6>
                        <p class="fs-5">{{ $order->customer_name }}</p>
                    </div>
                    <div class="col-md-6">
                        <h6 class="text-muted">Nomor Meja</h6>
                        <p class="fs-5">{{ $order->table_number }}</p>
                    </div>
                </div>

                <h6 class="mb-3">Item Pesanan</h6>
                <div class="table-responsive mb-4">
                    <table class="table table-bordered">
                        <thead class="table-light">
                            <tr>
                                <th>Menu</th>
                                <th>Kategori</th>
                                <th>Jumlah</th>
                                <th>Harga Satuan</th>
                                <th>Subtotal</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($order->items as $item)
                                <tr>
                                    <td>{{ $item->menu->nama_makanan }}</td>
                                    <td>
                                        <span class="badge bg-{{ $item->menu->kategori == 'makanan' ? 'success' : 'info' }}">
                                            {{ ucfirst($item->menu->kategori) }}
                                        </span>
                                    </td>
                                    <td>{{ $item->quantity }}</td>
                                    <td>Rp {{ number_format($item->menu->harga, 0, ',', '.') }}</td>
                                    <td>Rp {{ number_format($item->subtotal, 0, ',', '.') }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr class="table-dark">
                                <th colspan="4" class="text-end">Total:</th>
                                <th>Rp {{ number_format($order->total_price, 0, ',', '.') }}</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>

                <div class="d-flex justify-content-between">
                    <a href="{{ route('order.index') }}" class="btn btn-secondary">
                        <i class="bi bi-arrow-left me-1"></i>Kembali ke Daftar Pesanan
                    </a>
                    <div>
                        <a href="{{ route('order.edit', $order) }}" class="btn btn-warning me-2">
                            <i class="bi bi-pencil me-1"></i>Edit
                        </a>
                        <a href="{{ route('order.struk', $order) }}" target="_blank" class="btn btn-info me-2">
                            <i class="bi bi-printer me-1"></i>Cetak Struk
                        </a>
                        <form action="{{ route('order.destroy', $order) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger"
                                    onclick="return confirm('Apakah Anda yakin ingin menghapus pesanan ini?')">
                                <i class="bi bi-trash me-1"></i>Hapus
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
