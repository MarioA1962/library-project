$(".table").on("click", ".AumentarStock", function(){
    var Lid = $(this).attr("Lid");
    var datos = new FormData();
    datos.append("Lid", Lid);
    $.ajax({
        url: "Ajax/librosA.php",
        method: "POST",
        data: datos,
        dataType: "json",
        cache: false,
        processData: false,
        contentType: false,

        success: function(resultado){
            $("#id_libro").val(resultado["id"]);

            $("#StockA").val(resultado["stock"]);

            var StockA = $("#StockA").val(resultado["stock"]);
            $("#StockN").change(function(){

                var StockN = $("#StockN").val();
                var StockT = Number(StockN) + Number(resultado["stock"]);
                total = parseFloat(StockT); 
                $("#StockT").val(total);

            })
        }
    })
})