$(function(){

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
                $('#stok_barang').val(data.stok_barang);
                $('#harga_barang').val(data.harga_barang);
            }
        });
    });
    
    
    $(document).ready(function(){
        $('.tableBarang').DataTable();
        
	});


});