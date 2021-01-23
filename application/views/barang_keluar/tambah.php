<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800 text-center">Form Tambah Barang Keluar</h1>

    <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-4">
            <form action="<?= base_url() ?>barang_keluar/tambah" method="post">
                <div class="form-group">
                    <label for="tanggal_barang_keluar">Tanggal Barang Keluar</label>
                    <input type="date" class="form-control" id="tanggal_barang_keluar" name="tanggal_barang_keluar">
                    <small class="form-text text-danger"><?= $this->form_validation->error('tanggal_barang_keluar'); ?></small>
                </div>
                <div class="form-group">
                    <label for="kode_barang_keluar">Kode Barang Keluar</label>
                    <input type="text" class="form-control" id="kode_barang_keluar" name="kode_barang_keluar">
                    <small class="form-text text-danger"><?= $this->form_validation->error('kode_barang_keluar'); ?></small>
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
                    <label for="jumlah_barang_keluar">Jumlah</label>
                    <input type="text" class="form-control" id="jumlah_barang_keluar" name="jumlah_barang_keluar">
                    <small class="form-text text-danger"><?= $this->form_validation->error('jumlah_barang_keluar'); ?></small>
                </div>
                <label for="keterangan">Keterangan</label><br>

                <small class="form-text text-danger"><?= $this->form_validation->error('keterangan'); ?></small>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="Rusak" id="keterangan" name="keterangan">
                    <label class="form-check-label">Rusak</label>
                </div>

                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="Hilang" id="keterangan" name="keterangan">
                    <label class="form-check-label">Hilang</label>
                </div>


                <button type="submit" class="btn btn-primary float-right">Tambah</button>
            </form>
        </div>
    </div>
</div>
</div>