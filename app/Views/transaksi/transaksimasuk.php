<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container-fluid">
    <h3 class="mb-5 text-gray-900">Transaksi Barang Masuk</h3>
</div>

<div class="container">
    <div class="row">
        <div class="col-10">
            <table class="ml-2 table">
                <thead>
                    <tr class="mb-4 text-gray-900">
                        <th scope="col">No.</th>
                        <th scope="col">Kode Obat</th>
                        <th scope="col">Nama Obat</th>
                        <th scope="col">Jumlah Obat</th>
                        <th scope="col">Waktu Transaksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($transaksibarang as $transaksi) : ?>
                        <tr>
                            <th scope="row"><?= $i++; ?></th>
                            <td><?= $transaksi['kode_obat']; ?></td>
                            <td><?= $transaksi['nama_obat']; ?></td>
                            <td><?= $transaksi['jumlah_obat']; ?></td>
                            <td><?= $transaksi['created_at']; ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>

</div>

<?= $this->endSection(); ?>