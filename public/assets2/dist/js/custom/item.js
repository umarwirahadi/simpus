$(document).ready(function () {
    $("#dataItem").dataTable({
        "processing": true,
        "serverSide": true,
        "ajax": {
            "url": "{{ url('allposts') }}",
            "dataType": "json",
            "type": "POST",
            "data": { _token: "{{csrf_token()}}" }
        },
        "columns": [
            { "data": "id" },
            { "data": "title" },
            { "data": "body" },
            { "data": "created_at" },
            { "data": "options" }
        ]
    });

    $("#tambahPoli").click(function () {
        $("#addPoli").modal({ backdrop: false });
        $("#kode").val('PL-001');
    })
})
