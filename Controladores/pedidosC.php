<?php

class PedidosC{
    public function CrearPedidoC(){
        if (isset($_POST["cantidad"])){
            $tablaBD = "pedidos";
            $datosC = array(
                "cantidad" => $_POST["cantidad"],
                "fecha_envio" => $_POST["fecha_envio"],
                "fecha_entrega" => $_POST["fecha_entrega"],
                "estado" => "Solicitado");

            $resultado = PedidosM::CrearPedidoM($tablaBD, $datosC);
            if ($resultado==true) {
                echo '<script>                        
                window.location = "Pedidos";
                </script>';
            }
        }

    }

    public static function VerPedidosC($columna, $valor){
        $tablaBD = "pedidos";
        $resultado = PedidosM::VerPedidosM($tablaBD, $columna, $valor);
        return $resultado;
    }

    public function CambiarEstadoPedidoC(){
        if(isset($_POST["id_pedido"])){
            $tablaBD = "pedidos";
            $datosC = array(
                "id_pedido" => $_POST["id_pedido"], // Corregir aquí
                "estado" => $_POST["estado"]
            );
            $resultado = PedidosM::CambiarEstadoPedidoM($tablaBD, $datosC);
            if ($resultado == true) {
                echo '<script>                        
                    window.location = "Pedidos";
                </script>';
            }
        }
    }

}