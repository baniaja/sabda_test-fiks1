@extends('layouts.app')

@section('title', 'Detail Barang')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18">
                        <i class="fas fa-eye text-info"></i> Detail Barang
                    </h4>
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{ route('barang.index') }}">Data Barang</a></li>
                            <li class="breadcrumb-item active">{{ $barang->nama_barang }}</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-8">
                <div class="card border-0 shadow-sm">
                    <div class="card-header bg-gradient-info text-white">
                        <h5 class="card-title mb-0">
                            <i class="fas fa-info-circle me-2"></i>Informasi Lengkap Barang
                        </h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-4">
                                    <h6 class="fw-bold text-primary border-bottom pb-2">
                                        <i class="fas fa-cube me-2"></i>Identitas Barang
                                    </h6>
                                    <div class="mb-3">
                                        <label class="fw-bold text-muted">Kode Barang:</label>
                                        <p class="mb-0 fs-5 fw-bold text-primary">{{ $barang->kode_barang }}</p>
                                    </div>
                                    <div class="mb-3">
                                        <label class="fw-bold text-muted">Nama Barang:</label>
                                        <p class="mb-0 fs-5">{{ $barang->nama_barang }}</p>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-4">
                                    <h6 class="fw-bold text-success border-bottom pb-2">
                                        <i class="fas fa-building me-2"></i>Informasi Supplier
                                    </h6>
                                    <div class="mb-3">
                                        <label class="fw-bold text-muted">Kode Supplier:</label>
                                        <p class="mb-0">{{ $barang->kode_supplier }}</p>
                                    </div>
                                    <div class="mb-3">
                                        <label class="fw-bold text-muted">Nama Supplier:</label>
                                        <p class="mb-0">{{ $barang->nama_supplier }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <h6 class="fw-bold text-warning border-bottom pb-2">
                                    <i class="fas fa-chart-bar me-2"></i>Informasi Stok & Harga
                                </h6>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-3 mb-4">
                                <div class="text-center">
                                    <div class="bg-success bg-opacity-10 rounded-circle d-inline-flex align-items-center justify-content-center" style="width: 80px; height: 80px;">
                                        <i class="fas fa-boxes text-success fs-3"></i>
                                    </div>
                                    <h5 class="mt-3 mb-1">Stok Tersedia</h5>
                                    <span class="badge bg-{{ $barang->jumlah_barang > 0 ? 'success' : 'danger' }} fs-6">
                                        {{ $barang->jumlah_barang }} unit
                                    </span>
                                </div>
                            </div>

                            <div class="col-md-3 mb-4">
                                <div class="text-center">
                                    <div class="bg-primary bg-opacity-10 rounded-circle d-inline-flex align-items-center justify-content-center" style="width: 80px; height: 80px;">
                                        <i class="fas fa-dollar-sign text-primary fs-3"></i>
                                    </div>
                                    <h5 class="mt-3 mb-1">Harga Dasar</h5>
                                    <p class="mb-0 fw-bold text-primary">Rp {{ number_format($barang->harga_dasar, 0, ',', '.') }}</p>
                                </div>
                            </div>

                            <div class="col-md-3 mb-4">
                                <div class="text-center">
                                    <div class="bg-info bg-opacity-10 rounded-circle d-inline-flex align-items-center justify-content-center" style="width: 80px; height: 80px;">
                                        <i class="fas fa-tag text-info fs-3"></i>
                                    </div>
                                    <h5 class="mt-3 mb-1">Harga Jual</h5>
                                    <p class="mb-0 fw-bold text-info">Rp {{ number_format($barang->harga_jual, 0, ',', '.') }}</p>
                                </div>
                            </div>

                            <div class="col-md-3 mb-4">
                                <div class="text-center">
                                    <div class="bg-warning bg-opacity-10 rounded-circle d-inline-flex align-items-center justify-content-center" style="width: 80px; height: 80px;">
                                        <i class="fas fa-chart-line text-warning fs-3"></i>
                                    </div>
                                    <h5 class="mt-3 mb-1">Profit</h5>
                                    <p class="mb-0 fw-bold text-warning">Rp {{ number_format($barang->profit, 0, ',', '.') }}</p>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="card bg-light border-0">
                                    <div class="card-body text-center">
                                        <h6 class="text-muted mb-2">Profit Margin</h6>
                                        <div class="progress mb-2" style="height: 10px;">
                                            <div class="progress-bar bg-success" style="width: {{ min($barang->profit_margin, 100) }}%"></div>
                                        </div>
                                        <h4 class="text-success mb-0">{{ number_format($barang->profit_margin, 2) }}%</h4>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="card bg-light border-0">
                                    <div class="card-body text-center">
                                        <h6 class="text-muted mb-2">Total Nilai Stok</h6>
                                        <h4 class="text-primary mb-0">
                                            Rp {{ number_format($barang->harga_jual * $barang->jumlah_barang, 0, ',', '.') }}
                                        </h4>
                                        <small class="text-muted">
                                            {{ $barang->jumlah_barang }} unit × Rp {{ number_format($barang->harga_jual, 0, ',', '.') }}
                                        </small>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row mt-4">
                            <div class="col-12">
                                <div class="alert alert-info">
                                    <h6 class="alert-heading">
                                        <i class="fas fa-info-circle"></i> Informasi Tambahan
                                    </h6>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <p class="mb-1"><strong>Dibuat:</strong> {{ $barang->created_at->format('d M Y H:i') }}</p>
                                        </div>
                                        <div class="col-md-6">
                                            <p class="mb-1"><strong>Terakhir diupdate:</strong> {{ $barang->updated_at->format('d M Y H:i') }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="card border-0 shadow-sm">
                    <div class="card-header bg-gradient-secondary text-white">
                        <h5 class="card-title mb-0">
                            <i class="fas fa-cogs me-2"></i>Aksi
                        </h5>
                    </div>
                    <div class="card-body">
                        <div class="d-grid gap-2">
                            <a href="{{ route('barang.edit', $barang) }}" class="btn btn-warning">
                                <i class="fas fa-edit me-2"></i>Edit Barang
                            </a>
                            <form action="{{ route('barang.destroy', $barang) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger w-100"
                                        onclick="return confirm('Yakin ingin menghapus barang ini?')">
                                    <i class="fas fa-trash me-2"></i>Hapus Barang
                                </button>
                            </form>
                            <a href="{{ route('barang.index') }}" class="btn btn-secondary">
                                <i class="fas fa-list me-2"></i>Lihat Semua Barang
                            </a>
                        </div>
                    </div>
                </div>

                <div class="card border-0 shadow-sm mt-3">
                    <div class="card-header bg-gradient-primary text-white">
                        <h5 class="card-title mb-0">
                            <i class="fas fa-chart-pie me-2"></i>Ringkasan
                        </h5>
                    </div>
                    <div class="card-body">
                        <div class="d-flex justify-content-between mb-2">
                            <span class="text-muted">Status Stok:</span>
                            <span class="badge bg-{{ $barang->jumlah_barang > 0 ? 'success' : 'danger' }}">
                                {{ $barang->jumlah_barang > 0 ? 'Tersedia' : 'Habis' }}
                            </span>
                        </div>
                        <div class="d-flex justify-content-between mb-2">
                            <span class="text-muted">Profit per Unit:</span>
                            <span class="text-success fw-bold">Rp {{ number_format($barang->profit, 0, ',', '.') }}</span>
                        </div>
                        <div class="d-flex justify-content-between">
                            <span class="text-muted">Margin:</span>
                            <span class="text-info fw-bold">{{ number_format($barang->profit_margin, 2) }}%</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('styles')
<style>
    .bg-gradient-info {
        background: linear-gradient(135deg, #36d1dc 0%, #5b86e5 100%);
    }
    .bg-gradient-secondary {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    }
    .bg-gradient-primary {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    }
    .card {
        border-radius: 15px;
        overflow: hidden;
    }
    .progress {
        border-radius: 10px;
    }
</style>
@endpush
