<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">Tambah Barang</h1>

    <!-- Basic Card Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <a href="<?= base_url('admin/barang') ?>" class="btn btn-info btn-sm"><i class="fas fa-arrow-circle-left"></i> Kembali</a>
        </div>
        <div class="card-body">
            <form action="<?= base_url('admin/barang/tambah_aksi') ?>" method="POST">
                <div class="form-group">
                    <label>Nama Barang</label>
                    <input type="text" name="nama_barang" class="form-control">
                    <?= form_error('nama_barang', '<div class="text-small text-danger">', '</div>') ?>
                </div>
                <div class="form-group">
                    <label>Kategori</label>
                    <select name="kategori" class="form-control">
                        <option value="">-- Pilih Kategori --</option>
                        <?php foreach ($kategori as $k) : ?>
                            <option value="<?= $k->nama_kategori ?>"><?= $k->nama_kategori ?></option>
                        <?php endforeach ?>
                    </select>
                    <?= form_error('id_kategori', '<div class="text-small text-danger">', '</div>') ?>
                </div>
                <div class="form-group">
                    <label>Harga Barang</label>
                    <input type="number" name="harga" class="form-control">
                    <?= form_error('harga', '<div class="text-small text-danger">', '</div>') ?>
                </div>
                <div class="form-group">
                    <label>Stok Barang</label>
                    <input type="number" name="stok" class="form-control">
                    <?= form_error('stok', '<div class="text-small text-danger">', '</div>') ?>
                </div>
                <div class="form-group">
                    <label>Supplier</label>
                    <select name="supplier" class="form-control">
                        <option value="">-- Pilih Supplier --</option>
                        <?php foreach ($supplier as $s) : ?>
                            <option value="<?= $s->nama_supplier ?>"><?= $s->nama_supplier ?></option>
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