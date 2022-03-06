$(document).ready(function(){
    $("#merek-baru").hide();
    function switcher(patokan,sudahada,baru,selected){
    $(baru).hide();
    $(patokan).change(function(){
        if($(this).val() == "sudah ada"){
            $(sudahada).show();
            $(baru).hide();
            $(sudahada).addClass(selected);
            $(baru).removeClass(selected);
        }else{
            $(baru).show();
            $(sudahada).hide();
            $(sudahada).removeClass(selected);
            $(baru).addClass(selected);
        }
    });
}

    switcher("#merek-opsi","#merek-produk","#merek-baru","merek-selected");
    switcher("#tipe-opsi","#tipe-produk","#tipe-baru","tipe-selected");
    switcher("#tipekode-opsi","#tipekode-produk","#tipekode-baru","kodetipe-selected");
});