$(document).ready(function(){
    
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
                for(var tr = 0; tr < data['datadetail'].length ;tr++){
                    row+="<tr class='goodtr'>";
                    row+='<td>'+no+'</td><td>'+data['datadetail'][tr]['nama_produk']+'</td><td>'+data['datadetail'][tr]['jumlah']+'</td><td>'+data['datadetail'][tr]['total']+'</td>'+'<td><button class="btn btn-danger buang"><a id_detail="'+data['datadetail'][tr]['id']+'"><i class="fa fa-trash"></i></a></button></td>';
                    row+="</tr>";
                    no++;
                    subtotal += data['datadetail'][tr]['total'];
                }
                $('#tabling').html(row);
                $("#tabling").show("slow");
                $('#subtotal').val(subtotal);
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

    $('input[name=payment]:checked')




    if(id_trans == 0){
        $("#selesai").attr('disabled','disabled');
    }
    $("#totality").html(subtotal1);


    $(".kredit input").attr("disabled","disabled");

    $(".drop").hide();
    $("#searcher").keyup(function(){
        
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
                        li += `<li><a href="#">
                                <div>
                                <div class="row">
                                    <div class="col-sm">
                                        ${data[i]['nama_produk']}
                                        </div>
                                        <div class="col-sm">
                                        ${data[i]['kategori']}
                                        </div>
                                        <div class="col-sm">
                                        ${data[i]['harga']}
                                        </div>
                                        <div class="col-sm">
                                        <input class="jml" value=1>
                                        </div>
                                    </div>
                                    <a kode=" ${data[i]['kode_produk']}" harga="${data[i]['harga']}" jumlah="1" class="sear">Tambah</a></div>
                               </a> 
                            </li>`;
                    }
                    $(".drop ul").html(li);
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
        $(".drop").hide();
    });

    $(".drop").click(function(e){
    e.stopPropagation(); 
    });

   
 


    function tambahItem(id,harga,jumlah){
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
                    } 
            },
            type: "POST",
            dataType: "JSON",
            url: "/tambahItem",
            success: function(data){
                var no = 1;
                var row ="";
                var subtotal =0;
                for(var tr = 0; tr < data['datadetail'].length ;tr++){
                    row+="<tr class='goodtr'    >";
                    row+='<td>'+no+'</td><td>'+data['datadetail'][tr]['nama_produk']+'</td><td>'+data['datadetail'][tr]['jumlah']+'</td><td>'+data['datadetail'][tr]['total']+'</td>'+'<td><button class="btn btn-danger buang"><a id_detail="'+data['datadetail'][tr]['id']+'"><i class="fa fa-trash"></i></a></button></td>';
                    row+="</tr>";
                    no++;
                    subtotal += data['datadetail'][tr]['total'];
                }
                $('#tabling').html(row);
                $("#tabling").show("slow");
                $('#subtotal').val(subtotal);
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

    $(".drop").on("click", ".sear",function(event){
        tambahItem($(event.target).attr("kode"),$(event.target).attr("harga"),$(event.target).attr("jumlah"));
    });

    $(".drop").on("keyup", ".jml", function(){
        $(event.target).parent().parent().parent().parent().children(".sear").attr("jumlah", $(event.target).val());
    });

    $("#selesai").click(function(){
        
        if(parseInt($(".usethis").val()) < subtotalafterdiskon && $('input[name=payment]:checked').val() == "cash"){
            alert("uang kurang");
        }else{
            id_trans = $("#kodetrans").val();
        if($("#nama").val() == null || $("#nama").val() == "" || $(".usethis").val() == "" || $(".usethis").val()==null || $('input[name=payment]:checked').val() == "" || $('input[name=payment]:checked').val() == null || $(".usethisvia").val() == " "){
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
                        metode: $('input[name=payment]:checked').val(),
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
       subtotalafterdiskon = subtotal1 * (100 - parseInt($(this).val())) / 100; 
       $("#totality").val(subtotalafterdiskon);
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