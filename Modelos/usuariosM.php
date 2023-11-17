<?php

require_once "ConexionBD.php";

class UsuariosM extends ConexionBD
{

    public static function IniciarSesionM($tablaBD, $datosC)
    {
        $pdo = ConexionBD::cBD()->prepare("SELECT * FROM $tablaBD WHERE usuario = :usuario");
        $pdo->bindParam(":usuario", $datosC["usuario"], PDO::PARAM_STR);
        $pdo->execute();
        return $pdo->fetch(PDO::FETCH_ASSOC);
    }

    public static function VerPerfilM($tablaBD, $id)
    {
        $pdo = ConexionBD::cBD()->prepare("SELECT * FROM $tablaBD WHERE id=:id");
        $pdo->bindParam(":id", $id, PDO::PARAM_INT);
        $pdo->execute();
        return $pdo->fetch(PDO::FETCH_ASSOC);
    }

    public static function EditarPerfilM($tablaBD, $datosC)
    {
        $pdo = ConexionBD::cBD()->prepare(
            "
            UPDATE $tablaBD SET usuario=:usuario, clave=:clave, nombre=:nombre, apellido=:apellido, documento=:documento, foto=:foto 
            WHERE id=:id"
        );
        $pdo->bindParam(":id", $datosC["id"], PDO::PARAM_INT);
        $pdo->bindParam(":usuario", $datosC["usuario"], PDO::PARAM_STR);
        $pdo->bindParam(":clave", $datosC["clave"], PDO::PARAM_STR);
        $pdo->bindParam(":documento", $datosC["documento"], PDO::PARAM_STR);
        $pdo->bindParam(":apellido", $datosC["apellido"], PDO::PARAM_STR);
        $pdo->bindParam(":nombre", $datosC["nombre"], PDO::PARAM_STR);
        $pdo->bindParam(":foto", $datosC["foto"], PDO::PARAM_STR);
        if ($pdo->execute()) {
            return true;
        }
    }

    public static function VerUsuariosM($tablaBD, $columna, $valor)
    {
        if ($columna == null) {
            $pdo = ConexionBD::cBD()->prepare("SELECT * FROM $tablaBD");
            $pdo->execute();
            return $pdo->fetchAll();
        } else {
            $pdo = ConexionBD::cBD()->prepare("SELECT * FROM $tablaBD WHERE $columna = :$columna");
            $pdo->bindParam(":" . $columna, $valor, PDO::PARAM_STR);
            $pdo->execute();
            return $pdo->fetch();
        }
    }

    public static function CrearUsuarioM($tablaBD, $datosC)
    {
        $pdo = ConexionBD::cBD()->prepare("
            INSERT INTO $tablaBD (nombre, apellido, usuario, clave, rol, documento) 
            VALUES (:nombre, :apellido, :usuario, :clave, :rol, :documento)
        ");
        $pdo->bindParam(":nombre", $datosC["nombre"], PDO::PARAM_STR);
        $pdo->bindParam(":apellido", $datosC["apellido"], PDO::PARAM_STR);
        $pdo->bindParam(":usuario", $datosC["usuario"], PDO::PARAM_STR);
        $pdo->bindParam(":clave", $datosC["clave"], PDO::PARAM_STR);
        $pdo->bindParam(":rol", $datosC["rol"], PDO::PARAM_STR);
        $pdo->bindParam(":documento", $datosC["documento"], PDO::PARAM_STR);
        if ($pdo->execute()) {
            return true;
        }
    }

    public static function EditarUsuarioM($tablaBD, $datosC)
    {
        $pdo = ConexionBD::cBD()->prepare(
            "
            UPDATE $tablaBD SET usuario=:usuario, clave=:clave, nombre=:nombre, apellido=:apellido, rol=:rol, documento=:documento 
            WHERE id=:id"
        );
        $pdo->bindParam(":id", $datosC["id"], PDO::PARAM_INT);
        $pdo->bindParam(":nombre", $datosC["nombre"], PDO::PARAM_STR);
        $pdo->bindParam(":apellido", $datosC["apellido"], PDO::PARAM_STR);
        $pdo->bindParam(":documento", $datosC["documento"], PDO::PARAM_STR);
        $pdo->bindParam(":usuario", $datosC["usuario"], PDO::PARAM_STR);
        $pdo->bindParam(":clave", $datosC["clave"], PDO::PARAM_STR);
        $pdo->bindParam(":rol", $datosC["rol"], PDO::PARAM_STR);
        if ($pdo->execute()) {
            return true;
        }
    }

    public static function BorrarUsuarioM($tablaBD, $id)
    {
        $pdo = ConexionBD::cBD()->prepare("DELETE FROM $tablaBD WHERE id=:id");
        $pdo->bindParam(":id", $id, PDO::PARAM_INT);
        if ($pdo->execute()) {
            return true;
        }
    }
}
