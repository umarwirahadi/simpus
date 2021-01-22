$(document).ready(function () {
    
    $('#data-pasien').DataTable({
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": true,
    "language": {
      "lengthMenu": " _MENU_ data",
      "zeroRecords": "Data pasien kosong",
      "info": "Showing page _PAGE_ of _PAGES_",
      "infoEmpty": "Data pasien tidak ditemukan",
      "infoFiltered": "(filtered from _MAX_ total records)"
    }
    });


    $('#status').select2({
        theme: 'bootstrap4'
    });

    $('#kategori').select2({
        theme: 'bootstrap4'
    });
  })
  