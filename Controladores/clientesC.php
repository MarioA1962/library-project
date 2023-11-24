<?php

class ClientesC
{

    public function CrearClienteC()
    {
        if (isset($_POST["nombre"])) {
            $tablaBD = "clientes";
            $dir = $_POST["dir"];
            $datosC = array(
                "nombre" => $_POST["nombre"],
                "apellido" => $_POST["apellido"],
                "documento" => $_POST["documento"],
                "fecha_nac" => $_POST["fecha_nac"],
                "direccion" => $_POST["direccion"],
                "telefono" => $_POST["telefono"]
            );
            $resultado = ClientesM::CrearClienteM($tablaBD, $datosC);
            if ($resultado) {
                echo '<script>
                        swal({
                            type: "success",
                            title: "El Cliente se ha Creado Correctamente",
                            showConfirmButton: true,
                            confirmButtonText: "Cerrar",
                        }).then(function(resultado){
                            if(resultado.value){
                                window.location = "http://localhost/libreria/' . $dir . '";
                            }
                        })
                      </script>';
            }
        }
    }

    public static function VerClientesC($columna, $valor)
    {
        $tablaBD = "clientes";
        $resultado = ClientesM::VerClientesM($tablaBD, $columna, $valor);
        return $resultado;
    }

    public function EditarClienteC()
    {
        if (isset($_POST["idE"])) {
            $tablaBD = "clientes";
            $datosC = array(
                "id" => $_POST["idE"],
                "nombre" => $_POST["nombreE"],
                "apellido" => $_POST["apellidoE"],
                "documento" => $_POST["documentoE"],
                "fecha_nac" => $_POST["fecha_nacE"],
                "direccion" => $_POST["direccionE"],
                "telefono" => $_POST["telefonoE"]
            );
            $resultado = ClientesM::EditarClienteM($tablaBD, $datosC);
            if ($resultado) {
                echo '<script>
                        swal({
                            type: "success",
                            title: "El Cliente se ha Editado Correctamente",
                            showConfirmButton: true,
                            confirmButtonText: "Cerrar",
                        }).then(function(resultado){
                            if(resultado.value){
                                window.location = "http://localhost/libreria/Clientes";
                            }
                        })
                      </script>';
            }
        }
    }

    public function BorrarClienteC()
    {
        if (isset($_GET["Cid"])) {
            $tablaBD = "clientes";
            $id = $_GET["Cid"];
            $resultado = ClientesM::BorrarClienteM($tablaBD, $id);
            if ($resultado) {
                echo '<script>
                    window.location = "Clientes";
                    </script>';
            }
        }
    }
}
