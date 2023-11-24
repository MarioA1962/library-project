<?php

class LibrosC{

    public function AgregarLibroC()
    {
        if(isset($_POST["titulo"])){
            $rutaImg = "";
            if(isset($_FILES["portada"]["tmp_name"])){
                if($_FILES["portada"]["type"] == "image/jpeg"){
                    $nombre = mt_rand(1, 999);
                    $rutaImg = "Vistas/img/Libros/Portada-" .$nombre. ".jpg";
                    $imagen = imagecreatefromjpeg($_FILES["portada"]["tmp_name"]);
                    imagejpeg($imagen, $rutaImg);
                }
                if($_FILES["portada"]["type"] == "image/png"){
                    $nombre = mt_rand(1, 999);
                    $rutaImg = "Vistas/img/Libros/Portada-" .$nombre. ".png";
                    $imagen = imagecreatefrompng($_FILES["portada"]["tmp_name"]);
                    imagepng($imagen, $rutaImg);
                }
            }
            $tablaBD = "libros";
            $datosC = array("titulo" => $_POST["titulo"],
                "sinopsis" => $_POST["sinopsis"],
                "portada" => $rutaImg,
                "id_genero" => $_POST["id_genero"],
                "idioma" => $_POST["idioma"],
                "fecha_publicacion" => $_POST["fecha_publicacion"],
                "precio" => $_POST["precio"],
                "id_autor" => $_POST["id_autor"],
                "stock" => $_POST["stock"]
                
            );
            $resultado = LibrosM::AgregarLibroM($tablaBD, $datosC);

            if ($resultado == true) {
                echo '<script>
                        swal({
                            type: "success",
                            title: "El Libro se ha Agregado Correctamente",
                            showConfirmButton: true,
                            confirmButtonText: "Cerrar",
                        }).then(function(resultado){
                            if(resultado.value){
                                window.location = "http://localhost/libreria/Libros";
                            }
                        })
                      </script>';
            }

        }
    }

    static public function verLibrosC($columna, $valor){
        $tablaBD = "libros";
        $resultado = LibrosM::VerLibrosM($tablaBD, $columna, $valor);
        return $resultado;
    }

    public function AgregarStockC(){
        if(isset($_POST["id_libro"])){
            $tablaBD2 = "libros";
            $datosC2 = array("id_libro"=>$_POST["id_libro"], "stock"=>$_POST["stock"]);
            $resultado2 = VentasM::ActualizarStockM($tablaBD2, $datosC2);

            if ($resultado2==True) {

                echo '<script>                        
                        window.location = "Inicio";
                </script>';
            }


        }
    }

}