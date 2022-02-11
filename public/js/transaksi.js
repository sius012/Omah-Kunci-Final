$(document).ready(function(e){
  
    $(".content-wrapper").on("click", ".datatrans", function(event){
    
    
        $.ajax({
            headers:  {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                 }, 
            data: {id: $(event.target).is(".datatrans") ? $(event.target).attr('id_trans') : $(event.target).closest('.datatrans').attr('id_trans')},
            url: "/loadsingletrans",
           dataType: "JSON", 
            type: "post",
            success: function(data){
                var dato = data['trans'].map(function(transo){
                    return "<tr>"+"<td>"+transo["kode_produk"]+"</td>"+"<td>"+transo["nama_produk"]+"</td>"+"<td>"+transo["merk"]+"<td>"+transo["jumlah"]+"</td>"+"<td>"+transo["kategori"]+"</td>"+"</tr>";   
                });
                     
                
               $("#exampleModal").modal('show');
               $("#namapelanggan").html("Nama Pelanggan : " +data['detail'][0]['nama_pelanggan']);
               $("#dtcontent").html(dato);
               $("#tanggaltrans").html(data['detail'][0]['created_at'])
                
            },
            error: function(err){
                alert(err.text);
            }
        });
    });
});


