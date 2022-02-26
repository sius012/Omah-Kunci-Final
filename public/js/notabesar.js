$(document).ready(function(){
    var jenisnota = "pintugarasi";
    var pg = `
        <label for='ukuranpg'>Ukuran : </label>
        <input class="form-control" id="ukuranpg">
        <label for='daunpintupg'>Daun Pintu : </label>
        <input class="form-control" id="daunpintupg">
        <label for='arahtikungpg'>Arah Tikung : </label>
        <input class="form-control" id="arahtikungpg">
        <label for='pilarpg'>Pilar : </label>
        <input class="form-control" id="pilarpg">
        <label for='warnatipepg'>Warna/Tipe : </label>
        <input class="form-control" id="warnatipepg">
        <label for='waktupg'>Waktu : </label>
        <input class="form-control" id="waktupg">
    `;

    var pgadp = `
    <label for='ukurankusenpgadp'>Ukuran : </label>
    <input class="form-control" id="ukurankusenpgadp">
    <label for='warnatipepgadp'>Warna/Tipe : </label>
    <input class="form-control" id="warnatipepgadp">
    <label for='waktupgadp'>Waktu : </label>
    <input class="form-control" id="waktupgadp">
`;

var ag = `
<label for='ukuranag'>Ukuran Diperuntukan : </label>
<input class="form-control" id="ukuranag">

`;
var upvc = `
<label for='itembarangupvc'>Item Barang : </label>
<input class="form-control" id="itembarangupvc">
<label for='warnatipeupvc'>Warna/Tipe : </label>
<input class="form-control" id="warnatipeupvc">
`;

var omge = `
<label for='ukuranomge'>Ukuran(Ekstimasi) : </label>
<input class="form-control" id="ukuranomge">

`;

var judulpg = ["Ukuran", "Daun Pintu", "Arah Tikung", "Pilar", "Warna/Tipe", "Waktu"];
var ospipg = [$("#ukuranpg").val(), $("#daunpintupg").val(), $("#arahtikungpg").val(), $("#pilarpg"),val(), $("#warnatipepg"),val(), $("#waktupg"),val()];

$("#notabesar").change(function(){
   jenisnota = $(this).val();
   if($(this).val() == "pintugarasi"){
       $(".opsigrup").html(pg);
   }else if($(this).val() == "pintugadandp"){
    $(".opsigrup").html(pgadp);
   }else if($(this).val() == 'autog'){
    $(".opsigrup").html(ag);
   }else if($(this).val() == 'upvc'){
    $(".opsigrup").html(upvc);
   }else{
    $(".opsigrup").html(omge);
   }
});
 



    $(".td").hide();
    var jmlopsi = 1;
    console.log("{{'lol'}}");

    function callbacking(response){
        jmlopsi = response;
    
    }


    $("#searcher-nota").keyup(function(e){
        $.ajax({
            headers: {
                "X-CSRF-TOKEN" : $("meta[name=csrf-token]").attr('content')
            },
            data: {
                kw : $("#searcher-nota").val()
            },
            url: "/searchnotapreorder",
            type: "post",
            dataType: "json",
            success: function(data){
                console.log(data);
                let row = data.map(function(datas){
                    return `
                <li><a href="#"  id_nb = ${datas['id_transaksi']} class='${datas['us'] == null && datas['status'] == "menunggu" ? "disab" :  "cc"}'>${datas['no_nota'] + "  " + "Termin: " + datas['termin']}</a></li>

                    `;
                });

                $("#myUL").html(row);
            },
            error: function(err){
                Swal.fire(err.responseText)
            }

        });
    });

    $("ul").on("click", "li .cc", function(e){
        $.ajax({
            headers: {
                "X-CSRF-TOKEN" : $("meta[name=csrf-token]").attr('content'),
            },
            data: {
                id_transaksi : $(e.target).attr("id_nb")
            },
            url: "/getnb",
            type: "post",
            dataType: "json",
            success: function(data){
                console.log(data);
                $("#tt").text(data["nb"][0]["termin"] == 3 ? "PELUNASAN" : "Termin: "+data["nb"][0]["termin"]);
                $("#baseinputnb .col").show();
                $("#baseinputnb input, label").show();
                $("#ttd").  val(data['nb'][0]['ttd']);
                $("#up").   val(data['nb'][0]['up']);
                $("#us").   val(data['nb'][0]['us']);
                $("#brp").  val(data['nb'][0]['brp']);
                $("#gm").   val(data['nb'][0]['gm']);
                $("#total").val(data['nb'][0]['total']);
                $("#nn").text("No Nota: "+data["nb"][0]["no_nota"]);
    
    
                let row = data["opsi"].map(function(e,i){
                    return `
                    <div class="form-group">
                        <input type="text" class="form-control form-control-sm title${i+1}" id="exampleInputPassword1" value="${e['judul']}">
                        <input type="text" class="form-control isi${i+1}" id="exampleInputPassword1" value="${e['ket']}">
                    </div>
                    `;
                    
                });

                callbacking(data['opsi'].length);
                $(".opsigrup").html(row);

                $("#buttonsubmit").text("Bayar");
                $("#preorderform").attr("action", "/bayarpreorder");
                $("#id_trans").val(data["nb"][0]["id_transaksi"]);
                $(".td").show();
                $(".td").children("input").val(data["td"]);
                $("#addopsi").hide();
                if(data["nb"][0]["status"] == "dibayar"){
                    $("#buttonsubmit").attr("disabled", "disabled");
                    $("#buttonsubmit").text("Sudah Lunas");
                    $("#buttonsubmit").removeClass("btn-primary");
                    $("#buttonsubmit").addClass("btn-success");
                
                }else{
                    $("#buttonsubmit").removeAttr("disabled");
                    $("#buttonsubmit").removeClass("btn-success");
                    $("#buttonsubmit").addClass("btn-primary");
                    $("#buttonsubmit").text("Bayar");
                }
            },
            error: function(err){
                alert(err.responseText);
            }
        });
    });




    $.ajax({
        headers:{
            'X-CSRF-TOKEN' : $("meta[name='csrf-token']").attr('content')
        },
        url : '/loaddatanb',
        type : 'post',
        dataType: 'JSON',
        beforeSend:  function(xhr){
            $("#baseinputnb .col").append(`<div class="spinner-border" role="status">
            <span class="sr-only">Loading...</span>
          </div>`);
          $("#baseinputnb input, label").hide();
        },
        success: function(data){
            console.log(data);
            $("#baseinputnb .col").show();
            $("#baseinputnb input, label").show();
            $(".spinner-border").hide();
            $("#ttd").  val(data['data']['ttd']);
            $("#up").   val(data['data']['up']);
            $("#us").   val(data['data']['us']);
            $("#brp").  val(data['data']['brp']);
            $("#gm").   val(data['data']['gm']);
            $("#total").val(data['data']['total']);


            let row = data['dataopsi'].map(function(e,i){
                return `
                <div class="form-group">
                    <input type="text" class="form-control form-control-sm title${i+1}" id="exampleInputPassword1" value="${e['judul']}">
                    <input type="text" class="form-control isi${i+1}" id="exampleInputPassword1" value="${e['ket']}">
                </div>
                `;
                
            });
           // callbacking(data['dataopsi'].length);
           if( data["dataopsi"].length > 0) {
            $(".opsigrup").html(row);
           }
           
         
            $(".opsigrup").show("slow");
            jmlopsi = dataopsi['dataopsi'].length;
        },
        error: function(err){
            alert(err.responseText);
        }
    });



    
   
    $("#addopsi").click(function(){

        jmlopsi += 1
        if(jmlopsi > 4){
            Swal.fire({
                title : "lol"
            });
        }else{
        $(".opsigrup").append(`
        <div class="form-group">
            <input type="text" class="form-control form-control-sm title${jmlopsi}" id="exampleInputPassword1" >
            <input type="text" class="form-control isi${jmlopsi}" id="exampleInputPassword1" >
        </div>
        `);
        }
    });


    //ketika tombol submit/bayar tertekan
    $("#preorderform").submit(function(e){
        let url = $(this).attr("action");
        e.preventDefault();

                                                                                                                                                                           

        var judulopsi = [];
        var ketopsi = [];

        for(var j = 1; j <= jmlopsi; j++){
            judulopsi.push($(".title"+j).val());
            ketopsi.push($(".isi"+j).val());
        }

        var formData = {
            ttd: $("#ttd").val(),
            up: $("#up").val(),
            us: $("#us").val(),
            brp: $("#brp").val(),
            gm: $("#gm").val(),
            total: $("#total").val(),
        }

        console.log(formData);
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                 }, 
            data: {
                formData: formData,
                jenisnota: jenisnota,
                
                id_transaksi: $("#id_trans").val()
            },
            type: "POST",
            url: url,
            dataType: "json",
            success: function(data){
                Swal.fire({
                    title: url == "/bayarpreorder" ? "Pembayaran dilunasi" : "Transaksi Berhasi Ditambahkan" 
                });
             //   $("#preorderform input").val("");
                $("#preorderform").attr("disabled", "disabled");
               
                $("#buttonsubmit").attr("disabled", "disabled");
                $("#buttonsubmit").text("Sudah Lunas");
                $("#buttonsubmit").removeClass("btn-primary");
                $("#buttonsubmit").addClass("btn-success");
                $("#id_trans").val(data["id_trans"]);
                $("#nn").text("No Nota: "+data["no_nota"]);
                $("#searcher-nota").val("");
               
            
            },
            error: function(err,response){
                Swal.fire("terjadi kesalahan");
                alert(err.responseText);
            }




        });
       
    });


    $("#printbutton").click(function(){
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                 }, 
            data: {
                id_transaksi : $("#id_trans").val()
            },
            url: "/cetaknotabesar",
            type: "post",
            success: function(response){
                printJS({printable: response['filename'], type: 'pdf', base64: true});
                alert("berhasil");
            },error: function(err){
                alert(err.responseText);
            }
        });
    });

    $("#resetbutton").click(function(e){
        e.preventDefault();
        $.ajax({
            headers: {
                'X-CSRF-TOKEN' : $("meta[name='csrf-token'").attr('content')
            },
            url: '/resettrans',
            type: 'POST',
            success: function(){
                window.location = "/notabesar";
            },
            error: function(err){
                alert(err.responseText);
            },
        });
    });
});