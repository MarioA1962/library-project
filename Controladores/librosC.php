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

    public function AgregarStockEnLibrosC(){
        if(isset($_POST["id_libro"])){
            $tablaBD2 = "libros";
            $datosC2 = array("id_libro"=>$_POST["id_libro"], "stock"=>$_POST["stock"]);
            $resultado2 = VentasM::ActualizarStockM($tablaBD2, $datosC2);

            if ($resultado2==True) {

                echo '<script>                        
                        window.location = "Libros";
                </script>';
            }


        }
    }


    public function EditarLibroC(){
        if (isset($_POST["idE"])){
            $rutaPortada = $_POST["portadaActual"];
            if (isset($_FILES["portadaE"]["tmp_name"])){
                unlink($_POST["portadaActual"]);
                if($_FILES["portadaE"]["type"] == "image/png"){
                    $nombre = mt_rand(10, 999);
                    $rutaPortada = "Vistas/img/Libros/Portada-".$nombre.".png";
                    $portada = imagecreatefrompng($_FILES["portadaE"]["tmp_name"]);
                    imagepng($portada, $rutaPortada);
                }
                if($_FILES["portadaE"]["type"] == "image/jpeg"){
                    $nombre = mt_rand(10, 999);
                    $rutaPortada = "Vistas/img/Libros/Portada-".$nombre.".jpg";
                    $portada = imagecreatefromjpeg($_FILES["portadaE"]["tmp_name"]);
                    imagejpeg($portada, $rutaPortada);
                }
                
            }
            $tablaBD = "libros";
            $datosC = array(
                "id" => $_POST["idE"],
                "titulo" => $_POST["tituloE"],
                "sinopsis" => $_POST["sinopsisE"],
                "id_autor" => $_POST["id_autorE"],
                "id_genero" => $_POST["id_generoE"],
                "idioma" => $_POST["idiomaE"],
                "precio" => $_POST["precioE"],
                "stock" => $_POST["stockE"],
                "fecha_publicacion" => $_POST["fecha_publicacionE"],
                "portada" => $rutaPortada
            );
            $resultado = LibrosM::EditarLibroM($tablaBD, $datosC);

            if ($resultado) {
                echo '<script>
                        swal({
                            type: "success",
                            title: "El Libro se ha Editado Correctamente",
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

    public function BorrarLibroC(){
        if (isset($_GET["Lid"])) {
            $tablaBD = "libros";
            $id = $_GET["Lid"];
            unlink($_GET["portada"]);
            $resultado = LibrosM::BorrarLibroM($tablaBD, $id);
            if ($resultado == true) {
                echo '<script>
                    window.location = "Libros";
                    </script>';
            }
        }
    }

}