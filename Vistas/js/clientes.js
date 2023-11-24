$("#datemask").inputmask("dd/mm/yyyy", { placeholder: "dd/mm/yyyy" });
$("[data-mask]").inputmask();

$(".table").on("click", ".EditarCliente", function () {
  var Cid = $(this).attr("Cid");
  var datos = new FormData();
  datos.append("Cid", Cid);
  $.ajax({
    url: "Ajax/clientesA.php",
    method: "POST",
    data: datos,
    dataType: "json",
    contentType: false,
    cache: false,
    processData: false,
    success: function (resultado) {
      $("#id").val(resultado["id"]);
      $("#apellido").val(resultado["apellido"]);
      $("#nombre").val(resultado["nombre"]);
      $("#documento").val(resultado["documento"]);
      $("#fecha_nac").val(resultado["fecha_nac"]);
      $("#direccion").val(resultado["direccion"]);
      $("#telefono").val(resultado["telefono"]);
    },
  });
});

$(".table").on("click", ".BorrarCliente", function () {
  var Cid = $(this).attr("Cid");
  swal({
    type: "warning",
    title: "¿Estás seguro de querer borrar este cliente?",
    showCancelButton: true,
    cancelButtonText: "Cancelar",
    cancelButtonColor: "#d33",
    confirmButtonText: "Aceptar",
    confirmButtonColor: "#3085d6",
  }).then(function (resultado) {
    if (resultado.value) {
      window.location = "index.php?url=Clientes&Cid=" + Cid;
    }
  });
});
