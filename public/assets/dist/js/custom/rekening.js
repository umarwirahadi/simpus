$(document).ready(function () {
  var datasite=$('body').attr('data-site');
  
  $('#jenis_biaya').select2({
    theme: 'bootstrap4'
  });
  $('#satuan').select2({
    theme: 'bootstrap4'
  });
  $('#status').select2({
    theme: 'bootstrap4'
  });
  $('#jenis').select2({
    theme: 'bootstrap4'
  });



    $('#data-rekening').DataTable({
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    }).buttons().container().appendTo('#data-rekening .col-md-6:eq(0)');


    $('#status').select2({
        theme: 'bootstrap4'
    });

    $('#kategori').select2({
        theme: 'bootstrap4'
    });


    $("#form-rekening").on("submit",function(e){
      e.preventDefault();
      var url=$(this).attr('data-url');
      var datarekening=$(this).serialize();
      $.ajax({
        url:datasite+'/rekening',
        // method:'POST',
        type:'POST',
        data:datarekening,
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
              window.location.href=datasite+'/rekening';
            })
          }else{
            Swal.fire({
              title:'Error..!',
              text:data.message,
              icon:'error'
            }).then(()=>{
              $("#kode_rekening").focus();
            })
          }
        }
      })
    })

    
  $(".delete-data").on("click",function(){
    var dataID=$(this).attr('id');
    const token= $("meta[name='csrf-token']").attr("content");
  
    Swal.fire({
      title: 'Yakin data rekening akan dihapus ?',
      text: "pastikan anda benar ingin menghapus data ini",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Yes'
    }).then((result) => {
      if (result.isConfirmed) {
        $.ajax({
          url:datasite+'/rekening/'+dataID,
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
                window.location.href=datasite+'/rekening';  
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

  $("#form-rekening-update").on("submit",function(e){
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
        if(data.status===1){
          Swal.fire({
            title: 'Success',
            text: data.message,
            icon: 'success',
            confirmButtonText: 'Ok'
          }).then(()=>{
            window.location.href=datasite+'/rekening';
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

  })
  