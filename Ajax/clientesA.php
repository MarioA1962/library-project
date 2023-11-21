<?php

require_once "../Controladores/clientesC.php";
require_once "../Modelos/clientesM.php";

class ClientesA
{
    public $Cid;
    public function EditarClienteA()
    {
        $column = "id";
        $valor = $this->Cid;
        $resultado = ClientesC::VerClientesC($column, $valor);
        echo json_encode($resultado);
    }
}

if (isset($_POST["Cid"])) {
    $ec = new ClientesA();
    $ec->Cid = $_POST["Cid"];
    $ec->EditarClienteA();
}
