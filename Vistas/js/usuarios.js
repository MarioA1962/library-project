$(".table").DataTable({
  language: {
    sSearch: "Buscar:",
    sEmptyTable: "No hay datos en la Tabla",
    sZeroRecords: "No se encontraron resultados",
    sInfo: "Mostrando registros del _START_ al _END_ de un total _TOTAL_",
    sInfoEmpty: "Mostrando registros del 0 al 0 de un total de 0",
    sInfoFiltered: "(filtrando de un total de _MAX_ registros)",
    oPaginate: {
      sFirst: "Primero",
      sLast: "Ultimo",
      sNext: "Siguiente",
      sPrevious: "Anterior",
    },
    sLoadingRecords: "Cargando...",
    sLengthMenu: "Mostrar _MENU_ registros",
  },
});

$(".table").on("click", ".EditarUsuario", function () {
  var Uid = $(this).attr("Uid");
  var datos = new FormData();
  datos.append("Uid", Uid);
  $.ajax({
    url: "Ajax/usuariosA.php",
    method: "POST",
    data: datos,
    dataType: "json",
    contentType: false,
    cache: false,
    processData: false,
    success: function (resultado) {
      $("#id").val(resultado["id"]);
      $("#rol").val(resultado["rol"]);
      $("#usuario").val(resultado["usuario"]);
      $("#clave").val(resultado["clave"]);
      $("#apellido").val(resultado["apellido"]);
      $("#nombre").val(resultado["nombre"]);
      $("#documento").val(resultado["documento"]);
    },
  });
});

$(".table").on("click", ".BorrarUsuario", function () {
  var Uid = $(this).attr("Uid");
  var Ufoto = $(this).attr("Ufoto");
  swal({
    type: "warning",
    title: "¿Estás seguro de querer borrar este usuario?",
    showCancelButton: true,
    cancelButtonText: "Cancelar",
    cancelButtonColor: "#d33",
    confirmButtonText: "Aceptar",
    confirmButtonColor: "#3085d6",
  }).then(function (resultado) {
    if (resultado.value) {
      window.location = "index.php?url=Usuarios&Uid=" + Uid + "&Ufoto=" + Ufoto;
    }
  });
});
