@extends('layouts.app')

@section('title', 'Dashboard - Sistem Gudang')

@section('content')
<div class="row mb-4">
    <div class="col-md-3 mb-3">
        <div class="card text-bg-primary h-100">
            <div class="card-body d-flex flex-column align-items-center justify-content-center">
                <div class="mb-2"><i class="bi bi-box h2"></i></div>
                <h5 class="card-title">Jumlah Jenis Barang</h5>
                <h2 class="fw-bold mb-0">{{ $totalProducts }}</h2>
            </div>
        </div>
    </div>
    <div class="col-md-3 mb-3">
        <div class="card text-bg-success h-100">
            <div class="card-body d-flex flex-column align-items-center justify-content-center">
                <div class="mb-2"><i class="bi bi-archive h2"></i></div>
                <h5 class="card-title">Total Stok Keseluruhan</h5>
                <h2 class="fw-bold mb-0">{{ $totalStock }}</h2>
            </div>
        </div>
    </div>
    <div class="col-md-3 mb-3">
        <div class="card text-bg-info h-100">
            <div class="card-body d-flex flex-column align-items-center justify-content-center">
                <div class="mb-2"><i class="bi bi-currency-dollar h2"></i></div>
                <h5 class="card-title">Total Nilai Stok</h5>
                <h2 class="fw-bold mb-0">Rp {{ number_format($totalStockValue, 0, ',', '.') }}</h2>
            </div>
        </div>
    </div>
    <div class="col-md-6 mb-3">
        <div class="card text-bg-warning h-100">
            <div class="card-body">
                <div class="d-flex align-items-center mb-2">
                    <i class="bi bi-exclamation-triangle h2 me-2"></i>
                    <h5 class="card-title mb-0">Barang Akan Habis</h5>
                </div>
                @if($lowStockProducts->count() > 0)
                    <div class="table-responsive">
                        <table class="table table-sm table-bordered mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th>Kode</th>
                                    <th>Nama</th>
                                    <th>Stok</th>
                                    <th>Minimum</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($lowStockProducts as $product)
                                <tr class="@if($product->stok_saat_ini == 0) table-danger @elseif($product->stok_saat_ini < 5) table-danger @else table-warning @endif">
                                    <td>{{ $product->kode_barang }}</td>
                                    <td>{{ $product->nama_barang }}</td>
                                    <td><span class="badge bg-@if($product->stok_saat_ini == 0)danger@elseif($product->stok_saat_ini < 5)danger@else warning text-dark @endif">{{ $product->stok_saat_ini }}</span></td>
                                    <td>{{ $product->stok_minimum }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <div class="text-muted">Semua stok aman.</div>
                @endif
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-6 mb-4">
        <div class="card h-100">
            <div class="card-header bg-info text-white">
                <i class="bi bi-clock-history"></i> Aktivitas Terakhir
            </div>
            <div class="card-body">
                @if($recentTransactions->count() > 0)
                    <div class="table-responsive">
                        <table class="table table-sm mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th>Tanggal</th>
                                    <th>Barang</th>
                                    <th>Tipe</th>
                                    <th>Jumlah</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($recentTransactions as $trx)
                                <tr>
                                    <td>{{ $trx->created_at->format('d/m/Y H:i') }}</td>
                                    <td>{{ $trx->product->nama_barang ?? '-' }}</td>
                                    <td>
                                        @if($trx->tipe_transaksi == 'masuk')
                                            <span class="badge bg-success">Masuk</span>
                                        @else
                                            <span class="badge bg-danger">Keluar</span>
                                        @endif
                                    </td>
                                    <td>{{ $trx->jumlah }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <div class="text-muted">Belum ada transaksi.</div>
                @endif
            </div>
        </div>
    </div>
    <div class="col-md-6 mb-4">
        <div class="card h-100">
            <div class="card-header bg-light">
                <i class="bi bi-info-circle"></i> Info
            </div>
            <div class="card-body">
                <ul class="mb-0">
                    <li>Gunakan menu <b>Barang Masuk</b> untuk menambah stok.</li>
                    <li>Gunakan menu <b>Barang Keluar</b> untuk mengurangi stok.</li>
                    <li>Periksa <b>Barang Akan Habis</b> untuk mencegah kehabisan stok.</li>
                    <li>Semua aktivitas tercatat di <b>Riwayat Transaksi</b>.</li>
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection