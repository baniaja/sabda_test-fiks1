@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="dashboard-container">
    <!-- Hero Section -->
    <div class="hero-section">
        <div class="hero-content">
            <div class="hero-text">
                <h1 class="hero-title">
                    <i class="bi bi-shop me-3"></i>
                    <span class="brand-name">My Resto</span>
                </h1>
                <p class="hero-subtitle">Sistem Manajemen Restoran Modern</p>
                <div class="hero-badges">
                    <span class="badge-custom">Makanan Berkualitas</span>
                    <span class="badge-custom">Layanan Cepat</span>
                    <span class="badge-custom">Harga Terjangkau</span>
                </div>
            </div>
            <div class="hero-actions">
                <a href="{{ route('order.create') }}" class="btn-hero-primary">
                    <i class="bi bi-plus-circle-fill me-2"></i>
                    Buat Pesanan Baru
                </a>
                <a href="{{ route('menu.index') }}" class="btn-hero-secondary">
                    <i class="bi bi-menu-button-wide me-2"></i>
                    Lihat Menu
                </a>
            </div>
        </div>
        <div class="hero-decoration">
            <!-- Removed floating food emojis for cleaner look -->
        </div>
    </div>

    <!-- Welcome Message -->
    <div class="welcome-card">
        <div class="welcome-icon">
            <i class="bi bi-person-circle"></i>
        </div>
        <div class="welcome-content">
            <h3>Selamat Datang, Chef!</h3>
            <p>Hari ini adalah hari yang indah untuk melayani pelanggan dengan sepenuh hati. Mari kita buat pengalaman makan yang tak terlupakan!</p>
        </div>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show">
            <i class="bi bi-check-circle-fill me-2"></i>
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <!-- Statistics Cards -->
    <div class="stats-grid">
        <div class="stat-card stat-menu">
            <div class="stat-icon">
                <i class="bi bi-menu-button-wide-fill"></i>
            </div>
            <div class="stat-content">
                <h3 class="stat-number">{{ $totalBarang }}</h3>
                <p class="stat-label">Menu Tersedia</p>
                <div class="stat-trend">
                    <i class="bi bi-arrow-up-circle-fill"></i>
                    <span>+5 hari ini</span>
                </div>
            </div>
            <a href="{{ route('menu.index') }}" class="stat-link">
                <i class="bi bi-arrow-right-circle"></i>
            </a>
        </div>

        <div class="stat-card stat-orders">
            <div class="stat-icon">
                <i class="bi bi-receipt-cutoff"></i>
            </div>
            <div class="stat-content">
                <h3 class="stat-number">24</h3>
                <p class="stat-label">Pesanan Hari Ini</p>
                <div class="stat-trend">
                    <i class="bi bi-arrow-up-circle-fill"></i>
                    <span>+12% dari kemarin</span>
                </div>
            </div>
            <a href="{{ route('order.index') }}" class="stat-link">
                <i class="bi bi-arrow-right-circle"></i>
            </a>
        </div>

        <div class="stat-card stat-customers">
            <div class="stat-icon">
                <i class="bi bi-people-fill"></i>
            </div>
            <div class="stat-content">
                <h3 class="stat-number">{{ $totalCustomers }}</h3>
                <p class="stat-label">Pelanggan Setia</p>
                <div class="stat-trend">
                    <i class="bi bi-heart-fill"></i>
                    <span>Puas 100%</span>
                </div>
            </div>
            <a href="{{ route('customers.index') }}" class="stat-link">
                <i class="bi bi-arrow-right-circle"></i>
            </a>
        </div>

        <div class="stat-card stat-revenue">
            <div class="stat-icon">
                <i class="bi bi-cash-stack"></i>
            </div>
            <div class="stat-content">
                <h3 class="stat-number">Rp 2.4M</h3>
                <p class="stat-label">Pendapatan Hari Ini</p>
                <div class="stat-trend">
                    <i class="bi bi-graph-up-arrow"></i>
                    <span>+18% dari target</span>
                </div>
            </div>
            <a href="{{ route('hasilpenjualan.index') }}" class="stat-link">
                <i class="bi bi-arrow-right-circle"></i>
            </a>
        </div>
    </div>

    <!-- Featured Menu Section -->
    <div class="featured-section">
        <div class="section-header">
            <h2 class="section-title">
                <i class="bi bi-star-fill me-2"></i>
                Menu Unggulan Hari Ini
            </h2>
            <p class="section-subtitle">Nikmati hidangan spesial pilihan chef kami</p>
        </div>

        <div class="menu-showcase">
            <div class="menu-item featured">
                <div class="menu-image">
                    <i class="bi bi-star-fill menu-icon"></i>
                    <div class="menu-badge">Terlaris</div>
                </div>
                <div class="menu-info">
                    <h4 class="menu-name">Nasi Goreng Special</h4>
                    <p class="menu-desc">Nasi goreng dengan ayam, telur, dan sayuran segar</p>
                    <div class="menu-price">Rp 25.000</div>
                </div>
            </div>

            <div class="menu-item">
                <div class="menu-image">
                    <i class="bi bi-fire menu-icon"></i>
                    <div class="menu-badge hot">Panas</div>
                </div>
                <div class="menu-info">
                    <h4 class="menu-name">Ayam Bakar Madu</h4>
                    <p class="menu-desc">Ayam bakar dengan saus madu dan rempah pilihan</p>
                    <div class="menu-price">Rp 35.000</div>
                </div>
            </div>

            <div class="menu-item">
                <div class="menu-image">
                    <i class="bi bi-cup-straw menu-icon"></i>
                    <div class="menu-badge best">Termurah</div>
                </div>
                <div class="menu-info">
                    <h4 class="menu-name">Es Teh Manis</h4>
                    <p class="menu-desc">Teh segar dengan gula arenjung dan es batu</p>
                    <div class="menu-price">Rp 8.000</div>
                </div>
            </div>
        </div>
    </div>

    <!-- Quick Actions Section -->
    <div class="quick-actions">
        <div class="section-header">
            <h2 class="section-title">
                <i class="bi bi-lightning-fill me-2"></i>
                Aksi Cepat
            </h2>
            <p class="section-subtitle">Kelola restoran Anda dengan mudah</p>
        </div>

        <div class="actions-grid">
            <a href="{{ route('menu.create') }}" class="action-card">
                <div class="action-icon">
                    <i class="bi bi-plus-circle-fill"></i>
                </div>
                <div class="action-content">
                    <h4>Tambah Menu</h4>
                    <p>Tambahkan menu baru ke katalog</p>
                </div>
                <div class="action-arrow">
                    <i class="bi bi-arrow-right-circle"></i>
                </div>
            </a>

            <a href="{{ route('order.create') }}" class="action-card">
                <div class="action-icon">
                    <i class="bi bi-receipt-cutoff"></i>
                </div>
                <div class="action-content">
                    <h4>Buat Pesanan</h4>
                    <p>Proses pesanan pelanggan baru</p>
                </div>
                <div class="action-arrow">
                    <i class="bi bi-arrow-right-circle"></i>
                </div>
            </a>

            <a href="{{ route('customers.create') }}" class="action-card">
                <div class="action-icon">
                    <i class="bi bi-person-plus-fill"></i>
                </div>
                <div class="action-content">
                    <h4>Tambah Pelanggan</h4>
                    <p>Daftarkan pelanggan baru</p>
                </div>
                <div class="action-arrow">
                    <i class="bi bi-arrow-right-circle"></i>
                </div>
            </a>

            <a href="{{ route('hasilpenjualan.index') }}" class="action-card">
                <div class="action-icon">
                    <i class="bi bi-bar-chart-line-fill"></i>
                </div>
                <div class="action-content">
                    <h4>Laporan Penjualan</h4>
                    <p>Lihat laporan penjualan hari ini</p>
                </div>
                <div class="action-arrow">
                    <i class="bi bi-arrow-right-circle"></i>
                </div>
            </a>
        </div>
    </div>
</div>

<style>
/* Dashboard Container */
.dashboard-container {
    max-width: 1400px;
    margin: 0 auto;
    padding: 2rem;
    background: linear-gradient(135deg, #f5f0e6 0%, #fff8e1 100%);
    min-height: 100vh;
}

/* Hero Section */
.hero-section {
    background: linear-gradient(135deg, #d2b48c 0%, #a67c52 50%, #8b4513 100%);
    border-radius: 20px;
    padding: 3rem 2rem;
    margin-bottom: 2rem;
    position: relative;
    overflow: hidden;
    box-shadow: 0 10px 30px rgba(139, 69, 19, 0.2);
}

.hero-content {
    display: flex;
    justify-content: space-between;
    align-items: center;
    position: relative;
    z-index: 2;
}

.hero-text {
    flex: 1;
    color: white;
}

.hero-title {
    font-size: 3rem;
    font-weight: 700;
    margin-bottom: 0.5rem;
    text-shadow: 2px 2px 4px rgba(0,0,0,0.3);
}

.brand-name {
    background: linear-gradient(45deg, #fff, #f5f0e6);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
}

.hero-subtitle {
    font-size: 1.2rem;
    margin-bottom: 1rem;
    opacity: 0.9;
}

.hero-badges {
    display: flex;
    gap: 1rem;
    margin-bottom: 1.5rem;
}

.badge-custom {
    background: rgba(255,255,255,0.2);
    color: white;
    padding: 0.5rem 1rem;
    border-radius: 25px;
    font-size: 0.9rem;
    backdrop-filter: blur(10px);
    border: 1px solid rgba(255,255,255,0.3);
}

.hero-actions {
    display: flex;
    gap: 1rem;
    flex-direction: column;
}

.btn-hero-primary {
    background: linear-gradient(45deg, #fff, #f5f0e6);
    color: #8b4513;
    border: none;
    padding: 1rem 2rem;
    border-radius: 15px;
    font-weight: 600;
    text-decoration: none;
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
    transition: all 0.3s ease;
    box-shadow: 0 4px 15px rgba(0,0,0,0.2);
}

.btn-hero-primary:hover {
    transform: translateY(-2px);
    box-shadow: 0 6px 20px rgba(0,0,0,0.3);
}

.btn-hero-secondary {
    background: rgba(255,255,255,0.1);
    color: white;
    border: 2px solid rgba(255,255,255,0.3);
    padding: 1rem 2rem;
    border-radius: 15px;
    font-weight: 600;
    text-decoration: none;
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
    transition: all 0.3s ease;
    backdrop-filter: blur(10px);
}

.btn-hero-secondary:hover {
    background: rgba(255,255,255,0.2);
    border-color: rgba(255,255,255,0.5);
}

.hero-decoration {
    position: absolute;
    top: 0;
    right: 0;
    width: 100%;
    height: 100%;
    pointer-events: none;
}

/* Removed floating animation styles */

/* Welcome Card */
.welcome-card {
    background: white;
    border-radius: 15px;
    padding: 2rem;
    margin-bottom: 2rem;
    display: flex;
    align-items: center;
    gap: 1.5rem;
    box-shadow: 0 5px 15px rgba(139, 69, 19, 0.1);
    border-left: 5px solid #d2b48c;
}

.welcome-icon {
    background: linear-gradient(45deg, #d2b48c, #a67c52);
    color: white;
    width: 60px;
    height: 60px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.5rem;
}

.welcome-content h3 {
    color: #5a4631;
    margin-bottom: 0.5rem;
}

.welcome-content p {
    color: #8b4513;
    margin: 0;
}

/* Statistics Grid */
.stats-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
    gap: 1.5rem;
    margin-bottom: 3rem;
}

.stat-card {
    background: white;
    border-radius: 15px;
    padding: 2rem;
    display: flex;
    align-items: center;
    gap: 1.5rem;
    box-shadow: 0 5px 15px rgba(139, 69, 19, 0.1);
    transition: all 0.3s ease;
    position: relative;
    overflow: hidden;
}

.stat-card::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 4px;
    background: linear-gradient(90deg, #d2b48c, #a67c52);
}

.stat-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 25px rgba(139, 69, 19, 0.2);
}

.stat-icon {
    background: linear-gradient(45deg, #d2b48c, #a67c52);
    color: white;
    width: 60px;
    height: 60px;
    border-radius: 15px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.5rem;
}

.stat-content {
    flex: 1;
}

.stat-number {
    font-size: 2.5rem;
    font-weight: 700;
    color: #5a4631;
    margin: 0;
    line-height: 1;
}

.stat-label {
    color: #8b4513;
    margin: 0.5rem 0;
    font-weight: 500;
}

.stat-trend {
    display: flex;
    align-items: center;
    gap: 0.5rem;
    font-size: 0.9rem;
    color: #28a745;
}

.stat-link {
    color: #d2b48c;
    font-size: 1.5rem;
    transition: all 0.3s ease;
}

.stat-link:hover {
    color: #a67c52;
    transform: scale(1.1);
}

/* Featured Section */
.featured-section {
    margin-bottom: 3rem;
}

.section-header {
    text-align: center;
    margin-bottom: 2rem;
}

.section-title {
    color: #5a4631;
    font-size: 2rem;
    font-weight: 700;
    margin-bottom: 0.5rem;
}

.section-subtitle {
    color: #8b4513;
    font-size: 1.1rem;
    margin: 0;
}

.menu-showcase {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
    gap: 1.5rem;
}

.menu-item {
    background: white;
    border-radius: 15px;
    overflow: hidden;
    box-shadow: 0 5px 15px rgba(139, 69, 19, 0.1);
    transition: all 0.3s ease;
    position: relative;
}

.menu-item:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 25px rgba(139, 69, 19, 0.2);
}

.menu-item.featured {
    border: 3px solid #d2b48c;
}

.menu-image {
    height: 150px;
    background: linear-gradient(45deg, #f5f0e6, #fff8e1);
    display: flex;
    align-items: center;
    justify-content: center;
    position: relative;
}

.menu-icon {
    font-size: 4rem;
    color: #d2b48c;
}

.menu-badge {
    position: absolute;
    top: 10px;
    right: 10px;
    background: #d2b48c;
    color: white;
    padding: 0.5rem 1rem;
    border-radius: 20px;
    font-size: 0.8rem;
    font-weight: 600;
}

.menu-badge.hot {
    background: #dc3545;
}

.menu-badge.best {
    background: #28a745;
}

.menu-info {
    padding: 1.5rem;
}

.menu-name {
    color: #5a4631;
    font-size: 1.3rem;
    font-weight: 600;
    margin-bottom: 0.5rem;
}

.menu-desc {
    color: #8b4513;
    margin-bottom: 1rem;
    line-height: 1.4;
}

.menu-price {
    color: #28a745;
    font-size: 1.2rem;
    font-weight: 700;
}

/* Quick Actions */
.quick-actions {
    margin-bottom: 2rem;
}

.actions-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
    gap: 1.5rem;
}

.action-card {
    background: white;
    border-radius: 15px;
    padding: 2rem;
    display: flex;
    align-items: center;
    gap: 1.5rem;
    text-decoration: none;
    color: inherit;
    box-shadow: 0 5px 15px rgba(139, 69, 19, 0.1);
    transition: all 0.3s ease;
    position: relative;
    overflow: hidden;
}

.action-card::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 4px;
    background: linear-gradient(90deg, #d2b48c, #a67c52);
    transform: scaleX(0);
    transition: transform 0.3s ease;
}

.action-card:hover::before {
    transform: scaleX(1);
}

.action-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 25px rgba(139, 69, 19, 0.2);
}

.action-icon {
    background: linear-gradient(45deg, #d2b48c, #a67c52);
    color: white;
    width: 50px;
    height: 50px;
    border-radius: 12px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.2rem;
}

.action-content h4 {
    color: #5a4631;
    margin-bottom: 0.25rem;
    font-weight: 600;
}

.action-content p {
    color: #8b4513;
    margin: 0;
    font-size: 0.9rem;
}

.action-arrow {
    color: #d2b48c;
    font-size: 1.2rem;
    transition: all 0.3s ease;
}

.action-card:hover .action-arrow {
    color: #a67c52;
    transform: translateX(5px);
}

/* Responsive Design */
@media (max-width: 768px) {
    .dashboard-container {
        padding: 1rem;
    }

    .hero-section {
        padding: 2rem 1rem;
    }

    .hero-content {
        flex-direction: column;
        text-align: center;
        gap: 2rem;
    }

    .hero-title {
        font-size: 2rem;
    }

    .hero-badges {
        justify-content: center;
    }

    .hero-actions {
        flex-direction: row;
        justify-content: center;
    }

    .stats-grid {
        grid-template-columns: 1fr;
    }

    .menu-showcase {
        grid-template-columns: 1fr;
    }

    .actions-grid {
        grid-template-columns: 1fr;
    }

    .welcome-card {
        flex-direction: column;
        text-align: center;
    }
}
</style>
@endsection
