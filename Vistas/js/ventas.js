$("#select2").select2();

$(".SL").change(function(){
    var Lid = $(this).val();
    var datos = new FormData();
    datos.append("Lid", Lid);
    $.ajax({
        url: "http://localhost/libreria/Ajax/ventasA.php",
        method: "POST",
        data: datos,
        dataType: "json",
        cache: false,
        processData: false,
        contentType: false,

        success: function(resultado){
            $("#portada").attr("src", "http://localhost/libreria/"+resultado["portada"]);  

            $("#precio").val(resultado["precio"]);  

            var stock = Number(resultado["stock"])-1;

            $("#stock").val(stock);  

        }
    })
})

$(".table").on("click", ".QuitarLibro", function(){
    var Vid = $(this).attr("Vid");
    var LVid = $(this).attr("LVid");
    var LStock = $(this).attr("LStock");
    var Lid = $(this).attr("Lid"); 

    var stock = Number(LStock)+1;

    window.location = "http://localhost/libreria/index.php?url=Venta&Vid="+Vid+"&Lid="+Lid+"&LStock="+stock+"&LVid="+LVid;
})