$(document).ready(function () {
    var datasite=$('body').attr('data-site');
    const token = $("meta[name='csrf-token']").attr("content");
    
      $("#data-obat").DataTable({
        processing: true,
        serverSide: true,
        ajax: datasite + "/fetchObat",
        columns: [
          { data: 'DT_RowIndex', name: 'DT_RowIndex' },
          { data: 'kode', name: 'kode' },
          { data: 'nama_obat', name: 'nama_obat' },
          { data: 'jenis', name: 'jenis' },
          { data: 'satuan', name: 'satuan' },
          { data: 'sisa_stok', name: 'sisa_stok' },
          { data: 'aksi', name: 'aksi',searchable:false,orderable:false}
        ],
        "buttons": ["excel", "colvis"],
        initComplete: function () {
          var input = $('.dataTables_filter input').unbind(),
            self = this.api(),
            $searchButton = $('<button class="btn btn-primary btn-sm m-2">')
              .text('Cari')
              .click(function () {
                self.search(input.val()).draw();
              }),
            $clearButton = $('<button class="btn btn-warning btn-sm">')
              .text('Ulang')
              .click(function () {
                input.val('');
                $searchButton.click();
              })
          $('.dataTables_filter').append($searchButton, $clearButton);
        },
        "responsive": true, "lengthChange": true, "autoWidth": true, "searching": true, "filter": true, "info": true,
        "language": {
          "lengthMenu": " _MENU_ data",
          "zeroRecords": "Data Pendaftaran kosong",
          "info": "Showing page _PAGE_ of _PAGES_",
          "infoEmpty": "Data Pendaftaran tidak ditemukan",
          "infoFiltered": "(filtered from _MAX_ total records)"
        },
        scrollY: 300,
        scroller: {
          loadingIndicator: true
        }
      });
      
      $("#penerimaan-obat").DataTable({
        "paging":   false,
        "ordering": true,
        "info":     false,
        "searching":false
      });
      
      
      $("#history-penerimaan-obat").DataTable({
        processing: true,
        serverSide: true,
        ajax:{
          url:datasite + "/fetchpenerimaan/",
          type:'GET',
          data:function(data){
          data.idobat=$("#id_obat").val();
          }
          
        },
        columns: [
          { data: 'DT_RowIndex', name: 'DT_RowIndex' },
          { data: 'tanggal_penermaan', name: 'tanggal_penermaan' },
          { data: 'jumlah_penermaan', name: 'jumlah_penermaan' },
          { data: 'tanggal_kadaluarsa', name: 'tanggal_kadaluarsa' },
          { data: 'no_batch', name: 'no_batch' },
          { data: 'petugas_pengirim', name: 'petugas_pengirim' },
          { data: 'aksi', name: 'aksi',searchable:false,orderable:false}
        ],
        "buttons": ["excel", "colvis"],      
        "responsive": true, "lengthChange": true, "autoWidth": true, "searching": true, "filter": true, "info": true,
        "language": {
          "lengthMenu": " _MENU_ data",
          "zeroRecords": "Data penerimaan kosong",
          "info": "Showing page _PAGE_ of _PAGES_",
          "infoEmpty": "Data Pendaftaran tidak ditemukan",
          "infoFiltered": "(filtered from _MAX_ total records)"
        },
        scrollY: 500,
        scroller: {
          loadingIndicator: true
        }
      });
      
      
      
      
      // data penerimaan
      // $("#btn-input-penerimaan").on("click",function(){
      //   const idObat=$(this).attr('data-id');        
      //   $.ajax({
      //     url:`${datasite}/obat/${idObat}/edit`,
      //     type:'GET',
      //     dataType:'json',
      //     success:function(res){
      //       if(res.status===1){
      //         const {...dataObat}=res.data;
      //         $("#edit_id_obat").val(dataObat.id);
      //         $("#edit_kode").val(dataObat.kode);
      //         $("#edit_nama_obat").val(dataObat.nama_obat);
      //         $("#edit_jenis").val(dataObat.jenis);
      //         $("#edit_satuan").val(dataObat.satuan);
      //         $("#edit_harga").val(dataObat.harga);
      //         $("#edit_stok_awal").val(dataObat.stok_awal);
      //         $("#edit_sisa_stok").val(dataObat.sisa_stok);
      //         $("#edit_status").val(dataObat.status);
      //         $("#edit_keterangan").val(dataObat.keterangan);
      //       }else{
      //         Swal.fire({title: result.metaData.message,
      //           text: "pengambilan data obat gagal dilakukan, silahkan refresh halaman ..!",
      //           icon: 'error'});
      //       }
      //     }
      //   })               
      // });
      
      $("#form-add-penerimaan").on("submit",function(e){
        e.preventDefault();
        var dataPenerimaan=$(this).serialize();
        const idObataktif=$("#id_obat").val();
        $.ajax({
          url:datasite+'/penerimaanObat',
          type:'POST',
          data:dataPenerimaan,
          dataType:'json',
          success:function(data){
            if(data.status===1){
              Swal.fire({
                title: 'Success',
                text: data.message,
                icon: 'success',
                confirmButtonText: 'Ok'
              }).then(()=>{
                window.location.reload();
              })
            }else{
              Swal.fire({
                title:'error',
                text:data.message,
                icon:'error'
              })
            }
          },
          error: function (a) {           
          console.log(a);
            if(a.status==422){
              $.each(a.responseJSON.errors, function (i, v) {
                PNotify.error({
                  title: 'error',
                  text: v,
                })
              })          
            }else{
              PNotify.error({
                title: 'error',
                text: 'proses simpan data error kode error : '+a.status,
              })
            }      
          }
        })
      });
      
      $("#history-penerimaan-obat").on("click",".edit-penerimaan",function(){
        const idPenerimaan=$(this).attr('data-id');        
        $.ajax({
          url:`${datasite}/penerimaanObat/${idPenerimaan}/edit`,
          type:'GET',
          dataType:'json',
          success:function(res){
            if(res.status===1){
              const {...dataObat}=res.data;
              $("#edit_id_penerimaan").val(dataObat.id);
              $("#edit_id_obat").val(dataObat.id_obat);
              $("#edit_jenis").val(dataObat.jenis);
              $("#edit_satuan").val(dataObat.satuan);
              $("#edit_jumlah_penermaan").val(dataObat.jumlah_penermaan);
              $("#edit_tanggal_penermaan").val(dataObat.tanggal_penermaan);
              $("#edit_waktu_penermaan").val(dataObat.waktu_penermaan);
              $("#edit_tanggal_kadaluarsa").val(dataObat.tanggal_kadaluarsa);
              $("#edit_no_batch").val(dataObat.no_batch);
              $("#edit_petugas_pengirim").val(dataObat.petugas_pengirim);
              $("#edit_petugas_pengirim").val(dataObat.petugas_pengirim);
              $("#edit_status").val(dataObat.status);
              $("#edit_keterangan").val(dataObat.keterangan);
            }else{
              Swal.fire({title: result.metaData.message,
                text: "pengambilan data obat gagal dilakukan, silahkan refresh halaman ..!",
                icon: 'error'});
            }
          }
        })               
      });
      
      $("#form-edit-penerimaan").on("submit",function(e){
        e.preventDefault();
        var dataPenerimaan=$(this).serialize();
        const idPenerimaan=$("#edit_id_penerimaan").val();
        $.ajax({
          url:datasite+'/penerimaanObat/'+idPenerimaan,
          type:'PUT',
          data:dataPenerimaan,
          dataType:'json',
          success:function(data){
            if(data.status===1){
              Swal.fire({
                title: 'Success',
                text: data.message,
                icon: 'success',
                confirmButtonText: 'Ok'
              }).then(()=>{
                window.location.reload();
              })
            }else{
              Swal.fire({
                title:'error',
                text:data.message,
                icon:'error'
              })
            }
          },
          error: function (a) {           
          console.log(a);
            if(a.status==422){
              $.each(a.responseJSON.errors, function (i, v) {
                PNotify.error({
                  title: 'error',
                  text: v,
                })
              })          
            }else{
              PNotify.error({
                title: 'error',
                text: 'proses simpan data error kode error : '+a.status,
              })
            }      
          }
        })
      });
      
      $("#history-penerimaan-obat").on("click",".delete-penerimaan",function(){
        var dataID=$(this).attr('data-id');
        const token= $("meta[name='csrf-token']").attr("content");      
        Swal.fire({
          title: 'Yakin data akan dihapus ?',
          text: "pastikan anda benar ingin menghapus data ini",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Yes'
        }).then((result) => {
          if (result.isConfirmed) {
            $.ajax({
              url:datasite+'/penerimaanObat/'+dataID,
              type:'DELETE',
              data:{"id":dataID,"_token":token},
              dataType:'json',
              success:function(data){
                if(data.status===1){
                  Swal.fire({
                    title: 'Success',
                    text: data.message,
                    icon: 'success',
                    confirmButtonText: 'Ok'
                  }).then(()=>{
                    window.location.reload();
                  })
                }else{
                  Swal.fire({
                    title:'error',
                    text:data.message,
                    icon:'error'
                  })
                }
              }
            })         
          }
        })
      });
      
      $("#history-penerimaan-obat").on("click",".print-penerimaan",function(){
        var dataID=$(this).attr('data-id');
        var data_id_obat=$("#data_id_obat").val();
        
        const token= $("meta[name='csrf-token']").attr("content");      
        $.ajax({
          url:datasite+'/printpenerimaan/',
          type:'POST',
          data:{"id":dataID,"_token":token,'id_obat':data_id_obat},
          dataType:'json',
          beforeSend:function(){
            $("#main-load").removeClass('hidden');    
          },
          success:function(data){
            if(data.status===1){
              Swal.fire({
                title: 'Success',
                text: data.message,
                icon: 'success',
                confirmButtonText: 'Ok'
              }).then(()=>{
                window.location.reload();
              })
            }else{
              Swal.fire({
                title:'error',
                text:data.message,
                icon:'error'
              })
            }
          },
          complete:function(){
            $('#main-load').addClass('hidden');
          }
        })  
      });
      
      $("#printAllPenerimaanObat").on("click",function(){
        var dataID=$(this).attr('data-id');
        var data_id_obat=$("#data_id_obat").val();
        
        const token= $("meta[name='csrf-token']").attr("content");      
        $.ajax({
          url:datasite+'/printpenerimaanall/',
          type:'POST',
          data:{"id":dataID,"_token":token,'id_obat':data_id_obat},
          dataType:'json',
          beforeSend:function(){
            $("#main-load").removeClass('hidden');    
          },
          success:function(data){
            if(data.status===1){
              Swal.fire({
                title: 'Success',
                text: data.message,
                icon: 'success',
                confirmButtonText: 'Ok'
              }).then(()=>{
                window.location.reload();
              })
            }else{
              Swal.fire({
                title:'error',
                text:data.message,
                icon:'error'
              })
            }
          },
          complete:function(){
            $('#main-load').addClass('hidden');
          }
        })  
      });
      
     
      
      
      // data obat
      
      
      $("#form-add-obat").on("submit",function(e){
        e.preventDefault();
        var dataObat=$(this).serialize();
        $.ajax({
          url:datasite+'/obat',
          type:'POST',
          data:dataObat,
          dataType:'json',
          success:function(data){
            if(data.status===1){
              Swal.fire({
                title: 'Success',
                text: data.message,
                icon: 'success',
                confirmButtonText: 'Ok'
              }).then(()=>{
                window.location.href=datasite+'/obat';
              })
            }else{
              Swal.fire({
                title:'error',
                text:data.message,
                icon:'error'
              })
            }
          },
          error: function (a) {           
          console.log(a);
            if(a.status==422){
              $.each(a.responseJSON.errors, function (i, v) {
                PNotify.error({
                  title: 'error',
                  text: v,
                })
              })          
            }else{
              PNotify.error({
                title: 'error',
                text: 'proses simpan data error kode error : '+a.status,
              })
            }      
          }
        })
      });
      
      $("#formeditobat").on("submit",function(e){
        e.preventDefault();
        var dataObatUpdate=$(this).serialize();
        const id_obat=$("#edit_id_obat").val();
        $.ajax({
          url:datasite+'/obat/'+id_obat,
          type:'PUT',
          data:dataObatUpdate,
          dataType:'json',
          success:function(data){
            if(data.status===1){
              Swal.fire({
                title: 'Success',
                text: data.message,
                icon: 'success',
                confirmButtonText: 'Ok'
              }).then(()=>{
                window.location.reload();
              })
            }else{
              Swal.fire({
                title:'error',
                text:data.message,
                icon:'error'
              })
            }
          }
        })
      })
    
      $("#data-obat").on("click",".delete-obat",function(){
        var dataID=$(this).attr('data-id');
        const token= $("meta[name='csrf-token']").attr("content");      
        Swal.fire({
          title: 'Yakin data akan dihapus ?',
          text: "pastikan anda benar ingin menghapus data ini",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Yes'
        }).then((result) => {
          if (result.isConfirmed) {
            $.ajax({
              url:datasite+'/obat/'+dataID,
              type:'DELETE',
              data:{"id":dataID,"_token":token},
              dataType:'json',
              success:function(data){
                if(data.status===1){
                  Swal.fire({
                    title: 'Success',
                    text: data.message,
                    icon: 'success',
                    confirmButtonText: 'Ok'
                  }).then(()=>{
                    window.location.href=datasite+'/obat';
                  })
                }else{
                  Swal.fire({
                    title:'error',
                    text:data.message,
                    icon:'error'
                  })
                }
              }
            })         
          }
        })
      })
      
      $("#data-obat").on("click",".show-obat",function(){
        $('#modalMdTitle').html($(this).attr('title'));
        $('#modalMdContent').load($(this).attr('value'));
        $('#modalMd').modal('show');  
      });
      
      
      $("#data-obat").on("click",".edit-obat",function(){
        const idObat=$(this).attr('data-id');        
        $.ajax({
          url:`${datasite}/obat/${idObat}/edit`,
          type:'GET',
          dataType:'json',
          success:function(res){
            if(res.status===1){
              const {...dataObat}=res.data;
              $("#edit_id_obat").val(dataObat.id);
              $("#edit_kode").val(dataObat.kode);
              $("#edit_nama_obat").val(dataObat.nama_obat);
              $("#edit_jenis").val(dataObat.jenis);
              $("#edit_satuan").val(dataObat.satuan);
              $("#edit_harga").val(dataObat.harga);
              $("#edit_stok_awal").val(dataObat.stok_awal);
              $("#edit_sisa_stok").val(dataObat.sisa_stok);
              $("#edit_status").val(dataObat.status);
              $("#edit_keterangan").val(dataObat.keterangan);
            }else{
              Swal.fire({title: result.metaData.message,
                text: "pengambilan data obat gagal dilakukan, silahkan refresh halaman ..!",
                icon: 'error'});
            }
          }
        })               
      });
    
    })
    