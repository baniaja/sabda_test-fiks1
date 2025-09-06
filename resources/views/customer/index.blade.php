@extends('layouts.app')

@section('title', 'Data Customer')

@section('content')
<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Data Customer</h1>
        <a href="{{ route('customers.create') }}" class="btn btn-primary">
            <i class="bi bi-plus-circle"></i> Tambah Customer
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show">
            <i class="bi bi-check-circle-fill me-2"></i>
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="card shadow-sm">
        <div class="card-header bg-white">
            <h5 class="card-title mb-0">Daftar Customer</h5>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover table-striped">
                    <thead class="table-dark">
                        <tr>
                            <th>Kode</th>
                            <th>Nama Customer</th>
                            <th>Alamat</th>
                            <th>Telepon</th>
                            <th>Email</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($customers as $customer)
                            <tr>
                                <td><strong>{{ $customer->kode_customer }}</strong></td>
                                <td>{{ $customer->nama_customer }}</td>
                                <td>{{ $customer->alamat ?? '-' }}</td>
                                <td>{{ $customer->telepon ?? '-' }}</td>
                                <td>{{ $customer->email ?? '-' }}</td>
                                <td>
                                    <div class="d-flex justify-content-center gap-2">
                                        <a href="{{ route('customers.show', $customer->id) }}" class="btn btn-info btn-sm" title="Lihat Detail">
                                            <i class="bi bi-eye"></i>
                                        </a>
                                        <a href="{{ route('customers.edit', $customer->id) }}" class="btn btn-warning btn-sm" title="Edit">
                                            <i class="bi bi-pencil"></i>
                                        </a>
                                        <form action="{{ route('customers.destroy', $customer->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" title="Hapus" onclick="return confirm('Apakah Anda yakin ingin menghapus customer ini?')">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center py-4">
                                    <i class="bi bi-people display-4 text-muted d-block mb-2"></i>
                                    <p class="text-muted">Belum ada data customer.</p>
                                    <a href="{{ route('customers.create') }}" class="btn btn-primary btn-sm">
                                        <i class="bi bi-plus-circle"></i> Tambah Customer Pertama
                                    </a>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            @if($customers->hasPages())
                <div class="d-flex justify-content-center mt-4">
                    {{ $customers->links() }}
                </div>
            @endif
        </div>
    </div>
</div>

<style>
    .table th {
        font-weight: 600;
        font-size: 0.9rem;
    }
    .btn-sm {
        padding: 0.25rem 0.5rem;
        font-size: 0.875rem;
    }
    .table-responsive {
        border-radius: 0.375rem;
    }
</style>
@endsection
