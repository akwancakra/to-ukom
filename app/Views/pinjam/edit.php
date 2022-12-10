<?php $this->extend('layouts/template') ?>
<?php $this->section('content') ?>

<div class="container-fluid">
    <div class="container-fluid">
        <h1 class="mb-4 text-center font-weight-bold">Form Edit Data Pinjaman</h1>
        <div class="d-flex justify-content-center mb-2 align-items-center">
            <form action="/pinjambarang/update/<?= $datas['id_pinjam']; ?>" method="POST" class="w-75">
                <?= csrf_field(); ?>
                <div class="mb-2">
                    <label for="peminjam">ID Peminjam</label>
                    <input type="text" name="peminjam" class="form-control" value="<?= $datas['peminjam']; ?>">
                </div>
                <div class="mb-2">
                    <label for="tgl_pinjam">Tgl Pinjam</label>
                    <input type="date" id="tgl_pinjam" name="tgl_pinjam" class="form-control"
                        value="<?= $datas['tgl_pinjam']; ?>">
                </div>
                <div class="mb-2">
                    <label for="barang_pinjam">ID Barang</label>
                    <input type="text" id="barang_pinjam" name="barang_pinjam" class="form-control"
                        value="<?= $datas['barang_pinjam']; ?>">
                </div>
                <div class="mb-2">
                    <label for="jml_pinjam">Jumlah</label>
                    <input type="text" id="jml_pinjam" name="jml_pinjam" class="form-control"
                        value="<?= $datas['jml_pinjam']; ?>">
                </div>
                <div class="mb-2">
                    <label for="tgl_kembali">Tgl Kembali</label>
                    <input type="date" id="tgl_kembali" name="tgl_kembali" class="form-control"
                        value="<?= $datas['tgl_kembali']; ?>">
                </div>
                <div class="mb-2">
                    <label for="kondisi">Kondisi</label>
                    <select class="custom-select" name="kondisi" id="kondisi">
                        <option selected hidden disabled>Choose...</option>
                        <option value="Baik" <?= $datas['kondisi'] == 'Baik' ? 'selected' : ''; ?>>Baik</option>
                        <option value="Cacat" <?= $datas['kondisi'] == 'Cacat' ? 'selected' : ''; ?>>Cacat</option>
                        <option value="Rusak" <?= $datas['kondisi'] == 'Rusak' ? 'selected' : ''; ?>>Rusak</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary mt-3 btn-block">Save changes</button>
                <a href="/pinjam" class="btn btn-secondary mt-3 btn-block">Back</a>
            </form>
        </div>
        <!-- DataTales Example -->
    </div>
</div>
<?php $this->endSection() ?>