$(document).ready(function () {
    $("#bayar").on("keypress",function(e){
        if(e.which==13){
            const subtotal=$("#subtotal").val();
            const bayar=$("#bayar").val();
            const kembali=bayar-subtotal;
            $("#kembali").val(kembali);
            // alert('anda menekan enter');
        }
    })
  })
  