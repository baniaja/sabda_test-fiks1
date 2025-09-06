@extends('layouts.app')

@section('title', 'Hasil Penjualan')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h2><i class="bi bi-bar-chart-line me-2"></i>📊 Hasil Penjualan</h2>
                <div class="btn-group">
                    <button class="btn btn-outline-primary" onclick="exportData()">
                        <i class="bi bi-download me-1"></i>Export
                    </button>
                    <button class="btn btn-outline-secondary" onclick="printReport()">
                        <i class="bi bi-printer me-1"></i>Print
                    </button>
                </div>
            </div>

            <!-- Summary Cards -->
            <div class="row mb-4">
                <div class="col-md-3">
                    <div class="card bg-primary text-white">
                        <div class="card-body">
                            <h5 class="card-title">Total Penjualan</h5>
                            <h3>Rp 2,500,000</h3>
                            <small>+12% dari bulan lalu</small>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card bg-success text-white">
                        <div class="card-body">
                            <h5 class="card-title">Jumlah Order</h5>
                            <h3>150</h3>
                            <small>+8% dari bulan lalu</small>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card bg-warning text-white">
                        <div class="card-body">
                            <h5 class="card-title">Rata-rata Order</h5>
                            <h3>Rp 16,667</h3>
                            <small>+5% dari bulan lalu</small>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card bg-info text-white">
                        <div class="card-body">
                            <h5 class="card-title">Menu Terlaris</h5>
                            <h3>Nasi Goreng</h3>
                            <small>45 porsi terjual</small>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Sales Chart -->
            <div class="card mb-4">
                <div class="card-header">
                    <h5 class="card-title mb-0">Grafik Penjualan Bulanan</h5>
                </div>
                <div class="card-body">
                    <canvas id="salesChart" width="400" height="200"></canvas>
                </div>
            </div>

            <!-- Sales Table -->
            <!-- Removed Detail Penjualan as per user request -->
        </div>
    </div>
</div>

<script>
    // Sales Chart
    const ctx = document.getElementById('salesChart').getContext('2d');
    const salesChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep'],
            datasets: [{
                label: 'Penjualan (Rp)',
                data: [1200000, 1500000, 1800000, 2000000, 2200000, 2400000, 2500000, 2600000, 2500000],
                borderColor: 'rgba(75, 192, 192, 1)',
                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                tension: 0.1
            }]
        },
        options: {
            responsive: true,
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        callback: function(value, index, values) {
                            return 'Rp ' + value.toLocaleString();
                        }
                    }
                }
            }
        }
    });

    function exportData() {
        alert('Fitur export akan diimplementasikan');
    }

    function printReport() {
        window.print();
    }
</script>
@endsection
