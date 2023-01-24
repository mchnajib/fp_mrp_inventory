<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">Tambah Supplier</h1>

    <!-- Basic Card Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <a href="<?= base_url('admin/supplier') ?>" class="btn btn-info btn-sm"><i class="fas fa-arrow-circle-left"></i> Kembali</a>
        </div>
        <div class="card-body">
            <form action="<?= base_url('admin/supplier/tambah_aksi') ?>" method="POST">
                <div class="form-group">
                    <label>Nama Supplier</label>
                    <input type="text" name="nama_supplier" class="form-control">
                    <?= form_error('nama_supplier', '<div class="text-small text-danger">', '</div>') ?>
                </div>
                <div class="form-group">
                    <label>Alamat</label>
                    <input type="text" name="alamat" class="form-control">
                    <?= form_error('alamat', '<div class="text-small text-danger">', '</div>') ?>
                </div>
                <div class="form-group">
                    <label>No Telp</label>
                    <input type="text" name="no_telp" class="form-control">
                    <?= form_error('no_telp', '<div class="text-small text-danger">', '</div>') ?>
                </div>

                <button type="submit" class="btn btn-primary btn-sm"><i class="fas fa-save"></i> Simpan</button>
                <button type="reset" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i> Reset</button>
            </form>
        </div>
    </div>

</div>