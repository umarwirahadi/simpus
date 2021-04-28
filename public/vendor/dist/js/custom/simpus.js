$(document).ready(function () {
    var datasite=$('body').attr('data-site');
    const token = $("meta[name='csrf-token']").attr("content");

  
      $('#data-item').DataTable({
        "paging": true,
        "lengthChange": true,
        "searching": true,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
      });
      $('#data-faskes').DataTable({
        "paging": true,
        "lengthChange": true,
        "searching": true,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
      });
  
  
    //   $('#status').select2({
    //       theme: 'bootstrap4'
    //   });
  
      $('#kategori').select2({
          theme: 'bootstrap4'
      });
  
  
      $("#form-item-update").on("submit",function(e){
        e.preventDefault();
        var url=$(this).attr('data-url');
        var dataPoli=$(this).serialize();
        $.ajax({
          url:url,
          // method:'POST',
          type:'PUT',
          data:dataPoli,
          dataType:'json',
          success:function(data){
            console.log(data);
            if(data.status===1){
              Swal.fire({
                title: 'Success',
                text: data.message,
                icon: 'success',
                confirmButtonText: 'Ok'
              }).then(()=>{
                window.location.href=datasite+'/item';
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
  
      $("#data-item-pcare").on("click",".delete-data",function(){
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
              url:datasite+'/settingpcare/'+dataID,
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
                    window.location.href=datasite+'/settingpcare';
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

      /* js for setting url end point bridging proses to pcare bpjs*/
      $("#data-endpoint").DataTable();

      $("#create-form-endpoint").on("submit", function (e) {
        e.preventDefault();
        var dataForm = $(this).serialize();
        $.ajax({
          url: datasite + '/listpcare',
          type: 'POST',
          data: dataForm,
          dataType: 'json',
          success: function (data) {
            if (data.status === 1) {
              Swal.fire({
                title: 'Success',
                text: data.message,
                icon: 'success',
                confirmButtonText: 'Ok'
              }).then((data2) => {
                window.location.href = datasite + '/listpcare';                
              })
            } else {
              Swal.fire({
                title: 'error',
                text: data.message,
                icon: 'error'
              })
            }
          },
          error: function (a) {
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
                text: 'proses simpan data error',
              })
            }      
          }
        });
      });
      
      $("#data-endpoint").on("click", ".delete-record",function () {
        var dataID = $(this).data('id');
        const token = $("meta[name='csrf-token']").attr("content");
        console.log(dataID);
        Swal.fire({
          title: 'Yakin data akan dihapus ?',
          text: "menghapus data akan  berpotensi kehilangan data dan ketidak akuratan proses lainnya",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Yes'
        }).then((result) => {
          if (result.isConfirmed) {
            $.ajax({
              url: datasite + '/listpcare/' + dataID,              
              type: 'DELETE',
              data: { "id": dataID, "_token": token },
              dataType: 'json',
              success: function (data) {
                if (data.status === 1) {
                  Swal.fire({
                    title: 'Success',
                    text: data.message,
                    icon: 'success',
                    confirmButtonText: 'Ok'
                  }).then(() => {
                    window.location.href = datasite + '/listpcare';
                  })
                } else {
                  Swal.fire({
                    title: 'error',
                    text: data.message,
                    icon: 'error'
                  })
                }
              }
            })
          }
        })
      });
      
      $("#edit-form-endpoint").on("submit", function (e) {
        e.preventDefault();
        var dataPasien = $(this).serialize();        
        const dataID=$("#idurl").val();
        $.ajax({
          url: datasite+'/listpcare/'+dataID,
          type: 'PUT',
          data: dataPasien,
          dataType: 'json',
          success: function (data) {
            if (data.status === 1) {
              Swal.fire({
                title: 'Success',
                text: data.message,
                icon: 'success',
                confirmButtonText: 'Ok'
              }).then(() => {
                window.location.href = datasite + '/listpcare';
              })
            } else {
              Swal.fire({
                title: 'error',
                text: data.message,
                icon: 'error'
              })
            }
          },
          error: function (a) {
            let temp = [];
            $.each(a.responseJSON.errors, function (i, v) {
              temp.push(v)
            })
            var bc = temp.toString();
            var cb = bc.split(',')
            $.each(cb, function (index, value) {
              PNotify.error({
                title: 'error',
                text: value,
              })
            })
          }
    
        });
      });
      
      
      
      /* provider */
      
      $("#form-provider").on("submit",function(e){
        e.preventDefault();
        var dataForm=$(this).serialize();
        $.ajax({
          url:datasite+'/faskes',
          type:'POST',
          data:dataForm,
          dataType:'json',
          success:function(data){
            console.log(data);
            if(data.status===1){
              Swal.fire({
                title: 'Success',
                text: data.message,
                icon: 'success',
                confirmButtonText: 'Ok'
              }).then(()=>{
                window.location.href=datasite+'/faskes';
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
        
      });
      
      $("#data-faskes").on("click",".delete-data",function(){
          const dataID=$(this).attr('id');          
          Swal.fire({
            title: 'Yakin data  akan dihapus ?',
            text: "menghapus data, berpotensi kehilangan data dan ketidak akuratan proses pelaporan",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes'
          }).then((result) => {
            if (result.isConfirmed) {
              $.ajax({
                url:datasite+'/faskes/'+dataID,
                type:'DELETE',
                data:{"id":dataID,"_token":token},              
                dataType:'json',
                success:function(data){
                  console.log(data);
                  if(data.status===1){
                    Swal.fire({
                      title: 'Success',
                      text: data.message,
                      icon: 'success',
                      confirmButtonText: 'Ok'
                    }).then(()=>{
                      window.location.href=datasite+'/faskes';
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

    })
    