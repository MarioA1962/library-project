<?php

require_once "ConexionBD.php";

class AutoresM extends ConexionBD{
    static public function AgregarAutorM($tablaBD, $datosC){
        $pdo = ConexionBD::cBD()->prepare("
            INSERT INTO $tablaBD (nombre, bibliografia, foto) 
            VALUES (:nombre, :bibliografia, :foto)
        ");
        $pdo->bindParam(":nombre", $datosC["nombre"], PDO::PARAM_STR);
        $pdo->bindParam(":bibliografia", $datosC["bibliografia"], PDO::PARAM_STR);
        $pdo->bindParam(":foto", $datosC["foto"], PDO::PARAM_STR);
        if ($pdo->execute()){
            return true;
        }
        $pdo -> close();
        $pdo = null;
    }

    static public function VerAutoresM($tablaBD, $columna, $valor){
        if($columna == null){
            $pdo = ConexionBD::cBD() -> prepare("SELECT * FROM $tablaBD");
            $pdo -> execute();
            return $pdo -> fetchAll();
        } else{
            $pdo = ConexionBD::cBD() -> prepare("SELECT * FROM $tablaBD WHERE $columna = :$columna");
            $pdo -> bindParam(":" . $columna, $valor, PDO::PARAM_STR);
            $pdo -> execute();
            return $pdo -> fetch();
        }
        $pdo -> close();
        $pdo = null;
    }

    static public function ActualizarAutorM($tablaBD, $datosC){
        $pdo = ConexionBD::cBD() -> prepare("UPDATE $tablaBD SET nombre = :nombre, bibliografia = :bibliografia, foto = :foto WHERE id= :id");
        $pdo->bindParam(":id", $datosC["id"], PDO::PARAM_INT);
        $pdo->bindParam(":nombre", $datosC["nombre"], PDO::PARAM_STR);
        $pdo->bindParam(":bibliografia", $datosC["bibliografia"], PDO::PARAM_STR);
        $pdo->bindParam(":foto", $datosC["foto"], PDO::PARAM_STR);
        if ($pdo->execute()) {
            return true;
        }
        $pdo -> close();
        $pdo = null;
    }

    static public function BorrarAutorM($tablaBD, $id)
    {
        $pdo = ConexionBD::cBD()->prepare("DELETE FROM $tablaBD WHERE id=:id");
        $pdo->bindParam(":id", $id, PDO::PARAM_INT);
        if ($pdo->execute()) {
            return true;
        }
        $pdo -> close();
        $pdo = null;
    }
    
}