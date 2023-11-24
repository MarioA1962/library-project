<?php

require_once "../Controladores/librosC.php";
require_once "../Modelos/librosM.php";

class LibrosA{
    public $Lid;
    public function EditarLibroA(){
        $columna = "id";
        $valor = $this->Lid;
        $resultado = LibrosC::verLibrosC($columna, $valor);
        echo json_encode($resultado);
    }
}

if (isset($_POST["Lid"])) {
    $el = new LibrosA();
    $el->Lid = $_POST["Lid"];
    $el->EditarLibroA();
}