
$(document).ready(function () {
    var datasite = $('body').attr('data-site');
    const token = $("meta[name='csrf-token']").attr("content");


  $("#data-icd").DataTable({
      processing: true,
      serverSide: true,
      ajax: datasite + "/fetchicd10",
      columns: [
        { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
        { data: 'id_icd', name: 'id_icd' },
        { data: 'chapter', name: 'chapter' },
        { data: 'section', name: 'section' },
        { data: 'descriptions', name: 'descriptions' },
        { data: 'gender', name: 'gender' },
        { data: 'agegroup', name: 'agegroup' },
        { data: 'aksi', name: 'aksi'},
      ],
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
  })

  })
