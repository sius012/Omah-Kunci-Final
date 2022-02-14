$(document).ready(function(){
    
   
    var jmlopsi = 1;
    console.log("{{'lol'}}");

    function callbacking(response){
        jmlopsi = response;
    
    }
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
            callbacking(data['dataopsi'].length);
            $(".opsigrup").html(row);
   
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
    $("#preorderform").submit(function(e){
        
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

        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                 }, 
            data: {
                formData: formData,
                judulopsi : judulopsi,
                ketopsi : ketopsi,
            },
            type: "POST",
            url: "/tambahpreorder",
            success: function(data){
                Swal.fire({
                    title: "transaksi berhasil ditambahkan"
                });
             //   $("#preorderform input").val("");
                $("#preorderform").attr("disabled", "disabled");
            },
            error: function(err){
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
                alert('hai');
            },
            error: function(err){
                alert(err.responseText);
            },
        });
    });
});