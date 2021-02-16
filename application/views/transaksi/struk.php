<!DOCTYPE html>
<html>

<head>
    <style type="text/css">
        body {
            width: 10cm;
            height: auto;
            margin: auto;
            border-bottom: 1px solid #000;
            border-right: 1px solid #000;
            border-left: 1px solid #000;
            border-top: 1px solid #000;

        }

        p {
            line-height: 20px;
        }

        @page {
            size: landscape;
        }
    </style>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <title>Struct Pembayaran</title>
</head>

<body>
    <div class="container-fluid">
        <div class="row-sm">
            <center>
                <h3>Auliastore</h3>
                <p>Kp. Cilubang Sabit RT 05/RW 04 Kelurahan Balungbang Jaya <br><strong>Kabupaten Bogor</strong></p>
            </center>
        </div>
        <hr>
        <div class="row">
            <small>
                <table>
                    <tr>
                        <td>No transaksi</td>
                        <td>: </td>
                    </tr>

                    <tr>
                        <td>Nama kasir</td>
                        <td>: Muhamad Aliwafa</td>
                    </tr>


                    <tr>
                        <td>Customer</td>
                        <td>: - </td>
                    </tr>

                    <tr>
                        <td>Tanggal</td>
                        <td>: 31 Januari 2021, 19.00 WIB</td>
                    </tr>
                </table>
            </small>
        </div>
        <hr>
        <div class="row">
            <table>
                <thead>
                    <tr>
                        <th>Nama</th>
                        <th>Quantity</th>
                        <th>Harga</th>
                        <th>Sub total</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $diskon = 0; ?>
                    <?php foreach ($bayar as $byr) : ?>
                        <tr>
                            <td><?= $byr['nama_barang'] ?></td>
                            <td><?= $byr['quantity']; ?></td>
                            <td><?= $harga_barang = $byr['harga_barang'] - $byr['diskon']; ?></td>
                            <td>100000</td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <div class="row">
                <div class="col-4"></div>
                <div class="col-8">
                    <hr>
                    <div class="row">
                        <div class="col-sm-6">
                            Total
                        </div>
                        <div class="col-sm-6">
                            Rp. 300000
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            Diskon
                        </div>
                        <div class="col-sm-6">
                            Rp. 50000
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            Total bayar
                        </div>
                        <div class="col-sm-6">
                            <h5 id="tbayar"></h5>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-7">
                            Jumlah bayar
                        </div>
                        <div class="col-sm-5">
                            Rp. 50000
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-7">
                            Kembali
                        </div>
                        <div class="col-sm-5">
                            Rp. 25000
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <p><small>
                <center>***Terimakasih***</center>
            </small></p>
    </div>
    <br>
</body>
<!-- <script>
    window.print();
</script> -->
<script src="../asset/js/script.js"></script>

</html>