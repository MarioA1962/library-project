<?php

class UsuariosC
{

    public function IniciarSesionC()
    {
        if (isset($_POST["usuario"])) {
            if (preg_match('/^[a-zA-Z0-9]+$/', $_POST["usuario"]) && preg_match('/^[a-zA-Z0-9]+$/', $_POST["clave"])) {
                $tablaBD = "usuarios";
                $datosC = array("usuario" => $_POST["usuario"], "clave" => $_POST["clave"]);
                $resultado = UsuariosM::IniciarSesionM($tablaBD, $datosC);

                if (is_array($resultado) && isset($resultado["usuario"]) && isset($resultado["clave"])) {
                    if ($resultado["usuario"] == $_POST["usuario"] && $resultado["clave"] == $_POST["clave"]) {
                        $_SESSION["Ingresar"] = true;
                        $_SESSION["id"] = $resultado["id"];
                        $_SESSION["usuario"] = $resultado["usuario"];
                        $_SESSION["clave"] = $resultado["clave"];
                        $_SESSION["nombre"] = $resultado["nombre"];
                        $_SESSION["apellido"] = $resultado["apellido"];
                        $_SESSION["documento"] = $resultado["documento"];
                        $_SESSION["foto"] = $resultado["foto"];
                        $_SESSION["rol"] = $resultado["rol"];
                        header("Location: Inicio"); // Redirigir usando header
                        exit(); // Finalizar el script
                    } else {
                        echo '<br><div class="alert alert-danger">Error al ingresar</div>';
                    }
                } else {
                    echo '<br><div class="alert alert-danger">Usuario o clave incorrectos</div>';
                }
            } else {
                echo '<br><div class="alert alert-danger">Datos de usuario o clave no válidos</div>';
            }
        }
    }

    public function VerPerfilC()
    {
        $tablaBD = "usuarios";
        $id = $_SESSION["id"];
        $resultado = UsuariosM::VerPerfilM($tablaBD, $id);
        echo '
        <div class="col-md-6 col-xs-12">
            <h2>Nombre:</h2>
            <input type="text" class="input-lg" name="nombre" value="' . $resultado["nombre"] . '">
            <input type="hidden" class="input-lg" name="id" value="' . $resultado["id"] . '">
            <h2>Apellido:</h2>
            <input type="text" class="input-lg" name="apellido" value="' . $resultado["apellido"] . '">
            <h2>Documento:</h2>
            <input type="text" class="input-lg" name="documento" value="' . $resultado["documento"] . '">
        </div>
        <div class="col-md-6 col-xs-12">
            <h2>Usuario:</h2>
            <input type="text" class="input-lg" name="usuario" value="' . $resultado["usuario"] . '">
            <h2>Contraseña:</h2>
            <input type="text" class="input-lg" name="clave" value="' . $resultado["clave"] . '">
            <h2>Foto de Perfil:</h2>
            <br>
            <input type="file" name="fotoPerfil">
            <br>';
        if ($resultado["foto"] == "") {
            echo '<img src="http://localhost/libreria/Vistas/img/defecto.png" width="150px" height="150px">';
        } else {
            echo '<img src="http://localhost/libreria/' . $resultado["foto"] . '" width="150px" height="150px">';
        }
        echo '<input type="hidden" class="input-lg" name="fotoActual" value="' . $resultado["foto"] . '">
        </div>';
    }

    public function EditarPerfilC()
    {
        if (isset($_POST["id"])) {
            $rutaImg = $_POST["fotoActual"];

            // Verifica si se ha subido un archivo y no está vacío
            if (isset($_FILES["fotoPerfil"]["tmp_name"]) && !empty($_FILES["fotoPerfil"]["tmp_name"])) {
                // Elimina la imagen actual si existe
                if (!empty($_POST["fotoActual"])) {
                    unlink($_POST["fotoActual"]);
                }

                // Procesa la imagen subida
                $rutaImg = $this->procesarImagen($_FILES["fotoPerfil"], "Vistas/img/Usuarios/");
            }

            // Datos a actualizar en la base de datos
            $datosC = array(
                "id" => $_POST["id"],
                "nombre" => $_POST["nombre"],
                "apellido" => $_POST["apellido"],
                "documento" => $_POST["documento"],
                "usuario" => $_POST["usuario"],
                "clave" => $_POST["clave"],
                "foto" => $rutaImg
            );

            // Actualiza el perfil en la base de datos
            $resultado = UsuariosM::EditarPerfilM("usuarios", $datosC);

            // Actualiza las variables de sesión con la nueva información
            $_SESSION["nombre"] = $_POST["nombre"];
            $_SESSION["apellido"] = $_POST["apellido"];
            $_SESSION["foto"] = $rutaImg;

            // Redirige después de la actualización
            if ($resultado) {
                echo '<script>
                        window.location = "http://localhost/libreria/Mis-Datos";
                      </script>';
            }
        }
    }

    private function procesarImagen($archivo, $directorio)
    {
        $tipoImagen = exif_imagetype($archivo["tmp_name"]);
        $nombre = "U-" . mt_rand(10, 999);

        switch ($tipoImagen) {
            case IMAGETYPE_JPEG:
                $rutaImg = $directorio . $nombre . ".jpg";
                $foto = imagecreatefromjpeg($archivo["tmp_name"]);
                imagejpeg($foto, $rutaImg);
                break;

            case IMAGETYPE_PNG:
                $rutaImg = $directorio . $nombre . ".png";
                $foto = imagecreatefrompng($archivo["tmp_name"]);
                imagepng($foto, $rutaImg);
                break;

            default:
                // Manejo de otros tipos de imagen si es necesario
                break;
        }

        return $rutaImg;
    }

    public static function VerUsuariosC($columna, $valor)
    {
        $tablaBD = "usuarios";
        $resultado = UsuariosM::VerUsuariosM($tablaBD, $columna, $valor);
        return $resultado;
    }

    public function CrearUsuarioC()
    {
        if (isset($_POST["rol"])) {
            $tablaBD = "usuarios";
            $datosC = array(
                "nombre" => $_POST["nombre"],
                "apellido" => $_POST["apellido"],
                "documento" => $_POST["documento"],
                "usuario" => $_POST["usuario"],
                "clave" => $_POST["clave"],
                "rol" => $_POST["rol"]
            );
            $resultado = UsuariosM::CrearUsuarioM($tablaBD, $datosC);
            if ($resultado) {
                echo '<script>
                        swal({
                            type: "success",
                            title: "El Usuario se ha Creado Correctamente",
                            showConfirmButton: true,
                            confirmButtonText: "Cerrar",
                        }).then(function(resultado){
                            if(resultado.value){
                                window.location = "http://localhost/libreria/Usuarios";
                            }
                        })
                      </script>';
            }
        }
    }

    public function EditarUsuarioC()
    {
        if (isset($_POST["idE"])) {
            $tablaBD = "usuarios";
            $datosC = array(
                "id" => $_POST["idE"],
                "nombre" => $_POST["nombreE"],
                "apellido" => $_POST["apellidoE"],
                "documento" => $_POST["documentoE"],
                "usuario" => $_POST["usuarioE"],
                "clave" => $_POST["claveE"],
                "rol" => $_POST["rolE"]
            );
            $resultado = UsuariosM::EditarUsuarioM($tablaBD, $datosC);
            if ($resultado) {
                echo '<script>
                        swal({
                            type: "success",
                            title: "El Usuario se ha Editado Correctamente",
                            showConfirmButton: true,
                            confirmButtonText: "Cerrar",
                        }).then(function(resultado){
                            if(resultado.value){
                                window.location = "http://localhost/libreria/Usuarios";
                            }
                        })
                      </script>';
            }
        }
    }

    public function BorrarUsuarioC()
    {
        if (isset($_GET["Uid"])) {
            $tablaBD = "usuarios";
            $id = $_GET["Uid"];
            if ($_GET["Ufoto"] != "") {
                unlink($_GET["Ufoto"]);
            }
            $resultado = UsuariosM::BorrarUsuarioM($tablaBD, $id);
            if ($resultado) {
                echo '<script>
                    window.location = "Usuarios";
                    </script>';
            }
        }
    }
}
