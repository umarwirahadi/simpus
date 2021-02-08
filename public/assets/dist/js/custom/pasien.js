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
        },
        error:function(a){
          
          let temp=[];
          $.each(a.responseJSON.errors,function(i,v){            
            temp.push(v)
          })

          var bc=temp.toString();
          var cb=bc.split(',')
          

          
          if(a.status==422){              
              $.each(cb,function(a,b){
                new PNotify({
                  text: b,
                  type: 'success',
                  styling: 'bootstrap3'
                });
            })
          }
        }

      });
    });
  })
  