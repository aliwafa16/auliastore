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
});