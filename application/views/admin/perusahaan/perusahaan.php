<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">Perusahaan</h1>

    <?= $this->session->flashdata('pesan') ?>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <a href="<?= base_url('admin/perusahaan/tambah') ?>" class="btn btn-primary btn-sm"><i class="fas fa-plus"></i> Tambah</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr class="text-center">
                            <th>No</th>
                            <th>Nama Vendor</th>
                            <th>Alamat</th>
                            <th>No Telp</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        foreach ($perusahaan as $p) : ?>
                            <tr class="text-center">
                                <td><?= $no++ ?></td>
                                <td><?= $p->nama_perusahaan ?></td>
                                <td><?= $p->alamat ?></td>
                                <td><?= $p->no_telp ?></td>
                                <td>
                                    <a href="<?= base_url('admin/perusahaan/edit_data/' . $p->id_perusahaan) ?>" class="btn btn-circle btn-warning"><i class="fas fa-edit"></i></a>
                                    <a href="<?= base_url('admin/perusahaan/delete_data/' . $p->id_perusahaan) ?>" class="btn btn-circle btn-danger" onclick="return confirm('Apakah anda yakin menghapus data ini?')"><i class="fas fa-trash"></i></a>
                                </td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>