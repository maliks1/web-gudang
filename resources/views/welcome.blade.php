<!DOCTYPE html>
<html lang="en">
    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Gudang - Laravel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css" rel="stylesheet">
    </head>
<body class="bg-light">
    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-md-8 text-center">
                <div class="card shadow">
                    <div class="card-body p-5">
                        <i class="bi bi-box-seam display-1 text-primary mb-4"></i>
                        <h1 class="display-4 mb-4">Sistem Gudang</h1>
                        <p class="lead mb-4">Selamat datang di sistem manajemen gudang yang dibangun dengan Laravel dan Bootstrap.</p>
                        
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <div class="card h-100">
                                    <div class="card-body">
                                        <i class="bi bi-person-plus display-6 text-success mb-3"></i>
                                        <h5>Register</h5>
                                        <p class="text-muted">Daftar akun baru untuk mengakses sistem</p>
                                        <a href="{{ route('register') }}" class="btn btn-success">Register</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <div class="card h-100">
                                    <div class="card-body">
                                        <i class="bi bi-box-arrow-in-right display-6 text-primary mb-3"></i>
                                        <h5>Login</h5>
                                        <p class="text-muted">Masuk ke sistem dengan akun yang sudah ada</p>
                                        <a href="{{ route('login') }}" class="btn btn-primary">Login</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="mt-4">
                            <h5>Fitur Utama:</h5>
                            <div class="row text-start">
                                <div class="col-md-6">
                                    <ul class="list-unstyled">
                                        <li><i class="bi bi-check-circle text-success"></i> Manajemen Produk</li>
                                        <li><i class="bi bi-check-circle text-success"></i> Tracking Stok</li>
                                        <li><i class="bi bi-check-circle text-success"></i> Riwayat Transaksi</li>
                    </ul>
                                </div>
                                <div class="col-md-6">
                                    <ul class="list-unstyled">
                                        <li><i class="bi bi-check-circle text-success"></i> Dashboard Real-time</li>
                                        <li><i class="bi bi-check-circle text-success"></i> Notifikasi Stok Menipis</li>
                                        <li><i class="bi bi-check-circle text-success"></i> Sistem Autentikasi</li>
                    </ul>
                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    </body>
</html>
