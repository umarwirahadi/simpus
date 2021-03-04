$(document).ready(function(){
    var datasite=$('body').attr('data-site');
    const token = $("meta[name='csrf-token']").attr("content");

 $("#data-riwayat").DataTable();
 $("#data-pendataan").DataTable();
 $("#data-pemeriksaan").DataTable();

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
    $("#datanull").blink();    
},200)



})  
})  