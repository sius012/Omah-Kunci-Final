$(document).ready(function () {
    
    $(document).click(function () {
        $(".myUL").hide();
    });

    $(document).on("click",".myUL",function (e) {
        e.stopPropagation();
    });

    $(document).on('keyup', '.inputan-produk', function (e) {

        $(e.target).closest(".col").children(".myUL").show();

        let kw = $(e.target).val();


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
            success: function (data) {





                $(".drop").show();
                if (data['data'].length > 0) {
                    var li = "";
                    for (var i = 0; i < data['data'].length; i++) {
                        li += `<li>

                                   <a kode="${data['data'][i]['kode_produk']}" harga="${data['data'][i]['harga']}" jumlah="1" potongan="0" class="sear">${data['data'][i]["kode_produk"] + " " + data['data'][i]["nama_produk"] + " " + data['data'][i]['nama_merek']}</a>
                                </div>
                            
                            </li>`;
                    }

                    $(e.target).closest(".col").children(".myUL").html(li);
                } else {
                    $(".drop").hide();
                }

                console.log(data.length);

            },
            error: function (err, response,) {
                Swal.fire("terjadi kesalahan", "", "info");
            }
        });


    });

    $(document).on("click", ".sear", function (event) {
        $(event.target).closest(".col").children("input").val($(event.target).attr("kode"));
        $(event.target).closest(".form-row").children(".col").children(".harga-produk").val(parseInt($(event.target).attr("harga")).toLocaleString());

    });

    $("#tambah-produk").click(function(){
        $("#first-row").after(`
        <div class="form-row mt-3">
        <div class="col">

            <input type="text" class="form-control inputan-produk bg-light" name="kode[]" placeholder="Kode" required>
            <ul class="myUL">
            </ul>
        </div>
        <div class="col">
            <input type="text" class="form-control harga-produk bg-light" name="harga[]" placeholder="Harga Produk" readonly>
        </div>
        <div class="col">
           
            <input type="text" class="form-control bg-light" name="jumlah[]" placeholder="Jumlah" required>
        </div>
        <div class="col">
   
            <input type="text" class="form-control bg-light" placeholder="Harga Promo" name="harga[]" required>
        </div>
        <div>
       

        </div>
        
    </div>
        `);
    });
});