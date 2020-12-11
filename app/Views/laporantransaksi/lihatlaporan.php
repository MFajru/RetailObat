<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container-fluid">
    <h3 class="mb-5 text-gray-900">Laporan Transaksi</h3>
</div>

<div class="container">
    <div class="row">
        <div class="col-10">
            <div class="row">
                <div class="col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title text-gray-900">Jumlah Transaksi Barang Masuk</h5>
                            <?php $totalmasuk = 0;
                            foreach ($laporanmasuk as $masuk) :
                                $totalmasuk += $masuk['jumlah_obat'] ?>
                            <?php endforeach; ?>
                            <p class="card-text"><?= $totalmasuk; ?> Unit Barang</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title text-gray-900">Jumlah Transaksi Barang Keluar</h5>
                            <?php $totalkeluar = 0;
                            foreach ($laporankeluar as $keluar) :
                                $totalkeluar += $keluar['jumlah_obat'] ?>
                            <?php endforeach; ?>
                            <p class="card-text"><?= $totalkeluar; ?> Unit Barang</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

<?= $this->endSection(); ?>