@extends('layouts.app')

@section('title', 'Data Barang')

@section('content')
<div class="container mt-4">
    <div class="d-flex justify-content-between mb-3 align-items-center">
        <h3>Data Barang</h3>
        <a href="{{ route('barang.create') }}" class="btn btn-primary">
            <i class="bi bi-plus-circle"></i> Tambah Barang
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="table-responsive shadow rounded">
        <table class="table table-bordered table-hover align-middle text-center">
            <thead class="table-primary">
                <tr>
                    <th>No</th>
                    <th>Kode Barang</th>
                    <th>Nama Barang</th>
                    <th>Supplier</th>
                    <th>Stok</th>
                    <th>Harga Dasar</th>
                    <th>Harga Jual</th>
                    <th>Profit</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($barangs as $index => $barang)
                <tr>
                    <td>{{ $index + 1 + ($barangs->currentPage() - 1) * $barangs->perPage() }}</td>
                    <td>{{ $barang->kode_barang }}</td>
                    <td>{{ $barang->nama_barang }}</td>
                    <td>{{ $barang->nama_supplier ?? '-' }}</td>
                    <td>{{ $barang->jumlah_barang }}</td>
                    <td class="text-end">Rp {{ number_format($barang->harga_dasar, 0, ',', '.') }}</td>
                    <td class="text-end">Rp {{ number_format($barang->harga_jual, 0, ',', '.') }}</td>
                    <td class="text-end fw-semibold text-success">Rp {{ number_format($barang->profit, 0, ',', '.') }}</td>
                    <td>
                        <a href="{{ route('barang.show', $barang->id) }}" class="btn btn-success btn-sm mb-1">
                            <i class="bi bi-eye"></i> Detail
                        </a>
                        <a href="{{ route('barang.edit', $barang->id) }}" class="btn btn-warning btn-sm mb-1">
                            <i class="bi bi-pencil"></i> Edit
                        </a>
                        <form action="{{ route('barang.destroy', $barang->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus barang ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm mb-1">
                                <i class="bi bi-trash"></i> Hapus
                            </button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="9" class="text-center text-muted">Belum ada data barang.</td>
                </tr>
                @endforelse
            </tbody>
        </table>

        <div class="d-flex justify-content-end">
            {{ $barangs->links() }}
        </div>
    </div>
</div>
@endsection
