<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Penjualan;
use Illuminate\Http\Request;

class PenjualanController extends Controller
{
    // Implementasi Fifo
    public function fifo(Request $request)
    {
        $barang = $request->nama_barang;
        $barangTerjual = (int) $request->barang_terjual;
        $namaBarang = Barang::where('nama_barang', $barang)->orderBy('id', 'asc')->first();
        if($barangTerjual > $namaBarang->stok){
            return redirect()->back()->with('information','Jumlah Maksimum di batasi');
        }
        $sisaStok = $namaBarang->stok - $barangTerjual;
        $namaBarang->update([
            'stok' => $sisaStok
        ]);
        if ($sisaStok <= 0) {
            // Hapus barang jika stoknya habis
            $namaBarang->delete();
        }
        Penjualan::create([
            'nama_barang' => $namaBarang->nama_barang,
            'jumlah_dijual' => $barangTerjual
        ]);
        return redirect()->back()->with('success','Penjualan berhasil ditambahkan');
    }


    public function lifo(Request $request)
    {
        // Implementasi Lifo
        $barang = $request->nama_barang;
        $barangTerjual = (int) $request->barang_terjual;
        $namaBarang = Barang::where('nama_barang', $barang)->orderBy('id', 'desc')->first();
        if($barangTerjual > $namaBarang->stok){
            return redirect()->back()->with('information','Jumlah Maksimum di batasi');
        }
        $sisaStok = $namaBarang->stok - $barangTerjual;
        $namaBarang->update([
            'stok' => $sisaStok
        ]);
        if ($sisaStok <= 0) {
            // Hapus barang jika stoknya habis
            $namaBarang->delete();
        }
        Penjualan::create([
            'nama_barang' => $namaBarang->nama_barang,
            'jumlah_dijual' => $barangTerjual
        ]);
        return redirect()->back()->with('success','Penjualan berhasil ditambahkan');
    }
}
