$(".table").on("click", ".BorrarGenero", function () {
  var Gid = $(this).attr("Gid");
  swal({
    type: "warning",
    title: "¿Estás seguro de querer borrar este género literario?",
    showCancelButton: true,
    cancelButtonText: "Cancelar",
    cancelButtonColor: "#d33",
    confirmButtonText: "Aceptar",
    confirmButtonColor: "#3085d6",
  }).then(function (resultado) {
    if (resultado.value) {
      window.location = "index.php?url=Generos&Gid=" + Gid;
    }
  });
});
