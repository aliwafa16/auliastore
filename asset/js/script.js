
    $('.tombolTambahMenu').on('click', function(){
        $('#menuModalLabel').html('Form Tambah Menu');
        $('.modal-footer button[type=submit]').html('Tambah menu');
        $('.modal-body form').attr('action','http://localhost/auliastore/menu/tambahMenu');
        $('#id_menu').val('');
        $('#nama_menu').val('');

    });


    $('.tombolEditMenu').on('click', function(){
        $('#menuModalLabel').html('Form Edit Menu');
        $('.modal-footer button[type=submit]').html('Edit menu');
        $('.modal-body form').attr('action','http://localhost/auliastore/menu/edit');
        const id_menu = $(this).data('id_menu');

        $.ajax({
            url:'http://localhost/auliastore/menu/getEditMenu',
            data: {id : id_menu},
            method : 'post',
            dataType : 'json',
            success : function(data){
                $('#id_menu').val(data.id_menu);
                $('#nama_menu').val(data.nama_menu);
            }
        });
    });


    $('.tombolTambahBarang').on('click',function(){
        $('#barangModalLabel').html('Form Tambah Barang');
        $('.modal-footer button[type=submit]').html('Tambah Data Barang');
        $('.modal-body form').attr('action','http://localhost/auliastore/list_barang/tambah');
        $.ajax({
            url : 'http://localhost/auliastore/list_barang/getKodeBarang',
            dataType : 'json',
            success : function(data){
                $('#kode_barang').val('AUL'+data.kode_barang);
                $('#nama_barang').val('');
                $('#stok_barang').val('');
                $('#harga_barang').val('');
            }
        });

        
    });

    $('.tombolEditBarang').on('click',function(){
        $('#barangModalLabel').html('Form Edit Barang');
        $('.modal-footer button[type=submit]').html('Edit Data Barang');
        $('.modal-body form').attr('action','http://localhost/auliastore/list_barang/edit');
        const id_barang = $(this).data('id_barang');

        $.ajax({
            url : 'http://localhost/auliastore/list_barang/getEditBarang',
            data :{id_barang : id_barang },
            method : 'post',
            dataType : 'json',
            success : function(data){
                $('#id_barang').val(data.id_barang);
                $('#kode_barang').val(data.kode_barang);
                $('#nama_barang').val(data.nama_barang);
                $('#harga_barang').val(data.harga_barang);
            }
        });
    });


    $(document).ready(function() {
        $('.tableBarang').DataTable({
            "language": {
                "zeroRecords": "Data tidak ditemukan",
                "info": "Halaman _PAGE_ dari _PAGES_",
                "infoEmpty" : "Data tidak tersedia",
                "infoFiltered" : "(hasil pencarian dari _MAX_ data)",
                "scrollX": true
            }
        });

    });

    $('.tombolTambahBarangMasuk').on('click', function(){
        $('#barangMasukModalLabel').html('Form Tambah Barang Masuk');
        $('.modal-footer button[type=submit]').html('Tambah Barang Masuk');
        $('.modal-body form').attr('action','http://localhost/auliastore/barang_masuk/tambah');
        $.ajax({
            url : 'http://localhost/auliastore/barang_masuk/getTanggalBarangMasuk',
            dataType : 'json',
            success : function(data){
                $('#tanggal_barang_masuk').val(data.tanggal_barang_masuk);
                $('#kode_barang_masuk').val('');
                $('#kode_barang').val('');
                $('#jumlah_barang_masuk').val('');
                $('#tipe_barang').val('');
                $('#harga_barang_masuk').val('');

                // console.log(data);
            }
        });
    
    });

    $('.tombolEditBarangMasuk').on('click',function(){
        $('#barangMasukModalLabel').html('Form Edit Barang Masuk');
        $('.modal-footer button[type=submit]').html('Edit Barang Masuk');
        $('.modal-body form').attr('action','http://localhost/auliastore/barang_masuk/edit');
        const id_barang_masuk = $(this).data('id_barang_masuk');

        $.ajax({
            url : 'http://localhost/auliastore/barang_masuk/getEditBarangMasuk',
            data : {id_barang_masuk : id_barang_masuk},
            method : 'post',
            dataType : 'json',
            success : function(data){
                $('#id_barang_masuk').val(data.id_barang_masuk);
                $('#tanggal_barang_masuk').val(data.tanggal_barang_masuk);
                $('#kode_barang_masuk').val(data.kode_barang_masuk);
                $('#kode_barang').val(data.id_barang);
                $('#jumlah_barang_masuk').val(data.jumlah_barang_masuk);
                $('#tipe_barang').val(data.id_tipe_barang);
                $('#harga_barang_masuk').val(data.harga_barang_masuk);
            }
        });
    });

    $('.addDiskon').on('click',function(){
        const diskon = $('#diskon').val();
        const total = $('#total').val();
        const total_bayar = parseInt(total)-parseInt(diskon);

        $('#total_bayar').val(total_bayar);
        $('#nominal_total_bayar').val(total_bayar);
    });

    $('.addBayar').on('click',function(){
        const jumlah_bayar = $('#jumlah_bayar').val();
        const nominal_bayar = $('#nominal_total_bayar').val();
        const total_bayar = parseInt(jumlah_bayar)-parseInt(nominal_bayar);

        $('#uang_kembali').val(total_bayar);
    });

    $('.editSaleTransaksi').on('click', function(){
        const id = $(this).data('id_sale_transaksi');

        $.ajax({
            url : 'http://localhost/auliastore/form_transaksi/getEditSaleTransaksi',
            data : {id_sale_transaksi : id},
            method : 'post',
            dataType :'json',
            success: function(data){
                $('#id_sale_transaksi').val(data.id_sale_transaksi);
                $('#nomor_transaksi_modal').val(data.nomor_transaksi);
                $('#id_user_modal').val(data.id_user);
                $('#id_pembeli_modal').val(data.id_pembeli);
                $('#tanggal_modal').val(data.tanggal);
                $('#kode_barang_modal').val(data.id_barang);
                $('#quantity_modal').val(data.quantity);
                $('#diskon_modal').val(data.diskon);
            }
        });
    });


    $('#beli').on('click', function(){
        let total_bayar = $('#nominal_total_bayar').val();

        console.log(total_bayar);


    });