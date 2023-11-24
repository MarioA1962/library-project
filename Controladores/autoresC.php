<?php

class AutoresC{

    public function AgregarAutorC()
    {
        if(isset($_POST["nombre"])){
            $rutaImg = "";
            if(isset($_FILES["foto"]["tmp_name"]) && !empty($_FILES["foto"]["tmp_name"])){
                if($_FILES["foto"]["type"] == "image/jpeg"){
                    $nombre = mt_rand(10, 999);
                    $rutaImg = "Vistas/img/Autores/A-" .$nombre. ".jpg";
                    $imagen = imagecreatefromjpeg($_FILES["foto"]["tmp_name"]);
                    imagejpeg($imagen, $rutaImg);
                }
                if($_FILES["foto"]["type"] == "image/png"){
                    $nombre = mt_rand(10, 999);
                    $rutaImg = "Vistas/img/Autores/A-" .$nombre. ".png";
                    $imagen = imagecreatefrompng($_FILES["foto"]["tmp_name"]);
                    imagepng($imagen, $rutaImg);
                }
            }
            $tablaBD = "autores";
            $datosC = array("nombre" => $_POST["nombre"], "bibliografia" => $_POST["bibliografia"], "foto" => $rutaImg);
            $resultado = AutoresM::AgregarAutorM($tablaBD, $datosC);

            if ($resultado) {
                echo '<script>
                        swal({
                            type: "success",
                            title: "El Autor se ha Agregado Correctamente",
                            showConfirmButton: true,
                            confirmButtonText: "Cerrar",
                        }).then(function(resultado){
                            if(resultado.value){
                                window.location = "http://localhost/libreria/Autores";
                            }
                        })
                      </script>';
            }

        }
    }

    static public function verAutoresC($columna, $valor){
        $tablaBD = "autores";
        $resultado = AutoresM::VerAutoresM($tablaBD, $columna, $valor);
        return $resultado;
    }
    
    public function ActualizarAutorC(){
        if (isset($_POST["idE"])){
            $rutaImg = $_POST["fotoActual"];
            if (isset($_FILES["fotoE"]["tmp_name"])){
                unlink($_POST["fotoActual"]);
                if($_FILES["fotoE"]["type"] == "image/png"){
                    $nombre = mt_rand(10, 999);
                    $rutaImg = "Vistas/img/Autores/A-".$nombre.".png";
                    $foto = imagecreatefrompng($_FILES["fotoE"]["tmp_name"]);
                    imagepng($foto, $rutaImg);
                }
                if($_FILES["fotoE"]["type"] == "image/jpeg"){
                    $nombre = mt_rand(10, 999);
                    $rutaImg = "Vistas/img/Autores/A-".$nombre.".jpg";
                    $foto = imagecreatefromjpeg($_FILES["fotoE"]["tmp_name"]);
                    imagejpeg($foto, $rutaImg);
                }
                
            }
            $tablaBD = "autores";
            $datosC = array(
                "id" => $_POST["idE"],
                "nombre" => $_POST["nombreE"],
                "bibliografia" => $_POST["bibliografiaE"],
                "foto" => $rutaImg
            );
            $resultado = AutoresM::ActualizarAutorM($tablaBD, $datosC);

            if ($resultado) {
                echo '<script>
                        swal({
                            type: "success",
                            title: "El Autor se ha Actualizado Correctamente",
                            showConfirmButton: true,
                            confirmButtonText: "Cerrar",
                        }).then(function(resultado){
                            if(resultado.value){
                                window.location = "http://localhost/libreria/Autores";
                            }
                        })
                      </script>';
            }
        }
    }

    public function BorrarAutorC(){
        if (isset($_GET["Aid"])) {
            $tablaBD = "autores";
            $id = $_GET["Aid"];
            unlink($_GET["Afoto"]);
            $resultado = AutoresM::BorrarAutorM($tablaBD, $id);
            if ($resultado == true) {
                echo '<script>
                    window.location = "Autores";
                    </script>';
            }
        }
    }

}