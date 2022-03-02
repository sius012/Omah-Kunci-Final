$(document).ready(function () {
    loaddetail();
    $("#detailstoksubmitter").submit(function (e) {
        e.preventDefault();
        var data = {
            'created_at': $("#tanggal").val(),
            'kode_produk': $("#produk-select").val(),
            'jumlah': $("#jumlah").val(),
            'status': $("#status-select").val(),
            'keterangan': $("#keterangan").val(),
        };

        console.log(data);
        $.ajax({
            headers: {
                "X-CSRF-TOKEN": $("meta[name='csrf-token'").attr('content')
            },
            data: {
                data: data
            },
            url: "/tambahdetailstok",
            type: "post",
            success: function (data) {
                Swal.fire('Berhasil Ditambahkan', 'tunggu verifikasi dari manager ya..', 'success');
                loaddetail();
                $("#examplemodal").modal('hide');
            },
            error: function (err) {
                alert(err.responseText);
            }
        });
    });


    function loaddetail() {
        $.ajax({
            headers: {
                "X-CSRF-TOKEN": $("meta[name='csrf-token']").attr('content')
            },
            url: "/loaddatadetailstok",
            type: "post",
            dataType: "JSON",
            success: function (data) {

                let row = data.map(function (rows, i) {

                    return `
                        <div class="card bg-light">
                            <div class="card-header">
                                <div class="row">
                                <div class="col-6">
                                <div class=''>Nama Admin: ${rows['name']}</div>
                            </div>
                            <div class="col-6">
                                <div class="  float-right">${rows['created_at']}</div>
                            </div>
                                </div>
                            </div>
                            <table class="table table-borderless">
                                <thead class="thead">
                                    <tr>
                                    <th style="width:180px;">Waktu</th>
                                        <th style="width:170px;">Kode Produk</th>
                                        <th style="width:180px;">Nama Produk</th>
                                        <th style="width:70px;">Jumlah</th>
                                        <th style="width:90px;">Status</th>
                                        <th style="width:120px;">Keterangan</th>
                                    
                                        <th style="width:120px;">Status</th>
                                    </tr>
                                </thead>
                                <tbody class="tbody">
                                <tr>
                                        <td>${rows['created_at']}</td>
                                        <td>${rows['kode_produk']}</td>
                                        <td>${rows['nama_produk']}</td>
                                        <td>${rows['jumlah']} ${rows['stn']}</td>
                                        <td><div class="status bg-danger">${rows['status']}</div></td>
                                        <td>${rows['keterangan']}</td>
                                        <td><div class="${rows['status2'] == 'terverifikasi' ? 'status2' : ''}">${rows['status2']}</div></td>
                                    </tr
                                </tbody>
                            </table>
                        </div>
                        
                       `;
                });
                $("#dscont").html(row);
            },
            error: function (err) {
            }
        });
    }
});
