<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container">
    <div class="row">
        <div class="col">
            <h3 class="text-center text-gray-900">Laporan Bulanan Penjualan
                <a onclick="window.print()" hreft="/tambahbarang" class="ml-1 mb-6 btn btn-success">Print</a>
            </h3>
            <br>
            <br>
            <p class="text-center mt-2">Laporan Bulanan Toko Perusahaan ABC Pada Bulan November Dengan Buka Sebanyak 30 Hari Tanpa Tutup</p>


            <div class="container-fluid mt-3">
                <!-- Content Row -->
                <div class="row text-center">
                    <!-- Pemasukkan -->
                    <div class="col-xl-4 col-md-3 mb-4">
                        <div class="card border-left-primary shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Barang Masuk</div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800">190</div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Pengeluaran -->
                    <div class="col-xl-4 col-md-3 mb-4">
                        <div class="card border-left-success shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Barang Keluar</div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800">30</div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <table class="ml-2 table">
                <thead>
                    <tr class="mb-4 text-gray-900">
                        <th scope="col">No.</th>
                        <th scope="col">Kode Obat</th>
                        <th scope="col">Nama Obat</th>
                        <th scope="col">Stok Obat</th>
                        <th scope="col">Timestamp</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($laporan as $obat) : ?>
                        <tr>
                            <th scope="row"><?= $i++; ?></th>
                            <td><?= $obat['kode_obat']; ?></td>
                            <td><?= $obat['nama_obat']; ?></td>
                            <td><?= $obat['stok_obat']; ?></td>
                            <td><?= $obat['updated_at']; ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>

    <?= $this->endSection(); ?>