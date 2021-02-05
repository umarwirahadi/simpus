$(document).ready(function () {
  var datasite=$('body').attr('data-site');
  var Toast = Swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 5000
  });

  
    
    $('#data-pasien').DataTable({
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": true,
    "language": {
      "lengthMenu": " _MENU_ data",
      "zeroRecords": "Data pasien kosong",
      "info": "Showing page _PAGE_ of _PAGES_",
      "infoEmpty": "Data pasien tidak ditemukan",
      "infoFiltered": "(filtered from _MAX_ total records)"
    }
    });


    $('#status').select2({
        theme: 'bootstrap4'
    });

    $('#kategori').select2({
        theme: 'bootstrap4'
    });

    $("#form-pasien").on("submit",function(e){
      e.preventDefault();
      var dataPasien=$(this).serialize();
      $.ajax({
        url:datasite+'/pasien',
        // method:'POST',
        type:'POST',
        data:dataPasien,
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
              window.location.href=datasite+'/pasien';
            })
          }else{
            Swal.fire({
              title:'error',
              text:data.message,
              icon:'error'
            })
          }
        },error:function(a){
          // console.log(a.responseJSON);
          $.each(a.responseJSON.errors,function(i,v){
            console.log(v[i])
          })
          // const b=Object.values(a.responseJSON.errors);
          // console.log(b);
          // b.forEach
          
          if(a.status==422){
              
            Toast.fire({
              icon: 'error',
              title: pesannya.message
            })

            // alert('error euy')
          }
          // 422:function(data){
          //   const pesannya=data.responseJSON;            
          //   alert(pesannya.message)
          
          // }
        }
      })
    })
  })
  