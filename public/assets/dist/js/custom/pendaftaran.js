$(document).ready(function(){
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


  $("#data-pasien").DataTable({
    "responsive": true, "lengthChange": true, "autoWidth": true,"searching":false,"filter":false,"info":false,
    "language": {
      "lengthMenu": " _MENU_ data",
      "zeroRecords": "Data pasien tidak ada, silahkan lakukan pencarian",
      "info": "Showing page _PAGE_ of _PAGES_",
      "infoEmpty": "Data pasien tidak ditemukan",
      "infoFiltered": "(filtered from _MAX_ total records)"
  },
    
  }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
  

})