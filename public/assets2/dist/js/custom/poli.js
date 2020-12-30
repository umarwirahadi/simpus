$(document).ready(function () {
    $("#example1").dataTable();

    $("#tambahPoli").click(function () {
        $("#addPoli").modal({ backdrop: false });
        $("#kode").val('PL-001');
    })
})
