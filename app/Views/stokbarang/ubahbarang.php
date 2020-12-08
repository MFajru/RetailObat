<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container-fluid">
    <h3 class="mb-5 text-gray-900">Ubah Data Obat</h3>
</div>

<div class="container">
    <div class="row">
        <div class="col-10">
            <form action="/stokbarang/update/<?= $stokbarang['id']; ?>" method="post">
                <?= csrf_field(); ?>
                <input type="hidden" name="slug" value="<?= $stokbarang['slug']; ?>">
                <div class="form-group row">
                    <label for="kode_obat" class="col-sm-2 col-form-label">Kode Obat</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control <?= ($validation->hasError('kode_obat')) ? 'is-invalid' : ''; ?>" id="kode_obat" name="kode_obat" value="<?= (old('kode_obat')) ? old('kode_obat') : $stokbarang['kode_obat']; ?>" autofocus>
                        <div class="invalid-feedback">
                            <?= $validation->getError('kode_obat'); ?>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="nama_obat" class="col-sm-2 col-form-label">Nama Obat</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control <?= ($validation->hasError('nama_obat')) ? 'is-invalid' : ''; ?>" id="nama_obat" name="nama_obat" value="<?= (old('nama_obat')) ? old('nama_obat') : $stokbarang['nama_obat']; ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('nama_obat'); ?>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="stok_obat" class="col-sm-2 col-form-label">Stok Obat</label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control <?= ($validation->hasError('stok_obat')) ? 'is-invalid' : ''; ?>" id="stok_obat" name="stok_obat" value="<?= (old('stok_obat')) ? old('stok_obat') : $stokbarang['stok_obat']; ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('stok_obat'); ?>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-10">
                        <button type="submit" class="btn btn-success">Ubah Data</button>
                        <a href="/pencatatan_stokbarang" class="btn btn-danger">Batal</a>
                    </div>
                </div>
            </form>
        </div>
    </div>

</div>

<?= $this->endSection(); ?>