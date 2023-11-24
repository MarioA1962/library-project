<?php

class VentasC{
    public function CrearVentasC(){
        if(isset($_POST["id_vendedor"])){
            $tablaBD = "ventas";
            $datosC = array("id_vendedor"=>$_POST["id_vendedor"], "id_cliente"=>$_POST["id_cliente"], "estado"=>"Creado");

            $resultado = VentasM::CrearVentasM($tablaBD, $datosC);
            if ($resultado==True) {

                $resultado2 =  VentasM::VerUltimoIDM($tablaBD);
                echo '<script>                        
                        window.location = "http://localhost/libreria/Venta/'.$resultado2["id"].'";
                </script>';
            }
        }

    }
    static public function VerVentasC($columna, $valor){
        $tablaBD = "ventas";
        $resultado = VentasM::VerVentasM($tablaBD, $columna, $valor);
        return $resultado;
    }

    public function AgregarLibroVentaC(){
        if(isset($_POST["id_venta"])){
            $tablaBD = "venta";
            $tablaBD2 = "libros";
            $datosC = array("id_venta"=>$_POST["id_venta"], "id_libro"=>$_POST["id_libro"], "precio"=>$_POST["precio"]);
            $datosC2 = array("id_libro"=>$_POST["id_libro"], "stock"=>$_POST["stock"]);

            $resultado = VentasM::AgregarLibroVentaM($tablaBD, $datosC);
            $resultado2 = VentasM::ActualizarStockM($tablaBD2, $datosC2);

            if ($resultado==True) {

                echo '<script>                        
                        window.location = "http://localhost/libreria/Venta/'.$_POST["id_venta"].'";
                </script>';
            }

        }
    }

    static public function VerVentas2C($columna, $valor){
        $tablaBD = "venta";
        $resultado = VentasM::VerVentasM($tablaBD, $columna, $valor);
        return $resultado;
    }

    public function QuitarLibroC(){
        if(isset($_GET["Vid"])){
            $tablaBD = "venta";
            $tablaBD2 = "libros";

            $id = $_GET["LVid"];
            $datosC2 = array("id_libro"=>$_GET["Lid"], "stock"=>$_GET["LStock"]);

            $resultado = VentasM::QuitarLibroM($tablaBD, $id);  
            $resultado2 = VentasM::ActualizarStockM($tablaBD2, $datosC2);

            if ($resultado==True) {

                echo '<script>                        
                        window.location = "http://localhost/libreria/Venta/'.$_GET["Vid"].'";
                </script>';
            }
        }
    }

    static public function PrecioTotalC($id_v){
        $tablaBD = "venta";

        $resultado = VentasM::PrecioTotalM($tablaBD, $id_v);
        return $resultado;
    }

    public function FinalizarVentasC(){
        if(isset($_POST["id_ventaF"])){
            $tablaBD = "ventas";
            $datosC = array("id_venta"=>$_POST["id_ventaF"], "fecha"=>$_POST["fechaF"], "estado"=>"Finalizado");

            $resultado = VentasM::FinalizarVentaM($tablaBD, $datosC);
            if( $resultado == true){
                echo '<script>
                window.location = "http://localhost/libreria/Crear-Venta"
                </script>';
            }

        }
    }
}   
