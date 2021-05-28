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
//  $("#data-pemeriksaan").DataTable();
 $("#data-pemeriksaan").DataTable({
  processing: true,
  serverSide: true,
  ajax: datasite + "/fetchpemeriksaan",
  columns: [
    // { data: 'DT_RowIndex', name: 'DT_RowIndex' },
    { data: 'noantrian2', name: 'noantrian2' },
    { data: 'no_rm', name: 'no_rm'},
    { data: 'nama_lengkap', name: 'nama_lengkap'},
    { data: 'alamat', name: 'alamat' },
    { data: 'nama_poli', name: 'nama_poli' },
    { data: 'status_periksa', name: 'status_periksa' },
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
  scrollY: 500,
  scroller: {
    loadingIndicator: true
  }
});


/*load data pemeriksaan*/

$("#data-pemeriksaan").on("click",".add-pemeriksaan",function(){
  $("#create-form-pemeriksaan").submit();
});

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
        console.log(data);
        if (data.status === 1) {
          Swal.fire({
            title: 'Success',
            text: data.message,
            icon: 'success',
            confirmButtonText: 'Ok'
          }).then((data2) => {
            // window.location.href = datasite + '/pendaftaran';
            // console.log(data2);
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
