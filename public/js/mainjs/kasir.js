function formatRupiah(angka, prefix){
    var number_string = angka.replace(/[^,\d]/g, '').toString(),
    split   		= number_string.split(','),
    sisa     		= split[0].length % 3,
    rupiah     		= split[0].substr(0, sisa),
    ribuan     		= split[0].substr(sisa).match(/\d{3}/gi);

    // tambahkan titik jika yang di input sudah menjadi angka ribuan
    if(ribuan){
        separator = sisa ? '.' : '';
        rupiah += separator + ribuan.join('.');
    }

    rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
    return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
}


$(document).ready(function(){
    $("#next-button").attr("disabled","disabled");
    //loader
    function loader(){
        $("#tabling").hide();
        $.ajax({
            headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
             }, 
             data: {
             },
            
            type: "POST",
            dataType: "JSON",
            url: "/loader", 
            success: function(data){
                var no = 1;
                var row ="";
                var subtotal =0;
                var row = data['datadetail'].map(function(dato,i){
                    subtotal += parseInt(dato['jumlah']) * (parseInt(dato['harga']) - parseInt(dato['potongan']));
                    return `
                        <tr>
                            <td>${i+1}</td>
                            <td>${dato['nama_produk']}</td>
                            <td>${dato['jumlah']}</td>
                            <td>Rp. ${parseInt(dato['harga']).toLocaleString()}</td>
                            <td>Rp. ${parseInt(dato['potongan']).toLocaleString() }</td>
                            <td> Rp. ${parseInt(dato['jumlah'] * (dato['harga'] - dato['potongan'])).toLocaleString()}</td>
                            <td><button class="btn btn-danger buang"><a id_detail="${dato['id']}"><i class="fa fa-trash"></i></a></button></td>
                        </tr>
                    `
                
                });
                
                $('#tabling').html(row);
                $("#tabling").show("slow");
                $('#subtotal').val(subtotal.toLocaleString());
                subtotal1 = subtotal;
   
            },
            error: function(response,){
            
            }
        });    
    }

    loader();
    






    var id_trans = "{{session()->has('transaksi') ? Session::get('transaksi')['id_transaksi']:0}}";
    var subtotal1 = 0;
    var subtotalafterdiskon = 0;

    var metode = "cash";

    if(metode == "cash"){
        $("#kredit input").attr("disabled","disabled");
    }

    // $("#kredit").click(function(){
    //     $("#kredit div input").removeAttr("disabled");
    //     $("#kredit div select").removeAttr("disabled");
    //     $("#tunai div input").attr("disabled","disabled");
    //     $("#tunai div select").attr("disabled","disabled");
    //     $(this).addClass("active");
    //      $("#tunai").removeClass("active");
    //      $("#tunai").removeClass("active");
    //      $("#kredit-input").addClass("usethis");
    //      $("#kreditvia-input").addClass("usethisvia");
    //      $("#cash-input").removeClass("usethis");
    //      $("#cashvia-input").removeClass("usethisvia");
    //      metode = "kredit";
    // });

    //  $("#tunai").click(function(){
    //     $("#tunai input").removeAttr("disabled");
    //     $("#tunai select").removeAttr("disabled");
    //     $("#kredit input").attr("disabled","disabled");
    //     $("#kredit select").attr("disabled","disabled");
    //     $(this).addClass("active");
    //     $("#kredit").removeClass("active");
    //     $("#cash-input").addClass("usethis");
    //     $("#cashvia-input").addClass("usethisvia");
    //     $("#kredit-input").removeClass("usethis");
    //     $("#kreditvia-input").removeClass("usethisvia");
    //     metode = "cash";    
    // });





    if(id_trans == 0){
        $("#selesai").attr('disabled','disabled');
    }
    $("#totality").html(subtotal1);


    $(".kredit input").attr("disabled","disabled");

    $(".drop").hide();
    $("#searcher").keyup(function(){
        $("#myUL").show();
            kw = $(this).val();
            
            $.ajax({
                headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                 }, 
                 data: {
                     data: kw
                 },
                
                type: "POST",
                dataType: "JSON",
                url: "/cari", 
                success: function(data){
                    $(".drop").show();
                    if(data.length > 0){
                    var li = "";
                    for(var i = 0;i < data.length;i++){
                        li += `<li>

                                   <a kode="${data[i]['kode_produk']}" harga="${data[i]['harga']}" jumlah="1" potongan="0" class="sear">${data[i]["kode_produk"] + " " + data[i]["nama_produk"]}</a>
                                </div>
                            
                            </li>`;
                    }
                    $("#myUL").html(li);
        
                }else{
                    $(".drop").hide();
                }
               
                console.log(data.length);
                
                },
                error: function(err,response,){
                    alert(err.responseText);
                }
            });
    });

    $(document).click(function(){
        $("#myUL").hide();
    });

    $("#myUL").click(function(e){
    e.stopPropagation(); 
    });

   
 


    function tambahItem(id,harga,jumlah,potongan){
        $("#tabling").hide("slow");
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
             }, 
             data: {
                    data : {
                        kode_produk : id,
                        harga: harga,
                        jumlah: jumlah,
                        potongan: potongan
                    } 
            },
            type: "POST",
            dataType: "JSON",
            url: "/tambahItem",
            success: function(data,response){
                console.log(data['datadetail']);
                var subtotal =0;
                var no = 1;
                let row = data['datadetail'].map(function(dato,i){
                    subtotal += parseInt(dato['jumlah']) * (parseInt(dato['harga']) - parseInt(dato['potongan']));
                    return `
                        <tr>
                            <td>${i+1}</td>
                            <td>${dato['nama_produk']}</td>
                            <td>${dato['jumlah']}</td>
                            <td>Rp. ${parseInt(dato['harga']).toLocaleString()}</td>
                            <td>Rp. ${parseInt(dato['potongan']).toLocaleString() }</td>
                            <td> Rp. ${parseInt(dato['jumlah'] * (dato['harga'] - dato['potongan'])).toLocaleString()}</td>
                            <td><button class="btn btn-danger buang"><a id_detail="${dato['id']}"><i class="fa fa-trash"></i></a></button></td>
                        </tr>
                    `;
                
                });
                $('#tabling').html(row);
                $("#tabling").show("slow");
          $('#subtotal').val(subtotal.toLocaleString());
                subtotal1 = subtotal;
                id_trans = data['datadetail'][0]['kode_trans'];
                $("#kodetrans").val(data['datadetail'][0]['kode_trans']);
         
            },
            error: function(err,response, errorThrown, jqXHR){
                alert(err.responseText);
            }
        });

         $("#selesai").removeAttr('disabled');
    }

    $("#myUL").on("click", ".sear",function(event){
        $("#searcher").val($(event.target).attr("kode"));
        $("#hrg").val($(event.target).attr("harga")     );
        $("#hrg-nominal").html(":  RP. " + parseInt($(event.target).attr("harga")).toLocaleString());
     
    }); 


    $("#formsubmitter").submit(function(e){
        e.preventDefault();
        tambahItem(
            $("#searcher").val(),
            $("#hrg").val(),
            $("#qty").val(),
            0,
        );
    });



    $(".drop").on("keyup", ".jml", function(){
        $(event.target).closest(".bungkuser").children(".sear").attr("jumlah", $(event.target).val());
    });

    $(".drop").on("keyup", ".potongan", function(){
        $(event.target).closest(".bungkuser").children(".sear").attr("potongan", $(event.target).val());
    });

    $("#selesai").click(function(){
        
        if(parseInt($(".usethis").val()) < subtotalafterdiskon && $('input[name=payment]:checked').val() == "cash"){
            alert("uang kurang");
        }else{
            id_trans = $("#kodetrans").val();
        if($("#nama").val() == null || $("#nama").val() == "" || $(".usethis").val() == "" || $(".usethis").val()==null || $('input[name=payment]:checked').val() == "" ||  $(".usethisvia").val() == " "){
            Swal.fire("Pastikan Semua Kolom terisi(kecuali diskon)","","info");
        }else{
            $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
             }, 
             data: {
                    data : {
                        nama_pelanggan: $("#nama").val(),
                        diskon: $("#diskon").val(),
                        bayar: $(".usethis").val(),
                        metode: "cash",
                        via: $(".usethisvia").val(),
                    } 
                },
                type: "POST",
                url: "/selesaitransaksi",
                success: function(data){
                    Swal.fire(
                        'Transaksi Berhasil!',
                        'You clicked the button!',
                        'success'
                    );
                    print();
                    $("#next-button").removeAttr("disabled");
                },
                error: function(err,response, errorThrown, jqXHR){
                    alert(err.responseText);
                }
            });
            //window.location = "{{url('/selesai')}}";
          }

        }
       
        
        
    });

    //input diskon
    $("#diskon").keyup(function(){
       subtotalafterdiskon = subtotal1 - $(this).val(); 
       $("#totality").val(subtotalafterdiskon.toLocaleString());
    }); 

    $("#reset-button").click(function(){
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
             },
             url: "/resettransaction",
             type: "GET",
             success: function(){
                 alert("transaksi diulang");
                 window.location = "/kasir";
             },
             error: function(){

             }
        });
    });



    function hapusdetail(id_detail){
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
             },
             data: {
                 id_detail : id_detail
             },
             
             type:"POST",
             url: "/removedetail",
             success: function(data){
                 loader();
             },
             error: function(){
                alert("gagal");
             }
          
        });
    }

    //NEXt TRANSACTION
    $("#next-button").click(function(e){
        window.location ="/selesaitrans";
    });












    $(document).on("click", "tr td .buang", function(e){
        // $.ajax({
        //     headers: {
        //         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        //      },
        //      data: {
        //          $id_detail : $(e.target).attr("id_detail")
        //      },
        //      type:"POST",
        //      url: "/removedetail",
        //      success: function(){
        //         alert($(e.target).children("a").attr("id_detail"));
        //      },
        //      error: function(){
        //         alert($(e.target).children("a").attr("id_detail"));
        //      }
          
        // });

        Swal.fire({
            title: 'Apakah anda yakin ingin menghapus',
            showDenyButton: true,
            confirmButtonText: 'Batalkan',
            denyButtonText: `Hapus`,
          }).then((result) => {
            /* Read more about isConfirmed, isDenied below */
            if (result.isConfirmed) {
              Swal.fire('Saved!', '', 'success')
            } else if (result.isDenied) {
              Swal.fire('Changes are not saved', '', 'info');
              alert($(e.target).children("a").attr("id_detail"));
              hapusdetail($(e.target).children("a").attr("id_detail"));
            }
          })
        
      
    });

     function print(){

        $.ajax({
            headers: {
                "X-CSRF-TOKEN" : $("meta[name='csrf-token']").attr('content')
            },
            url: "/cetaknotakecil",
            type: "post",
            success: function(response){
                printJS({printable: response['filename'], type: 'pdf', base64: true});
            },  
            error: function(err){
                alert(err.responseText);
            }
        });
    };

});