$(document).ready(function(){
  var datasite=$('body').attr('data-site');
  const token = $("meta[name='csrf-token']").attr("content");

  // $('#status_hubungan').select2(); $('#jenis_kelamin').select2(); $('#agama').select2(); $('#gol_darah').select2(); $('#status_marital').select2(); $('#pendidikan_terakhir').select2(); $('#suku').select2(); $('#pekerjaan').select2(); $('#status_pasien').select2(); $('#status').select2(); $('#kategori').select2();
 
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

  // $('#poli').select2({
  //   theme: 'bootstrap4'
  // });
  // $('#cara_bayar').select2({
  //   theme: 'bootstrap4'
  // });



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
      $("#no_bpjs2").val(ui.item.no_bpjs);
      $("#alamat2").val(`${ui.item.alamat} RT. ${ui.item.rt} RW. ${ui.item.rw} ${ui.item.kelurahan}`);
      $("#id_pasien2").val(ui.item.value);
      $("#kdprovider").val(ui.item.kodeproviderpeserta_bpjs);
      $("#nmprovider").val(ui.item.namaproviderpeserta_bpjs);      
      $("#faskes").val(ui.item.namaproviderpeserta_bpjs);      
      $("#tunggakan").val(ui.item.tunggakan);      
      $("#statusbpjs").val(ui.item.keterangan_aktif_bpjs);      
      $("#namajenispeserta_bpjs").val(ui.item.namajenispeserta_bpjs);      
      $("#namajeniskelas_bpjs").val(ui.item.namajeniskelas_bpjs);      
      return false
    }
  });

/* find by bpjs*/
$("#form-pencarian-bpjs").on("submit",function(e){
  e.preventDefault();
  var formData=$(this).serialize();
  $.ajax({
  url:datasite+'/cari_pasien_bpjs',
  type:'POST',
  data:formData,
  dataType:'json',
  beforeSend:function(){
    $("#main-load").removeClass('hidden');    
  },
  success:function(result){
    /*place data here*/    
    if(result.status==1){        
      const {...formData}=result.data;    
      $("#id_pasien2").val(formData[0].id);
      $("#kdprovider").val(formData[0].kodeproviderpeserta_bpjs);
      $("#nmprovider").val(formData[0].namaproviderpeserta_bpjs);    
      $("#nik2").val(formData[0].nik);
      $("#no_rm").val(formData[0].no_rm);
      $("#nama_lengkap2").val(formData[0].nama_lengkap);
      $("#tanggal_lahir").val(formData[0].tanggal_lahir);
      $("#usia").val(formData[0].tahun+' thn '+formData[0].bulan+' bln '+formData[0].hari+' hr');
      $("#jk").val(formData[0].jenis_kelamin==='L'?'Laki-laki':'Perempuan');
      $("#usia_tahun").val(formData[0].tahun);
      $("#usia_bulan").val(formData[0].bulan);
      $("#usia_hari").val(formData[0].hari);
      $("#statusbpjs").val(formData[0].keterangan_aktif_bpjs);    
      $("#tunggakan").val(formData[0].tunggakan_bpjs?formData[0].tunggakan_bpjs:'-');    
      $("#hp2").val(formData[0].hp);
      $("#no_bpjs2").val(formData[0].no_bpjs);
      $("#alamat2").val(formData[0].alamat);
      $("#faskes").val(formData[0].namaproviderpeserta_bpjs);
      Swal.fire({
        title: 'sukses',
        text: result.message,
        icon: 'success',
        confirmButtonText: 'Ok'
      }) 
  }else{
    Swal.fire({
      title: 'error',
      text: result.message,
      icon: 'error',
      confirmButtonText: 'Ok'
    }); 
  }   
  },complete:function(){
    $('#main-load').addClass('hidden');
  },
  error:function(){
    Swal.fire({
      title: 'error',
      text: 'Server error',
      icon: 'error',
      confirmButtonText: 'Ok'
    }); 
  }
  })
});


  $("#form-pendaftaran-pasien").on("submit", function (e) {
    e.preventDefault();
    var datapendaftaran = $(this).serialize();
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
            window.location.href = datasite + '/pendaftaran';
            // console.log(data2);
            // $("#cetak-retribusi").modal();
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
            text: 'proses simpan data error kode error : '+a.status,
          })
        }      
      }
    });
  });
  
  $("#form-edit-pendaftaran-pasien").on("submit", function (e) {
    e.preventDefault();
    var datapendaftaran = $(this).serialize();
    var dataID=$("#idpendaftaran").val();
    
    $.ajax({
      url: datasite + '/pendaftaran/'+dataID,
      type: 'PUT',
      data: datapendaftaran,
      dataType: 'json',
      success: function (data) {
      console.log(data);
        if (data.status === 1) {
          Swal.fire({
            title: 'Success',
            text: data.message,
            icon: 'success',
            confirmButtonText: 'Ok'
          }).then((data2) => {
            // window.location.href = datasite + '/pendaftaran';
            console.log(data2);
            // $("#cetak-retribusi").modal();
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
            text: 'proses simpan data error kode error : '+a.status,
          })
        }      
      }
    });
  });

  $("#form-pasien-baru-modal").on("submit", function (e) {
    e.preventDefault();
    var dataPasien = $(this).serialize();
    const idpas=$("#id_pasien").val();
    if(idpas===''){
      $.ajax({
        url: datasite + '/pasien/'+dataID,
        type: 'POST',
        data: dataPasien,
        dataType: 'json',
        success: function (data) {
            Swal.fire({
              title: data.status===1?'Success':'error',
              text: data.message,
              icon: data.status===1?'success':'error',
              confirmButtonText: 'Ok'
            }).then(() => {
              $("#addnewpasien").modal('hide');
            })         
        }
        ,
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

  $("#pendaftaran").on("click",".view-pendaftaran",function(){
    var data_id=$(this).data('id');
    $.ajax({
      url:datasite+'/pendaftaran/'+data_id,
      type:'GET',
      dataType:'json',
      success:function(data){
        console.log(data);
        $("#a1").html(data.data.no_pendaftaran);
        $("#a3").html(data.data.noantrian2);
        $("#a4").html(data.data.no_rm);
        $("#a5").html(data.data.nama_lengkap+' / '+data.data.jenis_kelamin+' / '+data.data.usia_tahun+' tahun '+data.data.usia_bulan+' bulan '+data.data.usia_hari+' hari');
        $("#a5a").html(data.data.alamat+' RT. '+data.data.rt+' RW. '+data.data.rw);
        $("#a6").html(data.data.nokwitansi==null?'belum':'sudah');
        $("#a7").html(data.data.nama_poli);
        $("#a8").html(data.data.deskripsi);
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


$("#pendaftaran").on("click",".data-kajian-awal",function(){
let regID=$(this).attr("data-id");
$.ajax({
  url: `${datasite}/kajianawalpemeriksaan`,
  type: 'POST',
  data: {regID:regID,"_token":token},
  dataType: 'json',
  success: function (data) {
    if(data.status===1){
      const dataPasien=data.daftar;
      const dataPemeriksaan=data.dataperiksa;      
      console.log(dataPasien);
      $("#kajian_id_pendaftaran").val(dataPasien.id);
      $("#kajian_idpasien").val(dataPasien.idpasien);
      $("#kajian_no_rm").val(dataPasien.no_rm);
      // $("#kajian_nik").val(dataPasien.nik);
      $("#kajian_noantrian2").val(dataPasien.noantrian2);
      $("#kajian_nama_lengkap").val(dataPasien.nama_lengkap);
      $("#kajian_tanggal_lahir").val(dataPasien.tanggal_lahir);
      $("#no_bpjs2").val(dataPasien.no_kartu_bpjs);
      $("#poli").val(dataPasien.nama_poli);
      $("#jenis_kelamin").val(dataPasien.jenis_kelamin=='L'?'Laki-laki':'Perempuan');
      $("#kajian_usia").val(`${dataPasien.usia_tahun} thn ${dataPasien.usia_bulan} bln ${dataPasien.usia_hari} hr`);
      $("#kajian_keluhan").val(dataPasien.keluhan);
      $("#kajian_deskripsi").val(dataPasien.deskripsi);
      if(dataPemeriksaan!=null){
        $("#kajian_sistole").val(dataPemeriksaan.sistole);
        $("#kajian_diastole").val(dataPemeriksaan.diastole);
        $("#kajian_berat_badan").val(dataPemeriksaan.berat_badan);
        $("#kajian_tinggi_badan").val(dataPemeriksaan.tinggi_badan);
        $("#kajian_suhu").val(dataPemeriksaan.suhu);
        $("#kajian_tekanan_nadi").val(dataPemeriksaan.tekanan_nadi);
        $("#kajian_respirasi").val(dataPemeriksaan.respirasi);
        
      }
      $("#form-kajianawal").modal('show');      
    }else{
      Swal.fire({
        title: 'error',
        text: 'Error while geting data',
        icon: 'error',
        confirmButtonText: 'Ok'
      }).then(() => {
        window.location.href='pendaftaran';
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

$("#pendaftaran").on("click",".send-register-pcare",function(){
  let regID=$(this).attr("data-id");  
  $.ajax({
    url: `${datasite}/sending-pcare`,
    type: 'POST',
    data: {regID:regID,"_token":token},
    dataType: 'json',
    success: function (result) {
      if(result.status==1){
        Swal.fire({
          icon: 'success',
          title: 'success',
          text: result.message
        })
      }else{
        Swal.fire({
          icon: 'warning',
          title: 'peringatan',
          text: result.message
        })
      }
    },
    error: function (a) {
      Swal.fire({
        icon: 'error',
        title: 'gagal',
        text: 'terjadi kesalahan dalam pengiriman data'
      });
    }
  });
  });
  
$("#pendaftaran").on("click",".delete-register-pcare",function(){
  Swal.fire({
    title: 'Yakin akan dihapus ?',
    text: "menghapus data pasien akan menghilangkan seluruh data pasien, berpotensi kehilangan data dan ketidak akuratan proses pelaporan",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Yes'
  }).then((result) => {
    if (result.isConfirmed) {
      let regID=$(this).attr("data-id");    
      $.ajax({
        url: `${datasite}/delete-pcare-daftar`,
        type: 'POST',
        data: {regID:regID,"_token":token},
        dataType: 'json',
        success: function (result) {
          if(result.status==1){
            Swal.fire({
              icon: 'success',
              title: 'success',
              text: result.message
            })
          }else{
            Swal.fire({
              icon: 'error',
              title: 'gagal',
              text: result.message
            })
          }
        },
        error: function (a) {
          Swal.fire({
            icon: 'error',
            title: 'gagal',
            text: 'terjadi kesalahan dalam pengiriman data'
          });
        }
      });
    }
  })    
  });
  

  $("#pendaftaran").on("click",".delete-pendaftaran",function(){
    Swal.fire({
      title: 'Pendaftaran akan dihapus ?',
      text: "dengan menekan tombol [yes] anda benar menghapus pendaftaran pasien ini, periksa kembali",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Yes'
    }).then((result) => {
      if (result.isConfirmed) {
        let regID=$(this).attr("data-id");    
        $.ajax({
          url: `${datasite}/pendaftaran/ ${regID}`,
          type: 'DELETE',
          data: {regID:regID,"_token":token},
          dataType: 'json',
          success: function (result) {
            if(result.status==1){
              Swal.fire({
                icon: 'success',
                title: 'success',
                text: result.message
              }).then(()=>{
                window.location.href='/pendaftaran';
              })
            }else{
              Swal.fire({
                icon: 'error',
                title: 'gagal',
                text: result.message
              }).then(()=>{
                window.location.href='/pendaftaran';
              })
            }
          },
          error: function (a) {
            Swal.fire({
              icon: 'error',
              title: 'gagal',
              text: 'terjadi kesalahan dalam pengiriman data'
            }).then(()=>{
              window.location.href='/pendaftaran';
            })
          }
        });
      }
    })    
    });
    

$("#form-kajian-awal-pasien").on("submit",function(e){
  e.preventDefault();
  var dataKajianAwal = $(this).serialize();
  $.ajax({
    url: datasite + '/createkajianaawal',
    type: 'POST',
    data: dataKajianAwal,
    dataType: 'json',
    success: function (data) {
        Swal.fire({
          title: data.status===1?'Success':'error',
          text: data.message,
          icon: data.status===1?'success':'error',
          confirmButtonText: 'Ok'
        }).then(() => {
          // $("#addnewpasien").modal('hide');
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
 
 
 $("#cek-status-bpjs").on("click",function(){
  const idBPJS=$('#no_bpjs2').val();
  $.ajax({
  url:datasite+'/cekstatusBPJS',
  type:'POST',
  data:{no_bpjs2:idBPJS,_token: token},
  dataType:'json',
  beforeSend:function(){
    $("#main-load").removeClass('hidden');    
  },
  success:function(data){
  console.log(data);
    Swal.fire({
      title: data.status===1?'Success':'error',
      text: data.message,
      icon: data.status===1?'success':'error',
      confirmButtonText: 'Ok'
    }).then(() => {
      
    })
  },error:function(){
    Swal.fire({title: 'Error',
      text: "Proses cek status BPJS gagal dilakukan, silahkan refresh halaman untuk mencoba lagi, atau logout sistem untuk mulai dari awal..!",
      icon: 'error'});
  },complete:function(){
    $('#main-load').addClass('hidden');
  }
  })
})
 

})