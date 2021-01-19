<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">List Barang Masuk Auliastore</h1>

    <div class="row mb-4">
        <div class="col-md-4">
            <button type="button" class="btn btn-primary tombolTambahBarangMasuk" data-toggle="modal" data-target="#barangMasukModal"><i class="fas fa-plus"></i> Tambah Barang Masuk</button>
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
                        <th scope="col">Kode Barang Masuk</th>
                        <th scope="col">Kode Barang</th>
                        <th scope="col">Nama Barang</th>
                        <th scope="col">Kuantitas</th>
                        <th scope="col">Harga Beli</th>
                        <th scope="col">Tanggal Masuk</th>
                        <th scope="col">Tipe Barang</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($barang_masuk as $brg_msk) : ?>
                        <tr>
                            <th scope="row"><?= $i; ?></th>
                            <td><?= $brg_msk['kode_barang_masuk'] ?></td>
                            <td><?= $brg_msk['kode_barang'] ?></td>
                            <td><?= $brg_msk['nama_barang'] ?></td>
                            <td><?= $brg_msk['jumlah_barang_masuk'] ?></td>
                            <td><?= $brg_msk['harga_barang_masuk'] ?></td>
                            <td><?= $brg_msk['tanggal_barang_masuk'] ?></td>
                            <td><?= $brg_msk['tipe_barang'] ?></td>
                            <td>   
                                <a href="<?= base_url() ?>barang_masuk/edit/<?= $brg_msk['id_barang_masuk'] ?>" class="badge badge-success tombolEditBarangMasuk" data-toggle="modal" data-target="#barangMasukModal" data-id_barang_masuk="<?= $brg_msk['id_barang_masuk'] ?>"><i class="fas fa-pen-square"></i> Edit</a>
                                <a href="<?= base_url() ?>barang_masuk/hapus/<?= $brg_msk['id_barang_masuk'] ?>" class="badge badge-danger" onclick="return confirm('Yakin ingin menghapus data barang masuk ?')"> <i class="fas fa-trash-alt fa-sm"></i> Hapus</a>
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

<!-- Modal -->
<div class="modal fade" id="barangMasukModal" tabindex="-1" aria-labelledby="barangMasukModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="barangMasukModalLabel">Form Tambah Barang Masuk</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url() ?>barang_masuk/tambah" method="post">
                    <div class="form-group">
                        <label for="tanggal_barang_masuk">Tanggal Barang Masuk</label>
                        <input type="date" class="form-control" id="tanggal_barang_masuk" name="tanggal_barang_masuk">
                    </div>
                    <div class="form-group">
                        <label for="kode_barang_masuk">Kode Barang Masuk</label>
                        <input type="text" class="form-control" id="kode_barang_masuk" name="kode_barang_masuk">
                    </div>
                    <div class="form-group">
                        <label for="kode_barang">Kode Barang</label>
                        <select class="form-control" id="kode_barang" name="kode_barang">
                            <?php foreach ($kode_barang as $kd_brg) : ?>
                                <option value="<?= $kd_brg['id_barang'] ?>"><?= $kd_brg['kode_barang'] ?>-<?= $kd_brg['nama_barang'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="jumlah_barang_masuk">Jumlah Barang Masuk</label>
                        <input type="text" class="form-control" id="jumlah_barang_masuk" name="jumlah_barang_masuk">
                    </div>
                    <div class="form-group">
                        <label for="tipe_barang">Tipe Barang</label>
                        <select class="form-control" id="tipe_barang" name="tipe_barang">
                            <option value="1">Satuan</option>
                            <option value="2">Lusinan</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="harga_barang_masuk">Harga Beli (Rp)</label>
                        <input type="text" class="form-control" id="harga_barang_masuk" name="harga_barang_masuk">
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Tambah Barang Masuk</button>
            </div>
            </form>
        </div>
    </div>
</div>