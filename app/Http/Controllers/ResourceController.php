<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Makanan;
use App\Models\Customer;

class ResourceController extends Controller
{
    public function index()
    {
        $totalBarang = Makanan::count();
        $totalSuppliers = 0; // Removed Penyalur dependency
        $totalCustomers = Customer::count();

        return view('dashboard.index', compact('totalBarang', 'totalSuppliers', 'totalCustomers'));
    }

    public function hasilPenjualan()
    {
        // Dummy data for sales report
        $totalSales = 2500000;
        $totalOrders = 150;
        $averageOrder = 16667;
        $topMenu = 'Nasi Goreng';

        return view('hasilpenjualan.index', compact('totalSales', 'totalOrders', 'averageOrder', 'topMenu'));
    }
}
