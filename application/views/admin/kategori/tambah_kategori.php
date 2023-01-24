<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">Tambah Kategori</h1>

    <!-- Basic Card Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <a href="<?= base_url('admin/kategori') ?>" class="btn btn-info btn-sm"><i class="fas fa-arrow-circle-left"></i> Kembali</a>
        </div>
        <div class="card-body">
            <form action="<?= base_url('admin/kategori/tambah_aksi') ?>" method="POST">
                <div class="form-group">
                    <label>Nama Kategori</label>
                    <input type="text" name="nama_kategori" class="form-control">
                    <?= form_error('nama_kategori', '<div class="text-small text-danger">', '</div>') ?>
                </div>

                <button type="submit" class="btn btn-primary btn-sm"><i class="fas fa-save"></i> Simpan</button>
                <button type="reset" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i> Reset</button>
            </form>
        </div>
    </div>

</div>