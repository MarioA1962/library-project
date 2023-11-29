$(".table").on("click", ".EditarLibro", function(){
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
      success: function (resultado) {
        $("#id").val(resultado["id"]);
        $("#titulo").val(resultado["titulo"]);
        $("#sinopsis").val(resultado["sinopsis"]);
        $("#id_autor").val(resultado["id_autor"]);
        $("#id_genero").val(resultado["id_genero"]);
        $("#idioma").val(resultado["idioma"]);
        $("#precio").val(resultado["precio"]);
        $("#stock").val(resultado["stock"]);
        $("#fecha_publicacion").val(resultado["fecha_publicacion"]);

        $("#portadaActual").val(resultado["portada"]);

        $("#portada").attr("src", resultado["portada"]);
      },
    });
  });

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

$(".table").on("click", ".BorrarLibro", function () {
  var Lid = $(this).attr("Lid");
  var portada = $(this).attr("portada");
  swal({
    type: "warning",
    title: "¿Estás seguro de querer borrar este Usuario?",
    showCancelButton: true,
    cancelButtonText: "Cancelar",
    cancelButtonColor: "#d33",
    confirmButtonText: "Aceptar",
    confirmButtonColor: "#3085d6",
  }).then(function (resultado) {
    if (resultado.value) {
      window.location = "index.php?url=Libros&Lid=" + Lid + "&portada=" + portada;
    }
  });
});

