<?php

class GenerosC
{

    public function AgregarGeneroC()
    {
        if (isset($_POST["genero"])) {
            $tablaBD = "generos";
            $genero = $_POST["genero"];
            $resultado = GenerosM::AgregarGeneroM($tablaBD, $genero);
            if ($resultado) {
                echo '<script>
                        swal({
                            type: "success",
                            title: "El Género Literario se ha Agregado Correctamente",
                            showConfirmButton: true,
                            confirmButtonText: "Cerrar",
                        }).then(function(resultado){
                            if(resultado.value){
                                window.location = "http://localhost/libreria/Generos";
                            }
                        })
                      </script>';
            }
        }
    }


    public static function VerGenerosC($columna, $valor)
    {
        $tablaBD = "generos";
        $resultado = GenerosM::VerGenerosM($tablaBD, $columna, $valor);
        return $resultado;
    }

    public function EditarGeneroC()
    {
        if (isset($_POST["idE"])) {
            $tablaBD = "generos";
            $datosC = array(
                "id" => $_POST["idE"],
                "nombre" => $_POST["nombreE"]
            );
            $resultado = GenerosM::EditarGeneroM($tablaBD, $datosC);
            if ($resultado) {
                echo '<script>
                        swal({
                            type: "success",
                            title: "El Género Literario se ha Editado Correctamente",
                            showConfirmButton: true,
                            confirmButtonText: "Cerrar",
                        }).then(function(resultado){
                            if(resultado.value){
                                window.location = "http://localhost/libreria/Generos";
                            }
                        })
                      </script>';
            }
        }
    }

    public function BorrarGeneroC()
    {
        if (isset($_GET["Gid"])) {
            $tablaBD = "generos";
            $id = $_GET["Gid"];
            $resultado = GenerosM::BorrarGeneroM($tablaBD, $id);
            if ($resultado) {
                echo '<script>
                    window.location = "Generos";
                    </script>';
            }
        }
    }
}
