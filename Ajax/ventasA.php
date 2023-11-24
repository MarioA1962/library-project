<?php

require_once "../Controladores/librosC.php";
require_once "../Modelos/librosM.php";

class LibrosA{
    public $Lid;
    public function SeleccionarLibro(){
        $columna = "id";
        $valor = $this->Lid;
        $resultado = LibrosC::verLibrosC($columna, $valor);
        echo json_encode($resultado);
    }
}

if (isset($_POST["Lid"])) {
    $sl = new LibrosA();
    $sl->Lid = $_POST["Lid"];
    $sl->SeleccionarLibro();
}