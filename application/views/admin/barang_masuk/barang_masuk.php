<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">Barang Masuk</h1>

    <?= $this->session->flashdata('pesan') ?>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <a href="<?= base_url('admin/barang_masuk/tambah') ?>" class="btn btn-primary btn-sm"><i class="fas fa-plus"></i> Tambah</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr class="text-center">
                            <th>No</th>
                            <th>Nama Barang</th>
                            <th>Tanggal Masuk</th>
                            <th>Stok Masuk</th>
                            <th>Total</th>
                            <th>Supplier</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        foreach ($barang_masuk as $b) : ?>
                            <tr class="text-center">
                                <td><?= $no++ ?></td>
                                <td><?= $b->nama_barang ?></td>
                                <td><?= $b->tanggal_masuk ?></td>
                                <td><?= $b->stok_masuk ?></td>
                                <td><?= $b->total ?></td>
                                <td><?= $b->nama_supplier ?></td>
                                <td>
                                    <a href="<?= base_url('admin/barang_masuk/edit_data/' . $b->id) ?>" class="btn btn-circle btn-warning"><i class="fas fa-edit"></i></a>
                                    <a href="<?= base_url('admin/barang_masuk/delete_data/' . $b->id) ?>" class="btn btn-circle btn-danger" onclick="return confirm('Apakah anda yakin mengahpus data ini?')"><i class="fas fa-trash"></i></a>
                                </td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>