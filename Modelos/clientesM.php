<?php

require_once "ConexionBD.php";

class ClientesM extends ConexionBD
{

    public static function CrearClienteM($tablaBD, $datosC)
    {
        $pdo = ConexionBD::cBD()->prepare("
            INSERT INTO $tablaBD (nombre, apellido, documento, fecha_nac, direccion, telefono) 
            VALUES (:nombre, :apellido, :documento, :fecha_nac, :direccion, :telefono)
        ");
        $pdo->bindParam(":nombre", $datosC["nombre"], PDO::PARAM_STR);
        $pdo->bindParam(":apellido", $datosC["apellido"], PDO::PARAM_STR);
        $pdo->bindParam(":documento", $datosC["documento"], PDO::PARAM_STR);
        $pdo->bindParam(":fecha_nac", $datosC["fecha_nac"], PDO::PARAM_STR);
        $pdo->bindParam(":direccion", $datosC["direccion"], PDO::PARAM_STR);
        $pdo->bindParam(":telefono", $datosC["telefono"], PDO::PARAM_STR);
        if ($pdo->execute()) {
            return true;
        }
    }

    public static function VerClientesM($tablaBD, $columna, $valor)
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

    public static function EditarClienteM($tablaBD, $datosC)
    {
        $pdo = ConexionBD::cBD()->prepare(
            "
            UPDATE $tablaBD SET telefono=:telefono, fecha_nac=:fecha_nac, nombre=:nombre, apellido=:apellido, direccion=:direccion, documento=:documento 
            WHERE id=:id"
        );
        $pdo->bindParam(":id", $datosC["id"], PDO::PARAM_INT);
        $pdo->bindParam(":nombre", $datosC["nombre"], PDO::PARAM_STR);
        $pdo->bindParam(":apellido", $datosC["apellido"], PDO::PARAM_STR);
        $pdo->bindParam(":documento", $datosC["documento"], PDO::PARAM_STR);
        $pdo->bindParam(":telefono", $datosC["telefono"], PDO::PARAM_STR);
        $pdo->bindParam(":fecha_nac", $datosC["fecha_nac"], PDO::PARAM_STR);
        $pdo->bindParam(":direccion", $datosC["direccion"], PDO::PARAM_STR);
        if ($pdo->execute()) {
            return true;
        }
    }

    public static function BorrarClienteM($tablaBD, $id)
    {
        $pdo = ConexionBD::cBD()->prepare("DELETE FROM $tablaBD WHERE id=:id");
        $pdo->bindParam(":id", $id, PDO::PARAM_INT);
        if ($pdo->execute()) {
            return true;
        }
    }
}
