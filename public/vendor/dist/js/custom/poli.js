$(document).ready(function () {
var datasite=$('body').attr('data-site');
const token = $("meta[name='csrf-token']").attr("content");

  $('#data-poli').DataTable({
    "paging": true,
    "lengthChange": true,
    "searching": true,
    "ordering": true,
    "info": true,
    "autoWidth": false,
    "responsive": true
  });

  $("#form-poli-update").on("submit",function(e){
    e.preventDefault();
    var url=$(this).attr('data-url');
    var dataPoli=$(this).serialize();
    $.ajax({
      url:url,
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
            window.location.href=url;
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
          $.each(a.responseJSON.data, function (i, v) {
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
  })

  $(".delete-data").on("click",function(){
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
          url:datasite+'/'+dataID,
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
                window.location.href=datasite;
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

  $("#get-poli").on("click",function(){
    $.ajax({
    url:datasite+'/get-poli-pcare',
    type:'POST',
    data:{_token: token},
    dataType:'json',
    success:function(result){
    console.log(result);
    if(result.metaData.code==200){
      Swal.fire({
        title: 'pasien BPJS ditemukan',
        text: "pilih yes untuk mengisi data",
        icon: 'success',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes'
      })
      .then((result1) => {
        if (result1.isConfirmed) {
        const {...data}=result.response;
        console.log(data);
        $("#nama_lengkap").val(data.nama)
        $("#hp").val(data.noHP)
        $(`#status_hubungan option[value=${data.hubunganKeluarga}]`).attr('selected','selected');
        $("#nik").val(data.noKTP)
        $(`#jenis_kelamin option[value=${data.sex}]`).attr('selected','selected');
        var tgllahir = convertdate(data.tglLahir);
        $("#tanggal_lahir").val(tgllahir);
        $("#tglMulaiAktif").val(data.tglMulaiAktif);
        $("#tglAkhirBerlaku").val(data.tglAkhirBerlaku);
        $("#kdProvider").val(data.kdProviderPst.kdProvider);
        $("#nmProvider").val(data.kdProviderPst.nmProvider);
        $("#kdProviderGigi").val(data.kdProviderGigi.kdProvider);
        $("#nmProviderGigi").val(data.kdProviderGigi.nmProvider);
        $("#kdKelas").val(data.jnsKelas.kode);
        $("#namaKelas").val(data.jnsKelas.nama);
        $("#kodeJenisPeserta").val(data.jnsPeserta.kode);
        $("#namaJenisPeserta").val(data.jnsPeserta.nama);
        $("#kodeAsuransiPeserta").val(data.asuransi.kdAsuransi);
        $("#namaAsuransiPeserta").val(data.asuransi.nmAsuransi);
        $("#nomorAsuransiPeserta").val(data.asuransi.noAsuransi);
        }
      })
    }else{
      Swal.fire({title: result.metaData.message,
      text: "pengambilan data ke pcare gagal dilakukan, pastikan ID benar atau silahkan refresh halaman ..!",
      icon: 'error'});
    }
    }
    })
})


})
