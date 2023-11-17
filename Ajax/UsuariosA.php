<?php

require_once "../Controladores/UsuariosC.php";
require_once "../Modelos/usuariosM.php";

class UsuariosA
{
    public $Uid;
    public function EditarUsuarioA()
    {
        $column = "id";
        $valor = $this->Uid;
        $resultado = UsuariosC::VerUsuariosC($column, $valor);
        echo json_encode($resultado);
    }
}

if (isset($_POST["Uid"])) {
    $eu = new UsuariosA();
    $eu->Uid = $_POST["Uid"];
    $eu->EditarUsuarioA();
}
