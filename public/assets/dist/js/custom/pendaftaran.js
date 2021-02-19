$(document).ready(function(){
  var datasite=$('body').attr('data-site');
  const token = $("meta[name='csrf-token']").attr("content");

  $('#status_hubungan').select2({ theme: 'bootstrap4' }); $('#jenis_kelamin').select2({ theme: 'bootstrap4' }); $('#agama').select2({
    theme: 'bootstrap4'
  }); $('#gol_darah').select2({ theme: 'bootstrap4' }); $('#status_marital').select2({ theme: 'bootstrap4' }); $('#pendidikan_terakhir').select2({
    theme: 'bootstrap4'
  }); $('#suku').select2({ theme: 'bootstrap4' }); $('#pekerjaan').select2({ theme: 'bootstrap4' }); $('#status_pasien').select2({
    theme: 'bootstrap4'
  }); $('#status').select2({ theme: 'bootstrap4' }); $('#kategori').select2({ theme: 'bootstrap4' });
 
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
      $("#id_pasien").val(ui.item.value);
      // $("#pos").val(ui.item.pos);
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


  $("body").on("click",".data-pendaftaran",function(){
    var data_id=$(this).data('id');
    $.ajax({
      url:datasite+'/pendaftaran/'+data_id,
      type:'GET',
      dataType:'json',
      success:function(data){
        console.log(data);
        $("#a1").html(data.data.no_pendaftaran);
        $("#a3").html(data.data.noantrian);
        $("#a3").html(data.data.no_rm);
        $("#a4").html(data.data.no_rm);
        $("#a5").html(data.data.nama_lengkap+' / '+data.data.jenis_kelamin+' / '+data.data.usia_tahun+' tahun '+data.data.usia_bulan+' bulan '+data.data.usia_hari+' hari');
        $("#a5a").html(data.data.alamat+' RT. '+data.data.rt+' RW. '+data.data.rw);
        $("#a6").html(data.data.nokwitansi==null?'belum':'sudah');
        $("#a7").html('Rp. '+data.data.nama_poli);
        $("#a8").html(data.data.deskripsi);
        // $("#a4").html(data.data.status===1?'Aktif':'Tidak aktif');
        // $("#a5").html(data.data.deskripsi);
        $("#form-pendaftaran").modal(); 
      }
    })
  })



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