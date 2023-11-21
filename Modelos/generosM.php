<?php

require_once "ConexionBD.php";

class GenerosM extends ConexionBD
{

    public static function CrearGeneroM($tablaBD, $genero)
    {
        $pdo = ConexionBD::cBD()->prepare("INSERT INTO $tablaBD (nombre) VALUES (:nombre)");
        $pdo->bindParam(":nombre", $genero, PDO::PARAM_STR);
        if ($pdo->execute()) {
            return true;
        }
    }

    public static function VerGenerosM($tablaBD, $columna, $valor)
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

    public static function EditarGeneroM($tablaBD, $datosC)
    {
        $pdo = ConexionBD::cBD()->prepare("UPDATE $tablaBD SET nombre=:nombre WHERE id=:id");
        $pdo->bindParam(":id", $datosC["id"], PDO::PARAM_INT);
        $pdo->bindParam(":nombre", $datosC["nombre"], PDO::PARAM_STR);
        if ($pdo->execute()) {
            return true;
        }
    }


    public static function BorrarGeneroM($tablaBD, $id)
    {
        $pdo = ConexionBD::cBD()->prepare("DELETE FROM $tablaBD WHERE id=:id");
        $pdo->bindParam(":id", $id, PDO::PARAM_INT);
        if ($pdo->execute()) {
            return true;
        }
    }
}
