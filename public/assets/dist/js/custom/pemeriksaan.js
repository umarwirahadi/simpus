$(document).ready(function(){
    var datasite=$('body').attr('data-site');
    const token = $("meta[name='csrf-token']").attr("content");

 $("#data-riwayat").DataTable({  
  "bPaginate": false,  
  "bInfo": true,  
  "bFilter": false,
  "bAutoWidth": false,
  "aoColumns" : [
      { sWidth: '5px' },
      { sWidth: '50px' },
      { sWidth: '120px' },
      { sWidth: '30px' }
  ]  
});
 $("#data-pendataan").DataTable();
 $("#data-pemeriksaan").DataTable();

// simpan data pemeriksaan
$("#frmpemeriksaan").on("submit", function (e) {
    e.preventDefault();
    var datapendaftaran = $(this).serialize();
    $.ajax({
      url: datasite + '/pemeriksaan',
      type: 'POST',
      data: datapendaftaran,
      dataType: 'json',
      success: function (data) {
        if (data.status === 1) {
          Swal.fire({
            title: 'Success',
            text: data.message,
            icon: 'success',
            confirmButtonText: 'Ok'
          }).then((data2) => {
            // window.location.href = datasite + '/pendaftaran';
            console.log(data2);
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
          $.each(a.responseJSON.data, function (i, v) {
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


$("#formsetpoli").on("submit",function(e){
    e.preventDefault();
    var dataform=$("#formsetpoli").serialize();
    $.ajax({
        url: datasite + '/setcookiespoli',
        type: 'POST',
        data: dataform,
        dataType: 'json',
        success: function (data) {
            console.log(data);
            Swal.fire({
                title: data.status===1?'Success':'error',
                text: data.message,
                icon: data.status===1?'success':'error',
                confirmButtonText: 'Ok'
              }).then(() => {                  
              window.location.href = datasite + '/pemeriksaan';
              })
        }
})

setInterval(function(){
    var stat=1
    $("#datanull").visi
},200)



})  
})  