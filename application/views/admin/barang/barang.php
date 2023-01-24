<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">Barang</h1>

    <?= $this->session->flashdata('pesan') ?>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <a href="<?= base_url('admin/barang/tambah') ?>" class="btn btn-primary btn-sm"><i class="fas fa-plus"></i> Tambah</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr class="text-center">
                            <th>No</th>
                            <th>Nama Barang</th>
                            <th>Kategori</th>
                            <th>Harga</th>
                            <th>Stok</th>
                            <th>Supplier</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        foreach ($barang as $b) : ?>
                            <tr class="text-center">
                                <td><?= $no++ ?></td>
                                <td><?= $b->nama_barang ?></td>
                                <td><?= $b->nama_kategori ?></td>
                                <td><?= $b->harga ?></td>
                                <td><?= $b->stok ?></td>
                                <td><?= $b->nama_supplier ?></td>
                                <td>
                                <a href="<?= base_url('admin/barang/edit_data/' . $b->id_barang) ?>" class="btn btn-circle btn-warning"><i class="fas fa-edit"></i></a>
                                <a href="<?= base_url('admin/barang/delete_data/' . $b->id_barang) ?>" class="btn btn-circle btn-danger" onclick="return confirm('Apakah anda yakin mengahpus data ini?')"><i class="fas fa-trash"></i></a>
                                </td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>