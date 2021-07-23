$(function(){
    $('#dropdown-kategori-berita li a').on("click", function(){
        $('#btnKategori').html($(this).html());
        $('#namaKategori').val($(this).html());
    });
})