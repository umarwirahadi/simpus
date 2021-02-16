$(document).ready(function(){
  var datasite=$('body').attr('data-site');
  const token = $("meta[name='csrf-token']").attr("content");
 

  
    $("#example1").DataTable({
        "responsive": true, "lengthChange": true, "autoWidth": true,
        "buttons": ["excel", "colvis"]
      }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');

  $(document).keydown(function(e){
    if(e.keyCode==113){
      window.location.href='pendaftaran/create';
    }
  });

  $('#poli').select2({
    theme: 'bootstrap4'
  });



  $("#cari_pasien").autocomplete({
    source: function (req, res) {
      $.ajax({
        url: datasite + '/cari_pasien',
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
      $("#nik").val(ui.item.nik);
      $("#no_rm").val(ui.item.no_rm);
      $("#nama_lengkap").val(ui.item.nama_lengkap);
      $("#tanggal_lahir").val(ui.item.tanggal_lahir);
      $("#usia").val(ui.item.tahun+' tahun '+ui.item.bulan+' bulan '+ui.item.hari+' Hari');
      $("#jk").val(ui.item.jenis_kelamin);
      $("#usia_tahun").val(ui.item.tahun);
      $("#usia_bulan").val(ui.item.bulan);
      $("#usia_hari").val(ui.item.hari);
      $("#hp").val(ui.item.hp);
      $("#alamat").val(ui.item.alamat);
      // $("#pos").val(ui.item.pos);
      return false
    }
  });

  $("#form-pendaftaran-pasien").on("submit", function (e) {
    e.preventDefault();
    var datapendaftaran = $(this).serialize();
    console.log(datapendaftaran);

    $.ajax({
      url: datasite + '/pendaftaran',
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

})