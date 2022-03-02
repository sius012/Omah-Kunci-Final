$(document).ready(function(){
    loaddetail();



    function loaddetail(){
        $.ajax(
            {
                headers: {
                    "X-CSRF-TOKEN" : $("meta[name='csrf-token']").attr('content')
                },
                url: "/loaddsm",
                type: "post",
                dataType: "JSON",
                success: function(data){
    
                    let row = data.map(function(rows, i){
                        let aksi = `<td>
                                            <button class="btn btn-success rounded-circle mr-1 verifiying" id_ds="${rows['id']}">
                                                    <i style="font-size:13px;" class="fa fa-check"></i>
                                            </button>
                                            <button class="btn btn-danger rounded-circle rejecting"  id_ds="${rows['id']}">
                                                    <i class="fa fa-times">
                                            </i></button>
                                    </td>`;
                        if(rows['status2'] == 'terverifikasi'){
                            aksi = `<td>
                            Terverifikasi
                           </td>`;
                        }else if(rows['status2'] == 'ditolak'){
                            aksi = `<td>
                               Ditolak
                            </td>`;
                        }
                       
                         return `
                        <div class="card bg-light">
                        <div class="row card-header">
                            <div class="col-6">
                                <div class=''>Nama Admin: ${rows['name']}</div>
                            </div>
                            <div class="col-6">
                                <div class=" d-flex align-items-right justify-content-right float-right">${rows['created_at']}</div>
                            </div>
                        </div>
                        <table class="table table-borderless">
                            <thead class="thead">
                                <tr>
                                 
                                    <th style="width:170px;">Kode Produk</th>
                                    <th style="width:180px;">Nama Produk</th>
                                    <th style="width:70px;">Jumlah</th>
                                    <th style="width:120px;">Keterangan</th>
                                </tr>
                            </thead>
                            <tbody class="tbody">
                               <tr> 
                                    <td>${rows['kode_produk']}</td>
                                    <td>${rows['nama_produk']}</td>
                                    <td>${rows['jumlah']} ${rows['stn']}</td>
                                    <td>${rows['keterangan']}</td>
                                
                                </tr
                            </tbody>
                        </table>
                    </div>
                        
                       `;
                    });

    
                    $("#dscont").html(row);
                }, 
                error: function(err){
                }
            }
        );
    }

    $(document).on('click', '.verifiying', function(e){
        Swal.fire({
            title: 'Apakah anda yakin ingin menyetujui',
            showCancelyButton: true,
            confirmButtonText: 'Verifikasi',
            cancelButtonText: `Hapus`,
          }).then((result) => {
            /* Read more about isConfirmed, isDenied below */
            if (result.isConfirmed) {
                verifiying($(e.target).attr('id_ds') == undefined ? $(e.target).closest(".verifiying").attr('id_ds') : $(e.target).attr('id_ds') )
            } else if (result.isDenied) {
             
            }
          });
    });

    $(document).on('click', '.rejecting', function(e){
        Swal.fire({
            title: 'Apakah anda yakin ingin menolaknya',
            showCancelyButton: true,
            confirmButtonText: 'Tolak',
            cancelButtonText: `Hapus`,
          }).then((result) => {
            /* Read more about isConfirmed, isDenied below */
            if (result.isConfirmed) {
               rejecting($(e.target).attr('id_ds') == undefined ? $(e.target).closest(".rejecting").attr('id_ds') : $(e.target).attr('id_ds') )
            } else if (result.isDenied) {
             
            }
          });
    });

    function verifiying(id){
        $.ajax({
            headers: {
                "X-CSRF-TOKEN" : $("meta[name='csrf-token']").attr('content')
            },
            data: {
                'id' : id
            },
            url: "/verifiying",
            type: "post",
            success: function(){
                loaddetail();
            },error: function(err){
            }
        });
    }

    function rejecting(id){
        $.ajax({
            headers: {
                "X-CSRF-TOKEN" : $("meta[name='csrf-token']").attr('content')
            },
            data: {
                'id' : id
            },
            url: "/rejecting    ",
            type: "post",
            success: function(){
                loaddetail();
            },error: function(err){
            }
        });
    }
});