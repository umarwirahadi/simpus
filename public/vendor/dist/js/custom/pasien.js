
$(document).ready(function () {
  var datasite = $('body').attr('data-site');
  const token = $("meta[name='csrf-token']").attr("content");

  $("#cari_wilayah").autocomplete({
    source: function (req, res) {
      $.ajax({
        url: datasite + '/cari_wilayah',
        type: 'get',
        dataType: 'json',
        data: {
          search: req.term,
          _token: token
        }, success: function (data) {
          res(data);
        }
      });
    },
    minLength: 3,
    select: function (event, ui) {
      $("#kelurahan").val(ui.item.kel);
      $("#kecamatan").val(ui.item.kec);
      $("#kab_kota").val(ui.item.kotakab);
      $("#provinsi").val(ui.item.prov);
      $("#pos").val(ui.item.pos);
      return false
    }
  });

$("#riwayat-kunjungan").DataTable();
$("#family-folder").DataTable();

$("#data-pasien").DataTable({
    processing: true,
    serverSide: true,
    ajax: datasite + "/pasien_server_side",
    columns: [
      { data: 'DT_RowIndex', name: 'DT_RowIndex',orderable: false, searchable: false },
      { data: 'nik', name: 'nik' },
      { data: 'no_rm', name: 'no_rm' },
      { data: 'nama_lengkap', name: 'nama_lengkap' },
      { data: 'alamat', name: 'alamat' },
      { data: 'hp', name: 'hp' },
      { data: 'aksi', name: 'aksi'}
    ],
    "buttons": ["excel", "colvis"],
    initComplete: function () {
      var input = $('.dataTables_filter input').unbind(),
        self = this.api(),
        $searchButton = $('<button class="btn btn-primary btn-sm m-2">')
          .text('Cari')
          .click(function () {
            self.search(input.val()).draw();
          }),
        $clearButton = $('<button class="btn btn-warning btn-sm">')
          .text('Ulang')
          .click(function () {
            input.val('');
            $searchButton.click();
          })
      $('.dataTables_filter').append($searchButton, $clearButton);
    },
    "responsive": true, "lengthChange": true, "autoWidth": true, "searching": true, "filter": true, "info": true,
    "language": {
      "lengthMenu": " _MENU_ data",
      "zeroRecords": "Data pasien kosong",
      "info": "Showing page _PAGE_ of _PAGES_",
      "infoEmpty": "Data pasien tidak ditemukan",
      "infoFiltered": "(filtered from _MAX_ total records)"
    },
    scrollY: 500,
    scroller: {
      loadingIndicator: true
    }
  });


  $("#form-pasien").on("submit", function (e) {
    e.preventDefault();
    var dataPasien = $(this).serialize();

    $.ajax({
      url: datasite + '/pasien',
      type: 'POST',
      data: dataPasien,
      dataType: 'json',
      success: function (data) {
        console.log(data);
          Swal.fire({
            title: data.status===1?'Success':'error',
            text: data.message,
            icon: data.status===1?'success':'error',
            confirmButtonText: 'Ok'
          }).then(() => {
            // window.location.href = datasite + '/pasien';
          })
      },
      error: function (a) {
        if(a.status==422){
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
        }else{
            // window.location.href = datasite + '/pasien';
            console.log(a);
          }
      }
    });
  });

  $("#form-update-pasien").on("submit", function (e) {
    e.preventDefault();
    var dataPasien = $(this).serialize();
    var url = $(this).attr('data-url');
    console.log(url);
    $.ajax({
      url: url,
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
            window.location.href = datasite + '/pasien';
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

  $("body").on("click", ".hapuspasien",function () {
    var dataID = $(this).data('id');
    const token = $("meta[name='csrf-token']").attr("content");
    Swal.fire({
      title: 'Yakin data pasien akan dihapus ?',
      text: "menghapus data pasien akan menghilangkan seluruh data pasien, berpotensi kehilangan data dan ketidak akuratan proses pelaporan",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Yes'
    }).then((result) => {
      if (result.isConfirmed) {
        $.ajax({
          url: datasite + '/pasien/' + dataID,
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
                window.location.href = datasite + '/pasien';
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


  function convertdate(val) {
    var str = val;
    var tgl = str.substr(0,2);
    var bln = str.substr(3,2);
    var tahun = str.substr(6,4);
    var tgl_lahir=tahun.concat("-",bln,"-",tgl);
    return tgl_lahir;
  }

$("#find-bpjs").on("click",function(){
    const find_id=$('#no_bpjs').val();
    $.ajax({
    url:datasite+'/caribpjs',
    type:'POST',
    data:{nobpjs:find_id,_token: token},
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
        $("#nomorAsuransiPeserta").val(data.asuransi.noAsuransi);
        $("#pstprol").val(data.pstProl);
        $("#pstprb").val(data.pstPrb);
        $("#ketAktif").val(data.ketAktif);
        $("#aktif").val(data.aktif);

        }
      })
    }else{
      Swal.fire({title: result.metaData.message,
      text: "pengambilan data ke pcare gagal dilakukan, pastikan ID benar atau silahkan refresh halaman ..!",
      icon: 'error'});
    }
    }
    })
});


$("#data-pasien").on("click",".print-barcode-pasien",function(){
  var id_pasien=$(this).attr('data-id');
  $.ajax({
    url:datasite+'/barcode-pasien',
    type:'GET',
    data:{id_pasien:id_pasien,_token: token},
    dataType:'json',
    beforeSend:function(){
      $("#main-load").removeClass('hidden');
    },
    success:function(data){
    console.log(data.data);
      $("#label_no_rm").html(data.data.no_rm);
      $("#label_nama_lengkap").html(data.data.nama_lengkap);
      $("#label_nik").html(data.data.nik+'/'+data.data.no_kk);
      $("#label_bpjs").html(data.data.no_bpjs);
      $("#label_id_pasien").val(data.data.id);
      $("#barcode-id").empty();
      $("#barcode-id").append(data.databarcode);
      $("#form-show-barcode").modal('show');

    },error:function(){
      Swal.fire({title: 'Error',
        text: "Proses cetak barcode pasien gagal",
        icon: 'error'});
    },complete:function(){
      $('#main-load').addClass('hidden');
    }
    });
});

$("#print-label-data").on("click",function(){
const id_pas=$("#label_id_pasien").val();

var printContent = document.getElementById("printareaID");
    var WinPrint = window.open('', '', 'width=900,height=300');
    WinPrint.document.write(printContent.innerHTML);
    WinPrint.document.close();
    WinPrint.focus();
    WinPrint.print();
    WinPrint.close();

// $.ajax({
//   url:datasite+'/barcode-pasien',
//   type:'GET',
//   data:{id_pasien:id_pas,_token: token},
//   dataType:'json',
//   beforeSend:function(){
//     $("#main-load").removeClass('hidden');
//   },
//   success:function(data){
//   const {data_pasien}=data.data;
//   console.log(data_pasien);
//   printJS({
//     printable:[data.databarcode],
//     // properties: ['agama','aktif_bpjs','alamat','bulan','email'],
//     type: 'image'
//   })

//   },error:function(){
//     Swal.fire({title: 'Error',
//       text: "Proses cetak barcode pasien gagal",
//       icon: 'error'});
//   },complete:function(){
//     $('#main-load').addClass('hidden');
//   }
//   });
  // printJS({
  //   printable:
  // })
});

$("#data-pasien").on("click",".cetak-kib",function(){
  var id_pasien=$(this).attr('data-id');

  $.ajax({
    url:datasite+'/cetak-kib-pasien',
    type:'GET',
    data:{id_pasien:id_pasien,_token: token},
    dataType:'json',
    beforeSend:function(){
      $("#main-load").removeClass('hidden');
    },
    success:function(data){
    console.log(data);
    $("#barcode-id").empty();
    $("#barcode-id").append(data.databarcode);


    },
    // error:function(){
    //   Swal.fire({title: 'Error',
    //     text: "Proses cetak KIB gagal",
    //     icon: 'error'});

    // },
    complete:function(){
      $('#main-load').addClass('hidden');
    }
    });
  });

})
