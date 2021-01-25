<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">Form Transaksi Auliastore</h1>
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <h6 class="card-header">
                    <strong>Tanggal</strong>
                </h6>
                <div class="card-body">
                    <form action="">
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
                                    <input type="text" class="form-control" id="nama_pegawai" name="nama_pegawai">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="nama_pembeli">Pembeli</label>
                                    <input type="text" class="form-control" id="nama_pembeli" name="nama_pembeli">
                                </div>
                            </div>
                        </div>
                    </form>
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
                                <label for="kode_barang">Barang</label>
                                <input type="text" class="form-control" id="kode_barang" name="kode_barang">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="kode_barang">Quantity</label>
                                <input type="text" class="form-control" id="kode_barang" name="kode_barang">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <button class="btn btn-primary" type="submit"><i class="fas fa-shopping-cart"></i> Add</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-2">
            <div class="card">
                <div class="card-body" style="width: auto" style="height: 100px;">
                    <h5 class="card-title"> <strong>Nomor Invoice</strong></h5>
                    <h5>TRNSK25012021001</h5>
                </div>
            </div>
        </div>
    </div>

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
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">1</th>
                        <td>Mark</td>
                        <td>Otto</td>
                        <td>@mdo</td>
                    </tr>
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
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>