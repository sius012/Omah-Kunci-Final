$(document).ready(function(){   
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
                $("#kode-edit").val(data["kode_produk"]);
                $("#nama-edit").val(data["nama_produk"]);
                $("#merek-edit").val(data["merk"]);
                $("#kategori-edit").val(data["id_kategori"]);
                $("#harga-edit").val(data["harga"]);
                
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
                    return "<tr>"+"<td>"+datos["kode_produk"]+"</td>"+"<td>"+datos["nama_produk"]+"</td>"+"<td>"+datos["merk"]+"</td>"+"<td>"+datos["kategori"]+"</td>"+"<td>"+datos["harga"]+"</td>"+"<td align='center'><button class='btn btn-info mr-3 editbarang'><a href='' kode-produk='"+datos["kode_produk"]+"'><i class='fa fa-edit'></i></a></button><button class='btn btn-danger hapusbarang'><a href='' kode-produk = '"+datos["kode_produk"]+"'><i class='fa fa-trash'></i></a></button>"+"</tr>";
                });
                $("#isiproduk").html(row);
            },
            error: function(response,){
                alert("ada yang salah");
            }
        });
    }

    
    $("#submitter").submit(function(e){


        var dataform = {
            kode_produk : $("#kode").val(),
            nama_produk : $("#nama").val(),
            merek_produk : $("#merek").val(),
            kategori_produk : $("#kategori").val(),
            harga_produk : $("#harga").val(),
        };
        e.preventDefault();

        $.ajax({
            headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
             }, 
             data: dataform,
            
            type: "POST",
            url: "/tambahbarang", 
            success: function(data){
                Swal.fire(
                    {
                        title: "Produk berhasil ditambahkan berhasil"
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


    $("#isiproduk").on("click", "tr td .hapusbarang", function(e){
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

   




    $("#isiproduk").on("click", "tr td .editbarang", function(e){
        $("#modaledit").modal("show");

        getProdukInfo($(e.target).children("a").attr('kode-produk'));
    });

    $("#submitteredit").submit(function(e){
        e.preventDefault();

        var dataform = {
            kode_produk : $("#kode-edit").val(),
            nama_produk : $("#nama-edit").val(),
            merek_produk : $("#merek-edit").val(),
            kategori_produk : $("#kategori-edit").val(),
            harga_produk : $("#harga-edit").val(),
        };


        $.ajax({
            headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
             }, 
             data: dataform,
            
            type: "POST",
            url: "/updateproduk", 
            success: function(data){
                Swal.fire(
                    {
                        title: "Produk berhasil  diedit"
                    }
                );

                //clear the modal
                $(".tambahbarangform input").val("");
                loadProduk();
                $("#modaledit").modal("hide");
            },
            error: function(response,){
                alert(dataform.harga_produk);
            }
        });
    });
});