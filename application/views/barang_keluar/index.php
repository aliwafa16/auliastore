<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">List Barang Keluar Auliastore</h1>
    <div class="row mb-4">
        <div class="col-md-4">
            <button type="button" class="btn btn-primary tombolTambahBarangMasuk" data-toggle="modal" data-target="#barangMasukModal"><i class="fas fa-plus"></i> Tambah Barang Masuk</button>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <?php if ($this->session->flashdata('flashdata')) : ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong><?= $this->session->flashdata('flashdata') ?></strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <?php endif; ?>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <table class="table table-hover tableBarang">
                <thead class="thead-light">
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Kode Barang Keluar</th>
                        <th scope="col">Jumlah Barang Keluar</th>
                        <th scope="col">Tanggal</th>
                        <th scope="col">Keterangan</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($barang_keluar as $brg_klr) : ?>
                        <tr>
                            <th scope="row"><?= $i; ?></th>
                            <td><?= $brg_klr['kode_barang_keluar'] ?></td>
                            <td><?= $brg_klr['jumlah_barang_keluar'] ?></td>
                            <td><?= $brg_klr['tanggal_barang_keluar'] ?></td>
                            <td><?= $brg_klr['keterangan'] ?></td>
                            <td>
                                <a href="<?= base_url() ?>barang_masuk/edit/<?= $brg_msk['id_barang_masuk'] ?>" class="badge badge-success tombolEditBarangMasuk" data-toggle="modal" data-target="#barangMasukModal" data-id_barang_masuk="<?= $brg_msk['id_barang_masuk'] ?>"><i class="fas fa-pen-square"></i> Edit</a>
                                <a href="<?= base_url() ?>barang_masuk/hapus/<?= $brg_msk['id_barang_masuk'] ?>/<?= $brg_msk['id_barang'] ?>" class="badge badge-danger" onclick="return confirm('Yakin ingin menghapus data barang masuk ?')"> <i class="fas fa-trash-alt fa-sm"></i> Hapus</a>
                            </td>
                        </tr>
                        <?php $i++; ?>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
</div>

</div>
</div>