$(document).ready(function () {
    var datasite=$('body').attr('data-site');
    const token= $("meta[name='csrf-token']").attr("content");


  $("#kelurahan").autocomplete({
    source:function(req,res){
      $.ajax({
        url:datasite+'/cari_wilayah',
        type:'get',
        dataType:'json',
        data:{
          search:req.term,
          _token:token
        },success:function(data){
          res(data);
        }
      });
    },
    minLength:3,
    select:function(event,ui){
      $("#kelurahan").val(ui.item.kel);
      $("#kecamatan").val(ui.item.kec);
      $("#kota_kab").val(ui.item.kotakab);
      $("#provinsi").val(ui.item.prov);
      $("#pos").val(ui.item.pos);
      return false
    }
  });



      $("#form-profile").on("submit",function(e){
        e.preventDefault();
        var dataPasien=$(this).serialize();
        $.ajax({
          url:datasite+'/puskesmas',
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
          error:function(a){
            let temp=[];
            $.each(a.responseJSON.errors,function(i,v){
              temp.push(v)
            })
            var bc=temp.toString();
            var cb=bc.split(',')
            $.each(cb,function(index,value){
              PNotify.error({
                title: 'error',
                text: value,
              })
          })
          }

        });
      });
    })
