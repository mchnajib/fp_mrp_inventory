<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">Edit Barang Masuk</h1>

    <!-- Basic Card Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <a href="<?= base_url('admin/barang_masuk') ?>" class="btn btn-info btn-sm"><i class="fas fa-arrow-circle-left"></i> Kembali</a>
        </div>
        <div class="card-body">
            <form action="<?= base_url('admin/barang_masuk/tambah_aksi') ?>" method="POST">
                <div class="form-group">
                    <label>Nama Barang</label>
                    <select name="id_barang" class="form-control">
                        <option value="">-- Pilih Nama Barang --</option>
                        <?php foreach ($barang as $b) : ?>
                            <option value="<?= $b->id_barang ?>"><?= $b->nama_barang ?></option>
                        <?php endforeach ?>
                    </select>
                    <?= form_error('id_barang', '<div class="text-small text-danger">', '</div>') ?>
                </div>
                <div class="form-group">
                    <label>Tanggal Masuk</label>
                    <?php
                    $tz = 'Asia/Jakarta';
                    $dt = new DateTime("now", new DateTimeZone($tz));
                    $timestamp = $dt->format('Y-m-d G:i:s');
                    ?>
                    <input type="datetime" value="<?php echo date($timestamp); ?>" name="tanggal_masuk" class="form-control">
                    <?= form_error('tanggal_masuk', '<div class="text-small text-danger">', '</div>') ?>
                </div>
                <div class="form-group">
                    <label>Stok Masuk</label>
                    <input type="number" name="stok_masuk" class="form-control">
                    <?= form_error('stok_masuk', '<div class="text-small text-danger">', '</div>') ?>
                </div>
                <div class="form-group">
                    <label>Total</label>
                    <input type="number" name="total" class="form-control">
                    <?= form_error('total', '<div class="text-small text-danger">', '</div>') ?>
                </div>
                <div class="form-group">
                    <label>Supplier</label>
                    <select name="id_supplier" class="form-control">
                        <option value="">-- Pilih Supplier --</option>
                        <?php foreach ($supplier as $s) : ?>
                            <option value="<?= $s->id_supplier ?>"><?= $s->nama_supplier ?></option>
                        <?php endforeach ?>
                    </select>
                    <?= form_error('id_supplier', '<div class="text-small text-danger">', '</div>') ?>
                </div>

                <button type="submit" class="btn btn-primary btn-sm"><i class="fas fa-save"></i> Simpan</button>
                <button type="reset" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i> Reset</button>
            </form>
        </div>
    </div>
</div>