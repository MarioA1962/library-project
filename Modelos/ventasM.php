<?php

require_once "ConexionBD.php";
class VentasM extends ConexionBD{
    static public function CrearVentasM($tablaBD, $datosC){
        $pdo = ConexionBD::cBD()->prepare("INSERT INTO $tablaBD(id_vendedor, id_cliente, estado) VALUES (:id_vendedor, :id_cliente, :estado)");

        $pdo->bindParam(":id_vendedor", $datosC["id_vendedor"], PDO::PARAM_INT);
        $pdo->bindParam(":id_cliente", $datosC["id_cliente"], PDO::PARAM_INT);
        $pdo->bindParam(":estado", $datosC["estado"], PDO::PARAM_STR);

        if ($pdo->execute()) {
            return true;
        }
    }

    static public function VerUltimoIDM($tablaBD){
        $pdo = ConexionBD::cBD()->prepare("SELECT MAX(id) AS id FROM $tablaBD");
        $pdo -> execute();
        return $pdo -> fetch();
    }

    static public function VerVentasM($tablaBD, $columna, $valor){
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

    static public function AgregarLibroVentaM($tablaBD, $datosC){
        $pdo = ConexionBD::cBD()->prepare("INSERT INTO $tablaBD(id_venta, id_libro, precio) VALUES (:id_venta, :id_libro, :precio)");

        $pdo->bindParam(":id_venta", $datosC["id_venta"], PDO::PARAM_INT);
        $pdo->bindParam(":id_libro", $datosC["id_libro"], PDO::PARAM_INT);
        $pdo->bindParam(":precio", $datosC["precio"], PDO::PARAM_STR);

        if ($pdo->execute()) {
            return true;
        }

    }

    static public function ActualizarStockM($tablaBD2, $datosC2){
        $pdo = ConexionBD::cBD()->prepare("UPDATE $tablaBD2 SET stock = :stock WHERE id = :id_libro");

        $pdo->bindParam(":id_libro", $datosC2["id_libro"], PDO::PARAM_INT);
        $pdo->bindParam(":stock", $datosC2["stock"], PDO::PARAM_STR);

        if ($pdo->execute()) {
            return true;
        }
    }

    static public function QuitarLibroM($tablaBD, $id){
        $pdo = ConexionBD::cBD()->prepare("DELETE FROM $tablaBD WHERE id=:id");
        $pdo->bindParam(":id", $id, PDO::PARAM_INT);
        if ($pdo->execute()) {
            return true;
        }
    }

    static public function PrecioTotalM($tablaBD, $id_v){
        $pdo = ConexionBD::cBD()->prepare("SELECT SUM(precio) FROM $tablaBD WHERE id_venta = $id_v");
        $pdo->execute();
        return $pdo->fetchColumn();
    }

    static public function FinalizarVentaM($tablaBD, $datosC){

        $pdo = ConexionBD::cBD()->prepare("UPDATE $tablaBD SET fecha = :fecha, estado = :estado WHERE id = :id_venta");
        $pdo -> bindParam(":id_venta", $datosC["id_venta"], PDO::PARAM_INT);
        $pdo -> bindParam(":fecha", $datosC["fecha"], PDO::PARAM_STR);
        $pdo -> bindParam(":estado", $datosC["estado"], PDO::PARAM_STR);

        if ($pdo->execute()) {
            return true;
        }
    }
}
