<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">Form Transaksi Auliastore</h1>
    <form action="<?= base_url() ?>form_transaksi/addSaleToDB" method="post">
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
                                    <input type="text" class="form-control" id="tanggal_transaksi" name="tanggal_transaksi" value="<?= $tanggal_now ?>">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="nama_pegawai">Pegawai</label>
                                    <input type="hidden" class="form-control" id="id_pegawai" name="id_pegawai" value="<?= $user['id_user']; ?>">
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
                    <?php $i = 1;
                    $sub_total = 0;
                    $total = 0;
                    $diskon = 0;
                    $quantity = 0;
                    $harga_satuan = 0; ?>
                    <?php foreach ($transaksi as $trn) : ?>
                        <tr>
                            <th scope="row"><?= $i; ?></th>
                            <td><?= $trn['tanggal'] ?></td>
                            <td><?= $trn['kode_barang'] ?></td>
                            <td><?= $trn['nama_barang'] ?></td>
                            <td><?= $quantity = $trn['quantity'] ?></td>
                            <td><?= $harga_satuan = $trn['harga_barang'] ?></td>
                            <td><?= $diskon = $trn['diskon'] ?></td>
                            <td><?= $sub_total = ($quantity * $harga_satuan) - $diskon ?></td>
                            <?php $total = $total + $sub_total; ?>
                            <td>
                                <a href="<?= base_url() ?>form_transaksi/hapus/<?= $trn['id_sale_transaksi'] ?>" class="btn btn-danger" onclick="return confirm('Hapus ?')"><i class="fas fa-trash-alt"></i> Hapus</a>
                                <a href="<?= base_url() ?>form_transaksi/edit/<?= $trn['id_sale_transaksi'] ?>" class="btn btn-success editSaleTransaksi" data-toggle="modal" data-target="#editSaleModal" data-id_sale_transaksi="<?= $trn['id_sale_transaksi'] ?>"><i class="fas fa-pen"></i> Edit</a>
                            </td>
                        </tr>
                        <?php $i++; ?>
                    <?php endforeach; ?>
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
                                <label for="total">Total</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <input type="text" class="form-control" id="total" name="total" readonly value="<?= $total; ?>">
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
                            <button class="btn btn-primary mb-2 mt-2 float-right addDiskon" type="submit" name="addDiskon" <i class="fas fa-tags"></i> Add Diskon</button>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="total_bayar">Total Bayar</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <input type="text" class="form-control" id="total_bayar" name="total_bayar" value="<?= $total; ?>" readonly>
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
                            <button class="btn btn-primary float-right mt-2 mb-2 addBayar" type="submit" name="addBayar" <i class="fas fa-tags"></i> Add Bayar</button>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="nominal_total_bayar">Nominal yang harus dibayar</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <input type="text" class="form-control" id="nominal_total_bayar" name="nominal_total_bayar" value="<?= $total; ?>" readonly>
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
                    <a href="<?= base_url() ?>form_transaksi/prosesTransaksi" type="submit" class="btn btn-warning btn-lg" id="beli" target="_blank"> <i class="fas fa-money-bill-alt"></i> Beli</a>
                    <a href="<?= base_url() ?>form_transaksi/hapusSaleTransaksi" class="btn btn-danger btn-lg" type="submit" onclick="return confirm('Hapus ?')"><i class="fas fa-times"></i> Reset</a>
                </div>
            </div>
        </div>
    </div>

    <!-- MODAL SALE -->
    <div class="modal fade" id="editSaleModal" tabindex="-1" aria-labelledby="editSaleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editSaleModalLabel">Edit data sale</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="<?= base_url() ?>form_transaksi/edit" method="post">
                        <div class="form-group">
                            <!-- HIDDEN DATA -->
                            <input type="hidden" id="id_sale_transaksi" name="id_sale_transaksi">
                            <input type="hidden" id="nomor_transaksi_modal" name="nomor_transaksi">
                            <input type="hidden" id="id_user_modal" name="id_user_modal">
                            <input type="hidden" id="id_pembeli_modal" name="id_pembeli_modal">
                            <input type="hidden" id="tanggal_modal" name="tanggal_modal">
                            <!-- END HIDDEN DATA -->
                            <label for="kode_barang_modal">Kode Barang</label>
                            <select class="form-control" id="kode_barang_modal" name="kode_barang_modal">
                                <?php foreach ($kode_barang as $kd_brg) : ?>
                                    <option value="<?= $kd_brg['id_barang'] ?>"><?= $kd_brg['kode_barang'] ?>-<?= $kd_brg['nama_barang'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="quantity_modal">Quantity</label>
                            <input type="text" class="form-control" id="quantity_modal" name="quantity_modal">
                        </div>
                        <div class="form-group">
                            <label for="diskon_modal">Diskon</label>
                            <input type="text" class="form-control" id="diskon_modal" name="diskon_modal">
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
                </form>
            </div>
        </div>
    </div>


</div>
</div>