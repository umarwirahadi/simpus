$(document).ready(function(){
    var datasite=$('body').attr('data-site');
    const token= $("meta[name='csrf-token']").attr("content");

    $("#data-wilayah").DataTable({
        processing:true,
        serverSide  :true,
        ajax:datasite+"/wilayah_server_side",
        columns:[
            {data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
            {data:'kel',name:'kel'},
            {data:'kec',name:'kec'},
            {data:'jenis',name:'jenis'},
            {data:'kotakab',name:'kotakab'},
            {data:'prov',name:'prov'},
            {data:'pos',name:'pos'},
            {data:'aksi',name:'aksi'}
        ],
        "lengthMenu": [[10, 25, 50,100, -1], [10, 25, 50, "All"]]
        ,
        "buttons": ["excel", "colvis"],
        initComplete : function() {
            var input = $('.dataTables_filter input').unbind(),
                self = this.api(),
                $searchButton = $('<button class="btn btn-primary btn-sm m-2">')
                           .text('Cari')
                           .click(function() {
                              self.search(input.val()).draw();
                           }),
                $clearButton = $('<button class="btn btn-warning btn-sm">')
                           .text('Ulang')
                           .click(function() {
                              input.val('');
                              $searchButton.click();
                           })
            $('.dataTables_filter').append($searchButton, $clearButton);
        },
        "responsive": true, "lengthChange": true, "autoWidth": true,"searching":true,"filter":true,"info":true,
        "language": {
          "lengthMenu": " _MENU_ data",
          "zeroRecords": "Data wilayah kosong",
          "info": "Showing page _PAGE_ of _PAGES_",
          "infoEmpty": "Data wilayah tidak ditemukan",
          "infoFiltered": "(filtered from _MAX_ total records)"
      },
      scrollY:500,
      scroller:{
          loadingIndicator:true
      }
      });


      $("#form-add-wilayah").on("submit", function (e) {
        e.preventDefault();
        var dataWilayah = $(this).serialize();

        $.ajax({
          url: datasite + '/wilayah',
          type: 'POST',
          data: dataWilayah,
          dataType: 'json',
          success: function (data) {
            console.log(data);
              Swal.fire({
                title: data.status===1?'Success':'error',
                text: data.message,
                icon: data.status===1?'success':'error',
                confirmButtonText: 'Ok'
              }).then(() => {
                window.location.href = datasite + '/wilayah';
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
                window.location.href = datasite + '/wilayah';
              }
          }
        });
      });

  $("#data-wilayah").on("click",".delete-alamat",function(){
    const idWilayah=$(this).attr('data-id');
    Swal.fire({
      title: 'Yakin data akan dihapus ?',
      text: "menghapus data akan menghilangkan seluruh atau sebagian data , berpotensi kehilangan data dan ketidakakuratan proses pelaporan",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Yes'
    }).then((result) => {
      if (result.isConfirmed) {
        $.ajax({
          url: datasite + '/wilayah/' + idWilayah,
          type: 'DELETE',
          data: { "id": idWilayah, "_token": token },
          dataType: 'json',
          success: function (data) {
            if (data.status === 1) {
              Swal.fire({
                title: 'Success',
                text: data.message,
                icon: 'success',
                confirmButtonText: 'Ok'
              }).then(() => {
                window.location.reload();
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
  })

})
