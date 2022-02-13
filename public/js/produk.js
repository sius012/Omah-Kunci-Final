$(document).ready(function(){   
    $("button[data-target='#modalproduk']").click(function(e){
        $("#submitterproduk").attr('action', '/tambahbarang');
    });
    function getProdukInfo(id_produk){
        var produkInfo;
        $.ajax({
            headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
             }, 
            data:{
                kode_produk: id_produk
            },
            type: "POST",
            dataType: "JSON",
            url: "/getprodukinfo", 
            success: function(data){
                produkInfo = data;
                $("#kode-produk").val(data["kode_produk"]);
                $("#nama-produk").val(data["nama_produk"]);
                $("#merek-produk").val(data["merk"]);
                $("#kategori-produk").val(data["id_kategori"]);
                $("#harga-produk").val(data["harga"]);
                $("#satuan-produk").val(data["stn"]);
                
            },
            error: function(response,){
                alert(response.text);
                produkInfo = "notshow";
            }
        });
        
        
    }
    function loadProduk(){
        $.ajax({
            headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
             }, 
            
            type: "POST",
            dataType: "JSON",
            url: "/loadproduk", 
            success: function(data){
                var row = data.map(function(datos){
                    return "<tr>"+"<td>"+datos["kode_produk"]+"</td>"+"<td>"+datos["nama_produk"]+"</td>"+"<td>"+datos["merk"]+"</td>"+"<td>"+datos["kategori"]+"</td>"+"<td>"+datos["harga"]+"<td>"+datos['stn']+"</td>"+"<td align='center'><button class='btn btn-info mr-3 editbarang'><a href='' kode-produk='"+datos["kode_produk"]+"'><i class='fa fa-edit'></i></a></button><button class='btn btn-danger hapusbarang'><a href='' kode-produk = '"+datos["kode_produk"]+"'><i class='fa fa-trash'></i></a></button>"+"</tr>";
                });
                $("#produkfiller").html(row);
            },
            error: function(response,){
                alert("ada yang salah");
            }
        });
    }

    
    $("#submitterproduk").submit(function(e){
        
        e.preventDefault();
        let url = $(this).attr("action");

        var dataform = {
            kode_produk : $("#kode-produk").val(),
            nama_produk : $("#nama-produk").val(),
            merek_produk : $("#merek-produk").val(),
            kategori_produk : $("#kategori-produk").val(),
            harga_produk : $("#harga-produk").val(),
            satuan_produk : $("#satuan-produk").val(),

        };
      

        $.ajax({
            headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
             }, 
             data: dataform,
            
            type: "POST",
            url: url, 
            success: function(data){
                alert('berhasil');  

                //clear the modal
                if(url == "/updateproduk"){
                
                
                $("#submitterproduk").modal("hide");
                }else{
                    $(".tambahbarangform input").val("");
                }
                loadProduk();
            },
            error: function(err){
                alert(err.responseText);
            }
        });
    });


    function hapusProduk(idproduk){


        $.ajax({
            headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
             }, 
             data: {
                 kode_produk: idproduk
             },
            
            type: "POST",
            url: "/hapusbarang", 
            success: function(data){
                Swal.fire(
                    {
                        title: "Produk Berhasil dihapus"
                    }
                );

                //clear the modal
                $(".tambahbarangform input").val("");
                loadProduk();
            },
            error: function(response,){
                alert("cek apache server");
            }
        });
    }


    $("#produkfiller").on("click", "tr td .hapusbarang", function(e){
        e.preventDefault();
        Swal.fire({
            title: 'Apakah anda yakin ingin menghapus',
            showDenyButton: true,
            confirmButtonText: 'Batalkan',
            denyButtonText: `Hapus`,
          }).then((result) => {
            /* Read more about isConfirmed, isDenied below */
            if (result.isConfirmed) {
            } else if (result.isDenied) {
              Swal.fire('Permintaan diterima', '', 'info');
              hapusProduk($(e.target).children("a").attr("kode-produk"));
            }
          });
    });

   




    $("#produkfiller").on("click", "tr td .editbarang", function(e){
        $("#modalproduk").modal("show");
        $("#submitterproduk").attr('action', '/updateproduk');

        getProdukInfo($(e.target).children("a").attr('kode-produk'));
    });

    
                //clear the modal
               
          
    
});