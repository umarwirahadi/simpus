$(document).ready(function () {
  var datasite=$('body').attr('data-site');

    $('#data-item').DataTable({
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });


    $('#status').select2({
        theme: 'bootstrap4'
    });

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

    $("#data-item").on("click",".delete-data",function(){
      var dataID=$(this).attr('id');
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
            url:datasite+'/item/'+dataID,
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
  
          Swal.fire(
            'terhapus',
            'data berhasil dihapus',
            'success'
          )
        }
      })
    })
  })
  