<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">Profile</h1>

    <!-- Basic Card Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <img src="<?php  ?>">
        </div>
        <div class="card-body">
            <form action="<?= base_url('admin/barang_masuk/tambah_aksi') ?>" method="POST">
                <div class="form-group">
                    <label>Stok Masuk</label>
                    <input type="text" name="stok_masuk" class="form-control">
                    <?= form_error('stok_masuk', '<div class="text-small text-danger">', '</div>') ?>
                </div>

                <button type="submit" class="btn btn-primary btn-sm"><i class="fas fa-save"></i> Simpan</button>
                <button type="reset" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i> Reset</button>
            </form>
        </div>
    </div>
</div>