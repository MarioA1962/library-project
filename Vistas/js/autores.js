$('textarea').each(function(){
    $(this).val($(this).val().trim());
});

$(".table").on("click", ".BorrarAutor", function () {
    var Aid = $(this).attr("Aid");
    var Afoto = $(this).attr("Afoto");
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
        window.location = "index.php?url=Autores&Aid=" + Aid + "&Afoto=" + Afoto;
      }
    });
  });



