<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container-fluid">
    <div class="row">
        <div class="col">
            <h3 class="mb-4 text-gray-900">Pencatatan Stok Barang</h3>
            <a href="/tambahobat" class="ml-2 mb-2 btn btn-success">Tambah Obat</a>
            <?php if (session()->getFlashdata('pesan')) : ?>
                <div class="alert alert-success" role="alert">
                    <?= session()->getFlashdata('pesan'); ?>
                </div>
            <?php endif; ?>
            <table class="ml-2 table">
                <thead>
                    <tr class="mb-4 text-gray-900">
                        <th scope="col">No.</th>
                        <th scope="col">Kode Obat</th>
                        <th scope="col">Nama Obat</th>
                        <th scope="col">Stok Obat</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($stokbarang as $obat) : ?>
                        <tr>
                            <th scope="row"><?= $i++; ?></th>
                            <td><?= $obat['kode_obat']; ?></td>
                            <td><?= $obat['nama_obat']; ?></td>
                            <td><?= $obat['stok_obat']; ?></td>
                            <td>
                                <a class="btn btn-warning" href="/editobat/<?= $obat['slug']; ?>">Ubah</a>

                                <form action="/stokbarang/delete/<?= $obat['id']; ?>" method="post" class="d-inline">
                                    <?= csrf_field(); ?>
                                    <input type="hidden" name="_method" value="DELETE">
                                    <button type="submit" class="btn btn-danger" onclick="return confirm ('Hapus data ini?');">Hapus</button>
                                </form>

                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>