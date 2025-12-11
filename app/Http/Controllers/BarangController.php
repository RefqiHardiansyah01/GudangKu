<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    public function index() {
        return view('dashboard', compact('barangs'));
    }

    public function create() {
        return view('barang.create');
    }

    public function store(Request $request) {
        $request->validate([
            'nama' => 'required',
            'stok' => 'required|integer|min:1',
            'deskripsi' => 'nullable',
        ]);

        Barang::create([
            'nama' => $request->nama,
            'stok' => $request->stok,
            'deskripsi' => $request->deskripsi,
            'user_id' => auth()->id(),
        ]); 

        return redirect()->route('dashboard')
            ->with('success', 'Barang berhasil ditambahkan');
    }

    public function edit(Barang $barang) {
        if ($barang->user_id !== auth()->id()) {
            abort(403, 'Anda tidak memiliki akses ke barang ini.');
        }

        return view('barang.edit', compact('barang'));
    }

    public function update(Request $request, Barang $barang) {
        $request->validate([
            'nama' => 'required',
            'stok' => 'required|integer|min:1',
            'deskripsi' => 'nullable'
        ]);

        $barang->update($request->all());

        return redirect()->route('dashboard')
            ->with('success', 'Barang berhasil diperbarui');
    }

    public function destroy(Barang $barang) {
        $barang->delete();

        return redirect()->route('dashboard')
            ->with('success', 'Barang berhasil dihapus');
    }
}
