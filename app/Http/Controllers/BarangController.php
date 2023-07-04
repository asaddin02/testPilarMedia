<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Penjualan;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function fifo()
    {
        $barangs = Barang::all();
        $penjualans = Penjualan::all();
        return view('barang.fifo',compact('barangs','penjualans'));
    }

    public function lifo()
    {
        $barangs = Barang::all();
        $penjualans = Penjualan::all();
        return view('barang.lifo',compact('barangs','penjualans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Barang::create($request->all());
        return redirect()->back()->with('success','Berhasil menambah barang');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $barang = Barang::find($id);
        $barang->update($request->all());
        return redirect()->back()->with('success','Berhasil mengedit barang');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $barang = Barang::find($id);
        $barang->delete();
        return redirect()->back()->with('information','Berhasil menghapus barang');
    }
}
