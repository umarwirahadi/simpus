$(document).ready(function(){
  var datasite=$('body').attr('data-site');
  const token = $("meta[name='csrf-token']").attr("content");

  $('#status_hubungan').select2(); $('#jenis_kelamin').select2(); $('#agama').select2(); $('#gol_darah').select2(); $('#status_marital').select2(); $('#pendidikan_terakhir').select2(); $('#suku').select2(); $('#pekerjaan').select2(); $('#status_pasien').select2(); $('#status').select2(); $('#kategori').select2();
 
  $("#pendaftaran").DataTable({
    processing: true,
    serverSide: true,
    ajax: datasite + "/fetchpendaftaranbydate",
    columns: [
      { data: 'DT_RowIndex', name: 'DT_RowIndex' },
      { data: 'no_rm', name: 'no_rm' },
      { data: 'nama_lengkap', name: 'nama_lengkap' },
      { data: 'no_pendaftaran', name: 'no_pendaftaran' },
      { data: 'noantrian2', name: 'noantrian2' },
      { data: 'alamat', name: 'alamat' },
      { data: 'nama_poli', name: 'nama_poli' },
      { data: 'aksi', name: 'aksi',searchable:false,orderable:false}
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
      "zeroRecords": "Data Pendaftaran kosong",
      "info": "Showing page _PAGE_ of _PAGES_",
      "infoEmpty": "Data Pendaftaran tidak ditemukan",
      "infoFiltered": "(filtered from _MAX_ total records)"
    },
    scrollY: 300,
    scroller: {
      loadingIndicator: true
    }
  });


  
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
  $('#cara_bayar').select2({
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
      $("#nik2").val(ui.item.nik);
      $("#no_rm").val(ui.item.no_rm);
      $("#nama_lengkap2").val(ui.item.nama_lengkap);
      $("#tanggal_lahir").val(ui.item.tanggal_lahir);
      $("#usia").val(ui.item.tahun+' tahun '+ui.item.bulan+' bulan '+ui.item.hari+' Hari');
      $("#jk").val(ui.item.jenis_kelamin==='L'?'Laki-laki':'Perempuan');
      $("#usia_tahun").val(ui.item.tahun);
      $("#usia_bulan").val(ui.item.bulan);
      $("#usia_hari").val(ui.item.hari);
      $("#hp2").val(ui.item.hp);
      $("#alamat2").val(ui.item.alamat);
      $("#id_pasien2").val(ui.item.value);
      return false
    }
  });

  $("#form-pendaftaran-pasien").on("submit", function (e) {
    e.preventDefault();
    var datapendaftaran = $(this).serialize();
    // console.log(datapendaftaran);

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
          }).then((data2) => {
            // window.location.href = datasite + '/pendaftaran';
            console.log(data2);
            $("#cetak-retribusi").modal();
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

  $("#form-pasien-baru-modal").on("submit", function (e) {
    e.preventDefault();
    var dataPasien = $(this).serialize();
    const idpas=$("#id_pasien").val();
    if(idpas==null){
      $.ajax({
        url: datasite + '/pasien',
        type: 'POST',
        data: dataPasien,
        dataType: 'json',
        success: function (data) {
          console.log(data);
          $("#nik2").val(data.data[0].nik);
          $("#no_rm").val(data.data[0].no_rm);
          $("#nama_lengkap2").val(data.data[0].nama_lengkap);
          $("#tanggal_lahir").val(data.data[0].tanggal_lahir);
          $("#usia").val(data.data[0].tahun+' tahun '+data.data[0].bulan+' bulan '+data.data[0].hari+' Hari');
          $("#jk").val(data.data[0].jenis_kelamin);
          $("#usia_tahun").val(data.data[0].tahun);
          $("#usia_bulan").val(data.data[0].bulan);
          $("#usia_hari").val(data.data[0].hari);
          $("#hp2").val(data.data[0].hp);
          $("#alamat2").val(data.data[0].alamat);
          $("#id_pasien2").val(data.data[0].id);
            Swal.fire({
              title: data.status===1?'Success':'error',
              text: data.message,
              icon: data.status===1?'success':'error',
              confirmButtonText: 'Ok'
            }).then(() => {
              $("#addnewpasien").modal('hide');
            })         
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
          // if(a.status==422){
          //   let temp = [];
          //   $.each(a.responseJSON.errors, function (i, v) {
          //     temp.push(v)
          //   })
          //   var bc = temp.toString();
          //   var cb = bc.split(',')
          //   $.each(cb, function (index, value) {
          //     PNotify.error({
          //       title: 'error',
          //       text: value,
          //     })
          //   })
          // }else{          
          //     // window.location.href = datasite + '/pasien';
          //     console.log(a);
          //   }      
        }
      });

    }else{
      $.ajax({
        url: datasite + '/pasien/'+idpas,
        type: 'PUT',
        data: dataPasien,
        dataType: 'json',
        success: function (data) {
          $("#nik2").val(data.data[0].nik);
          $("#no_rm").val(data.data[0].no_rm);
          $("#nama_lengkap2").val(data.data[0].nama_lengkap);
          $("#tanggal_lahir").val(data.data[0].tanggal_lahir);
          $("#usia").val(data.data[0].tahun+' tahun '+data.data[0].bulan+' bulan '+data.data[0].hari+' Hari');
          $("#jk").val(data.data[0].jenis_kelamin);
          $("#usia_tahun").val(data.data[0].tahun);
          $("#usia_bulan").val(data.data[0].bulan);
          $("#usia_hari").val(data.data[0].hari);
          $("#hp2").val(data.data[0].hp);
          $("#alamat2").val(data.data[0].alamat);
          $("#id_pasien2").val(data.data[0].id);
            Swal.fire({
              title: data.status===1?'Success':'error',
              text: data.message,
              icon: data.status===1?'success':'error',
              confirmButtonText: 'Ok'
            }).then(() => {
              $("#addnewpasien").modal('hide');
            })         
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
    }
   
  });

  $("body").on("click",".data-pendaftaran",function(){
    var data_id=$(this).data('id');
    $.ajax({
      url:datasite+'/pendaftaran/'+data_id,
      type:'GET',
      dataType:'json',
      success:function(data){
        $("#a1").html(data.data.no_pendaftaran);
        $("#a3").html(data.data.noantrian2);
        $("#a4").html(data.data.no_rm);
        $("#a5").html(data.data.nama_lengkap+' / '+data.data.jenis_kelamin+' / '+data.data.usia_tahun+' tahun '+data.data.usia_bulan+' bulan '+data.data.usia_hari+' hari');
        $("#a5a").html(data.data.alamat+' RT. '+data.data.rt+' RW. '+data.data.rw);
        $("#a6").html(data.data.nokwitansi==null?'belum':'sudah');
        $("#a7").html(data.data.nama_poli);
        $("#a8").html(data.data.deskripsi);
        // $("#a4").html(data.data.status===1?'Aktif':'Tidak aktif');
        // $("#a5").html(data.data.deskripsi);
        $("#form-pendaftaran").modal(); 
      }
    })
  })


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



  $("#nik").autocomplete({
    source: function (req, res) {
      $.ajax({
        url: datasite + '/cari_pasienbynik',
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
    minLength: 5,
    select: function (event, ui) {      
      // console.log(ui);
    $("#id_pasien").val(ui.item.value);
    $("#nik").val(ui.item.nik);
    $("#no_kk").val(ui.item.no_kk);
    $("#status_hubungan").val(ui.item.status_hubungan);
    $("#no_bpjs").val(ui.item.no_bpjs);
    $("#no_rm").val(ui.item.no_rm);
    $("#no_rm_lama").val(ui.item.no_rm_lama);
    $("#nama_lengkap").val(ui.item.nama_lengkap);
    $("#jenis_kelamin").val(ui.item.jenis_kelamin);
    $("#tempat_lahir").val(ui.item.tempat_lahir);
    $("#tanggal_lahir").val(ui.item.tanggal_lahir);
    $("#agama").val(ui.item.agama);
    $("#gol_darah").val(ui.item.gol_darah);
    $("#hp").val(ui.item.hp);
    $("#telp").val(ui.item.telp);
    $("#email").val(ui.item.email);
    $("#warganegara").val(ui.item.warganegara);
    $("#alamat").val(ui.item.alamat);
    $("#rt").val(ui.item.rt);
    $("#rw").val(ui.item.rw);
    $("#kelurahan").val(ui.item.kelurahan);
    $("#kecamatan").val(ui.item.kecamatan);
    $("#kab_kota").val(ui.item.kab_kota);
    $("#provinsi").val(ui.item.provinsi);
    $("#pos").val(ui.item.pos);
    $("#status_marital").val(ui.item.status_marital);
    $("#pendidikan_terakhir").val(ui.item.pendidikan_terakhir);
    $("#suku").val(ui.item.suku);
    $("#pekerjaan").val(ui.item.pekerjaan);
    $("#nama_ayah").val(ui.item.nama_ayah);
    $("#nama_ibu").val(ui.item.nama_ibu);
    $("#penanggung_jawab").val(ui.item.penanggung_jawab);
    $("#hubungan_dengan_penanggung_jawab").val(ui.item.hubungan_dengan_penanggung_jawab);
    $("#no_contact_darurat").val(ui.item.no_contact_darurat);
    $("#status_pasien").val(ui.item.status_pasien);
    $("#wilayah_kerja").val(ui.item.wilayah_kerja);
      return false
    }
  });


  someJSONdata = [
    {
       name: 'John Doe',
       email: 'john@doe.com',
       phone: '111-111-1111'
    },
    {
       name: 'Barry Allen',
       email: 'barry@flash.com',
       phone: '222-222-2222'
    },
    {
       name: 'Cool Dude',
       email: 'cool@dude.com',
       phone: '333-333-3333'
    }
 ]


 $("#print-data").on("click",function(){
  printJS({
		printable: someJSONdata,
		type: 'json',
		properties: ['name', 'email', 'phone'],
		header: '<h2 class="custom-h3">KWITANSI</h2><h1>DINAS KESEHATAN KOTA CIMAHI</h1><h2 class="custom-h3">PUSKESMAS CIMAHI TENGAH</h2>',
		style: '.custom-h3 { text-align:center; } .box',
    // gridHeaderStyle: 'color: red;  border: 0px solid #3971A5;',
	  // gridStyle: 'border: 0px solid #3971A5;',
    maxWidth:800,	  })
 })
 

})