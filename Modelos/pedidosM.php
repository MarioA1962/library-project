<?php

require_once "ConexionBD.php";
Class PedidosM extends ConexionBD{
    static public function CrearPedidoM($tablaBD, $datosC){

        $pdo = ConexionBD::cBD()->prepare("INSERT INTO $tablaBD(cantidad, estado, fecha_envio, fecha_entrega) VALUES 
        (:cantidad, :estado, :fecha_envio, :fecha_entrega)");

        $pdo -> bindParam(":cantidad", $datosC["cantidad"], PDO::PARAM_STR);
        $pdo -> bindParam(":estado", $datosC["estado"], PDO::PARAM_STR);
        $pdo -> bindParam(":fecha_envio", $datosC["fecha_envio"], PDO::PARAM_STR);
        $pdo -> bindParam(":fecha_entrega", $datosC["fecha_entrega"], PDO::PARAM_STR);

        if($pdo -> execute()){
            return true;
        }
    }
    static public function VerPedidosM($tablaBD, $columna, $valor)
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

    static public function CambiarEstadoPedidoM($tablaBD, $datosC){
        $pdo = ConexionBD::cBD()->prepare("UPDATE $tablaBD SET estado = :estado WHERE id = :id_pedido");
        $pdo -> bindParam(":id_pedido", $datosC["id_pedido"], PDO::PARAM_INT);
        $pdo -> bindParam(":estado", $datosC["estado"], PDO::PARAM_STR);
        if($pdo -> execute()){
            return true;
        }
    }
}