@extends('layouts.template')

@section('title', 'Lifo')

@section('main')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Tabel Barang</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                        <li class="breadcrumb-item active">Tabel Barang</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Barang</h3>
                            <div class="card-tools">
                                <div class="input-group input-group-sm" style="width: 150px;">
                                    <div class="input-group-append">
                                        <button type="button" data-toggle="modal" data-target="#tambah-barang"
                                            class="btn btn-primary">
                                            <i class="fas fa-plus"></i>
                                            Tambah Barang
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-nowrap">
                                <thead>
                                    <tr class="text-center">
                                        <th>NO</th>
                                        <th>Nama Barang</th>
                                        <th>Stok</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @isset($barangs)
                                        @foreach ($barangs as $barang)
                                            <tr class="text-center">
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $barang->nama_barang }}</td>
                                                <td>{{ $barang->stok }}</td>
                                                <td>
                                                    <button type="button" data-toggle="modal"
                                                        data-target="#edit-barang{{ $barang->id }}"
                                                        class="btn btn-sm btn-secondary">
                                                        <i class="fas fa-pen"></i>
                                                        Edit Barang
                                                    </button>
                                                    <button type="button" data-toggle="modal"
                                                        data-target="#hapus-barang{{ $barang->id }}"
                                                        class="btn btn-sm btn-danger">
                                                        <i class="fas fa-trash"></i>
                                                        Hapus Barang
                                                    </button>
                                                </td>
                                            </tr>

                                            {{-- modal edit --}}
                                            <div class="modal fade" id="edit-barang{{ $barang->id }}">
                                                <div class="modal-dialog modal-lg">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h4 class="modal-title">Edit Barang</h4>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form class="form-horizontal"
                                                                action="{{ route('barang.update', $barang->id) }}"
                                                                method="post">
                                                                @csrf
                                                                @method('put')
                                                                <div class="form-group row">
                                                                    <label for="namabarang" class="col-sm-2 col-form-label">Nama
                                                                        Barang</label>
                                                                    <div class="col-sm-10">
                                                                        <input type="text" name="nama_barang"
                                                                            class="form-control" id="namabarang"
                                                                            value="{{ $barang->nama_barang }}">
                                                                    </div>
                                                                </div>
                                                                <div class="form-group row">
                                                                    <label for="stok"
                                                                        class="col-sm-2 col-form-label">Stok</label>
                                                                    <div class="col-sm-10">
                                                                        <input type="number" name="stok"
                                                                            class="form-control" id="stok"
                                                                            value="{{ $barang->stok }}">
                                                                    </div>
                                                                </div>
                                                        </div>
                                                        <div class="modal-footer justify-content-end">
                                                            <div class="form-group row">
                                                                <div class="offset-sm-2 col-sm-10">
                                                                    <button type="submit"
                                                                        class="btn btn-sm btn-secondary">Edit</button>
                                                                </div>
                                                            </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                    <!-- /.modal-content -->
                                                </div>
                                                <!-- /.modal-dialog -->
                                            </div>

                                            {{-- modal hapus --}}
                                            <div class="modal fade" id="hapus-barang{{ $barang->id }}">
                                                <div class="modal-dialog modal-sm">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h4 class="modal-title">Apakah anda yakin</h4>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form class="form-horizontal"
                                                                action="{{ route('barang.destroy', $barang->id) }}"
                                                                method="post">
                                                                @csrf
                                                                @method('delete')
                                                                <p>Ingin mengapus barang
                                                                    <b class="text-danger">{{ $barang->nama_barang }}</b>
                                                                    dengan ID <b>{{ $barang->id }}</b> ?
                                                                </p>
                                                        </div>
                                                        <div class="modal-footer justify-content-end">
                                                            <div class="form-group row">
                                                                <div class="offset-sm-2 col-sm-10">
                                                                    <button type="submit"
                                                                        class="btn btn-sm btn-danger">Hapus</button>
                                                                </div>
                                                            </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                    <!-- /.modal-content -->
                                                </div>
                                                <!-- /.modal-dialog -->
                                            </div>
                                        @endforeach
                                    @endisset
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Lifo</h3>
                            <div class="card-tools">
                                <div class="input-group input-group-sm" style="width: 150px;">
                                    <div class="input-group-append">
                                        <button type="button" data-toggle="modal" data-target="#tambah-penjualan"
                                            class="btn btn-primary">
                                            <i class="fas fa-plus"></i>
                                            Tambah Barang
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-nowrap">
                                <thead>
                                    <tr class="text-center">
                                        <th>NO</th>
                                        <th>Nama Barang</th>
                                        <th>Jumlah Terjual</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @isset($penjualans)
                                        @foreach ($penjualans as $penjualan)
                                            <tr class="text-center">
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $penjualan->nama_barang }}</td>
                                                <td>
                                                    {{ $penjualan->jumlah_dijual }}
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endisset
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- modal tambah barang --}}
    <div class="modal fade" id="tambah-barang">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Tambah Barang</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal" action="{{ route('barang.store') }}" method="post">
                        @csrf
                        <div class="form-group row">
                            <label for="namabarang" class="col-sm-2 col-form-label">Nama
                                Barang</label>
                            <div class="col-sm-10">
                                <input type="text" name="nama_barang" class="form-control" id="namabarang">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="stok" class="col-sm-2 col-form-label">Stok</label>
                            <div class="col-sm-10">
                                <input type="number" name="stok" class="form-control" id="stok">
                            </div>
                        </div>
                </div>
                <div class="modal-footer justify-content-end">
                    <div class="form-group row">
                        <div class="offset-sm-2 col-sm-10">
                            <button type="submit" class="btn btn-sm btn-primary">Tambah</button>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>


    {{-- modal tambah penjualan --}}
    <div class="modal fade" id="tambah-penjualan">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Tambah Barang</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal" action="{{ route('penjualan.lifo') }}" method="post">
                        @csrf
                        <div class="form-group row">
                            <label for="namabarang" class="col-sm-2 col-form-label">Nama Barang</label>
                            <div class="col-sm-10">
                                <select name="nama_barang" class="form-control" id="namabarang">
                                    @foreach ($barangs as $barang)
                                        <option value="{{ $barang->nama_barang }}">{{ Str::title($barang->nama_barang) }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="stok" class="col-sm-2 col-form-label">Stok</label>
                            <div class="col-sm-10">
                                <input type="number" min="1" name="barang_terjual" class="form-control"
                                    id="stok" placeholder="Stok Barang">
                            </div>
                        </div>
                </div>
                <div class="modal-footer justify-content-end">
                    <div class="form-group row">
                        <div class="offset-sm-2 col-sm-10">
                            <button type="submit" class="btn btn-sm btn-primary">Tambah</button>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
