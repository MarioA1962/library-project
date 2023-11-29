<?php

require_once "ConexionBD.php";

class LibrosM extends ConexionBD{
    static public function AgregarLibroM($tablaBD, $datosC){
        $pdo = ConexionBD::cBD()->prepare("
            INSERT INTO $tablaBD (titulo, sinopsis, portada, idioma, id_autor, id_genero, precio, fecha_publicacion, stock) 
            VALUES (:titulo, :sinopsis, :portada, :idioma, :id_autor, :id_genero, :precio, :fecha_publicacion, :stock)
        ");
        $pdo->bindParam(":titulo", $datosC["titulo"], PDO::PARAM_STR);
        $pdo->bindParam(":sinopsis", $datosC["sinopsis"], PDO::PARAM_STR);
        $pdo->bindParam(":portada", $datosC["portada"], PDO::PARAM_STR);
        $pdo->bindParam(":idioma", $datosC["idioma"], PDO::PARAM_STR);
        $pdo->bindParam(":id_autor", $datosC["id_autor"], PDO::PARAM_STR);
        $pdo->bindParam(":id_genero", $datosC["id_genero"], PDO::PARAM_STR);
        $pdo->bindParam(":precio", $datosC["precio"], PDO::PARAM_STR);
        $pdo->bindParam(":fecha_publicacion", $datosC["fecha_publicacion"], PDO::PARAM_STR);
        $pdo->bindParam(":stock", $datosC["stock"], PDO::PARAM_STR);
        if ($pdo->execute()){
            return true;
        }
    }

    static public function VerLibrosM($tablaBD, $columna, $valor){
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
    }

    static public function EditarLibroM($tablaBD, $datosC){
        $pdo = ConexionBD::cBD()->prepare("UPDATE $tablaBD 
                                  SET titulo = :titulo, 
                                      sinopsis = :sinopsis, 
                                      id_autor = :id_autor, 
                                      id_genero = :id_genero, 
                                      idioma = :idioma, 
                                      precio = :precio, 
                                      stock = :stock, 
                                      fecha_publicacion = :fecha_publicacion, 
                                      portada = :portada 
                                  WHERE id = :id");

        $pdo->bindParam(":id", $datosC["id"], PDO::PARAM_INT);
        $pdo->bindParam(":titulo", $datosC["titulo"], PDO::PARAM_STR);
        $pdo->bindParam(":sinopsis", $datosC["sinopsis"], PDO::PARAM_STR);
        $pdo->bindParam(":id_autor", $datosC["id_autor"], PDO::PARAM_STR);
        $pdo->bindParam(":id_genero", $datosC["id_genero"], PDO::PARAM_STR);
        $pdo->bindParam(":idioma", $datosC["idioma"], PDO::PARAM_STR);
        $pdo->bindParam(":precio", $datosC["precio"], PDO::PARAM_STR);
        $pdo->bindParam(":stock", $datosC["stock"], PDO::PARAM_STR);
        $pdo->bindParam(":fecha_publicacion", $datosC["fecha_publicacion"], PDO::PARAM_STR);
        $pdo->bindParam(":portada", $datosC["portada"], PDO::PARAM_STR);
        if ($pdo->execute()) {
            return true;
        }
    }

    static public function BorrarLibroM($tablaBD, $id)
    {
        $pdo = ConexionBD::cBD()->prepare("DELETE FROM $tablaBD WHERE id=:id");
        $pdo->bindParam(":id", $id, PDO::PARAM_INT);
        if ($pdo->execute()) {
            return true;
        }
    }
}