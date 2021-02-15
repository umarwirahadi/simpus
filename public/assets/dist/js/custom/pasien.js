$(document).ready(function () {
  var datasite = $('body').attr('data-site');
  const token = $("meta[name='csrf-token']").attr("content");

  $('#status_hubungan').select2({ theme: 'bootstrap4' }); $('#jenis_kelamin').select2({ theme: 'bootstrap4' }); $('#agama').select2({
    theme: 'bootstrap4'
  }); $('#gol_darah').select2({ theme: 'bootstrap4' }); $('#status_marital').select2({ theme: 'bootstrap4' }); $('#pendidikan_terakhir').select2({
    theme: 'bootstrap4'
  }); $('#suku').select2({ theme: 'bootstrap4' }); $('#pekerjaan').select2({ theme: 'bootstrap4' }); $('#status_pasien').select2({
    theme: 'bootstrap4'
  }); $('#status').select2({ theme: 'bootstrap4' }); $('#kategori').select2({ theme: 'bootstrap4' });



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
      { data: 'DT_RowIndex', name: 'DT_RowIndex' },
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
    scrollY: 300,
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

  $("#form-update-pasien").on("submit", function (e) {
    e.preventDefault();
    var dataPasien = $(this).serialize();
    var url = $(this).attr('data-url');

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



})