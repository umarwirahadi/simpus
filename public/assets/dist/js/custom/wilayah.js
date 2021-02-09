$(document).ready(function(){
    var datasite=$('body').attr('data-site');
    const token= $("meta[name='csrf-token']").attr("content");
  
    // $.ajaxSetup ({
    //     headers: {
    //         'X-CSRF-TOKEN': $ ('meta[name="csrf-token"]').attr ('content')
    //     }
    // });


    $("#data-wilayah").DataTable({
        processing:true,
        serverSide  :true,
        ajax:datasite+"/wilayah_server_side",   
        columns:[
            {data:'id',name:'id'},
            {data:'kel',name:'kel'},
            {data:'kec',name:'kec'},
            {data:'jenis',name:'jenis'},
            {data:'kotakab',name:'kotakab'},
            {data:'prov',name:'prov'},
            {data:'pos',name:'pos'},
            {data:'created_at',name:'created_at'},
            {data:'updated_at',name:'updated_at'}
        ],
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
        "responsive": true, "lengthChange": true, "autoWidth": true,"searching":true,"filter":false,"info":false,
        "language": {
          "lengthMenu": " _MENU_ data",
          "zeroRecords": "Data wilayah kosong",
          "info": "Showing page _PAGE_ of _PAGES_",
          "infoEmpty": "Data wilayah tidak ditemukan",
          "infoFiltered": "(filtered from _MAX_ total records)"
      },
      scrollY:300,
      scroller:{
          loadingIndicator:true
      }
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