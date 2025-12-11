<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\BarangLog;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {   
        $barangs = Barang::paginate(10);
        $barangs = Barang::orderBy('id', 'DESC')->paginate(10);
        $totalBarang = Barang::sum('stok');

        return view('dashboard', compact('totalBarang', 'barangs'));
    }
}
