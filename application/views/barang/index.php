<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">List Barang Auliastore</h1>
    <div class="row mb-4">
        <div class="col-md-4">
            <button type="button" class="btn btn-primary fas-fa-fw-fas-plus tombolTambahBarang" data-toggle="modal" data-target="#barangModal"><i class="fas fa-plus"></i> Tambah List Barang</button>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
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
                        <th scope="col">Kode Barang</th>
                        <th scope="col">Nama Barang</th>
                        <th scope="col">Stok Barang</th>
                        <th scope="col">Harga Barang</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($barang as $brg) : ?>
                        <tr>
                            <th scope="row"><?= $i; ?></th>
                            <td><?= $brg['kode_barang'] ?></td>
                            <td><?= $brg['nama_barang'] ?></td>
                            <td><?= $brg['stok_barang'] ?></td>
                            <td><?= $brg['harga_barang'] ?></td>
                            <td>
                                <a href="<?= base_url() ?>list_barang/edit/<?= $brg['id_barang'] ?>" class="badge badge-success tombolEditBarang" data-toggle="modal" data-target="#barangModal" data-id_barang="<?= $brg['id_barang'] ?>"><i class="fas fa-pen-square"></i> Edit</a>
                                <a href="<?= base_url() ?>list_barang/hapus/<?= $brg['id_barang'] ?>" class="badge badge-danger" onclick="return confirm('Yakin ingin menghapus data barang ?')"> <i class="fas fa-trash-alt fa-sm"></i> Hapus</a>
                            </td>
                        </tr>
                        <?php $i++; ?>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>

    <?php echo $this->pagination->create_links(); ?>

</div>
</div>
<!-- Modal -->
<div class="modal fade" id="barangModal" tabindex="-1" aria-labelledby="barangModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="barangModalLabel">Form tambah barang</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url() ?>list_barang/tambah" method="POST">
                    <input type="hidden" id="id_barang" name="id_barang">
                    <div class="form-group">
                        <label for="kode_barang">Kode Barang</label>
                        <input type="text" class="form-control" id="kode_barang" aria-describedby="emailHelp" name="kode_barang">
                    </div>

                    <div class="form-group">
                        <label for="nama_barang">Nama Barang</label>
                        <input type="text" class="form-control" id="nama_barang" aria-describedby="emailHelp" name="nama_barang">
                    </div>

                    <div class="form-group">
                        <label for="stok_barang">Stok Barang</label>
                        <input type="text" class="form-control" id="stok_barang" aria-describedby="emailHelp" name="stok_barang">
                    </div>

                    <div class="form-group">
                        <label for="harga_barang">Harga Barang (Rp)</label>
                        <input type="text" class="form-control" id="harga_barang" aria-describedby="emailHelp" name="harga_barang">
                    </div>


                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Tambah Data Barang</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>