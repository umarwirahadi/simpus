$(document).ready(function(){
    $("#data-wilayah").DataTable({
        "processing":true,
        "serverside"  :true,
        ajax:"wilayah-fetch",   
        columns:[
            {data:'id',name:'id'},
            {data:'kel',name:'kel'},
            {data:'kec',name:'kec'},
            {data:'jenis',name:'jenis'},
            {data:'kotakab',name:'kotakab'},
            {data:'prov',name:'prov'},
            {data:'pos',name:'pos'},
            {data:'id',name:'id'},

        ] 
    //     "responsive": true, "lengthChange": true, "autoWidth": true,"searching":false,"filter":false,"info":false,
    //     "language": {
    //       "lengthMenu": " _MENU_ data",
    //       "zeroRecords": "Data wilayah kosong",
    //       "info": "Showing page _PAGE_ of _PAGES_",
    //       "infoEmpty": "Data wilayah tidak ditemukan",
    //       "infoFiltered": "(filtered from _MAX_ total records)"
    //   },
      });
      


//   $("#data-wilayah").DataTable({
//     "processing":true,
//     "serverside"  :true,
//     ajax:"    ",    
//     "responsive": true, "lengthChange": true, "autoWidth": true,"searching":false,"filter":false,"info":false,
//     "language": {
//       "lengthMenu": " _MENU_ data",
//       "zeroRecords": "Data wilayah kosong",
//       "info": "Showing page _PAGE_ of _PAGES_",
//       "infoEmpty": "Data wilayah tidak ditemukan",
//       "infoFiltered": "(filtered from _MAX_ total records)"
//   },
    
//   }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
  

})