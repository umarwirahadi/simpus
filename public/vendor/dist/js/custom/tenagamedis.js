$(document).ready(function () {
    var datasite=$('body').attr('data-site');
  
      $('#data-tenagamedis').DataTable({
        "paging": true,
        "lengthChange": true,
        "searching": true,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
      });
  

  
  
      $("#post-tenagamedis").on("submit",function(e){
        e.preventDefault();
        var dataPoli=$(this).serialize();
        $.ajax({
          url:datasite+'/tenagamedis',
          type:'POST',
          data:dataPoli,
          dataType:'json',
          success:function(data){
            if(data.status===1){
              Swal.fire({
                title: 'Success',
                text: data.message,
                icon: 'success',
                confirmButtonText: 'Ok'
              }).then(()=>{
                window.location.href=datasite+'/tenagamedis';
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
      
      $("#update-tenagamedis").on("submit",function(e){
        e.preventDefault();
        var dataTenaga=$(this).serialize();
        var dataID=$("#data_id").val();
        console.log(dataID);
        $.ajax({
          url:datasite+'/tenagamedis/'+dataID,
          type:'PUT',
          data:dataTenaga,
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
                window.location.href=datasite+'/tenagamedis';
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
  
      $("#data-tenagamedis").on("click",".delete-data",function(){
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
              url:datasite+'/tenagamedis/'+dataID,
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
      
      $("#get-tenaga-medis").on("click",function(e){
        e.preventDefault();
        var formData=$(this).serialize();
        $.ajax({
        url:datasite+'/getTenagaMedis',
        type:'GET',
        dataType:'json',
        beforeSend:function(){
          $("#main-load").removeClass('hidden');    
        },
        success:function(result){
          if(result.status==1){                   
            Swal.fire({
              title: 'sukses',
              text: result.message,
              icon: 'success',
              confirmButtonText: 'Ok'
            }) 
        }else{
          Swal.fire({
            title: 'error',
            text: result.message,
            icon: 'error',
            confirmButtonText: 'Ok'
          }); 
        }   
        },complete:function(){
          $('#main-load').addClass('hidden');
        },
        error:function(err){
        console.log(err);
          Swal.fire({
            title: 'error',
            text: 'Server error, proses dibatalkan'+err,
            icon: 'error',
            confirmButtonText: 'Ok'
          }); 
        }
        })
      });
    })
    