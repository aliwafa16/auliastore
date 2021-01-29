<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">Form Transaksi Auliastore</h1>
    <form action="" method="post">
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <h6 class="card-header">
                        <strong>Tanggal</strong>
                    </h6>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="tanggal_transaksi">Tanggal transaksi</label>
                                    <input type="date" class="form-control" id="tanggal_transaksi" name="tanggal_transaksi">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="nama_pegawai">Pegawai</label>
                                    <input type="text" class="form-control" id="nama_pegawai" name="nama_pegawai" value="<?= $user['nama_user']; ?>">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="nama_pembeli">Pembeli</label>
                                    <input type="text" class="form-control" id="nama_pembeli" name="nama_pembeli">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <h6 class="card-header">
                        <strong>Barang</strong>
                    </h6>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="kode_barang">Kode Barang</label>
                                    <select class="form-control" id="kode_barang" name="kode_barang">
                                        <?php foreach ($kode_barang as $kd_brg) : ?>
                                            <option value="<?= $kd_brg['id_barang'] ?>"><?= $kd_brg['kode_barang'] ?>-<?= $kd_brg['nama_barang'] ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="jumlah_beli">Quantity</label>
                                    <input type="text" class="form-control" id="jumlah_beli" name="jumlah_beli">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <button class="btn btn-primary" type="submit" id="addBarang" name="addBarang"><i class="fas fa-shopping-cart"></i> Add</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-2">
                <div class="card">
                    <div class="card-body" style="width: auto" style="height: 100px;">
                        <h5 class="card-title"> <strong>Nomor Invoice</strong></h5>
                        <input type="text" id="nomor_transaksi" class="form-control-plaintext" name="nomor_transaksi" value="TRNSK25012021001" readonly>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <div class="row">
        <div class="col">
            <table class="table table-hover mt-3">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Tanggal</th>
                        <th scope="col">Kode barang</th>
                        <th scope="col">Nama barang</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Harga satuan</th>
                        <th scope="col">Diskon</th>
                        <th scope="col">Sub total</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">1</th>
                        <td>Mark</td>
                        <td>Otto</td>
                        <td>@mdo</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <div class="row">
        <div class="col-4">
            <div class="card">
                <h6 class="card-header">
                    <strong>Total dan diskon</strong>
                </h6>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="sub_total">Sub Total</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <input type="text" class="form-control" id="sub_total" name="sub_total" readonly>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="diskon">Diskon</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <input type="text" class="form-control" id="diskon" name="diskon">
                        </div>
                    </div>
                    <button class="btn btn-primary mb-3" type="submit"><i class="fas fa-tags"></i> Add Diskon</button>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="total_bayar">Total Bayar</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <input type="text" class="form-control" id="total_bayar" name="total_bayar" readonly>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-4">
            <div class="card">
                <h6 class="card-header">
                    <strong>Bayar</strong>
                </h6>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="jumlah_bayar">Jumlah bayar</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <input type="text" class="form-control" id="jumlah_bayar" name="jumlah_bayar">
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="nominal_total_bayar">Nominal yang harus dibayar</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <input type="text" class="form-control" id="nominal_total_bayar" name="nominal_total_bayar" readonly>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="uang_kembali">Kembali</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <input type="text" class="form-control" id="uang_kembali" name="uang_kembali">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="row">
                <div class="col">
                    <button type="submit" class="btn btn-warning btn-lg"> <i class="fas fa-money-bill-alt"></i> Beli</button>
                </div>
            </div>
        </div>
    </div>


</div>
</div>