<?php

require_once "Controladores/plantillaC.php";

require_once "Controladores/usuariosC.php";
require_once "Controladores/clientesC.php";
require_once "Controladores/generosC.php";
require_once "Controladores/autoresC.php";
require_once "Controladores/librosC.php";
require_once "Controladores/ventasC.php";
require_once "Controladores/pedidosC.php";


require_once "Modelos/usuariosM.php";
require_once "Modelos/clientesM.php";
require_once "Modelos/generosM.php";
require_once "Modelos/autoresM.php";
require_once "Modelos/librosM.php";
require_once "Modelos/ventasM.php";
require_once "Modelos/pedidosM.php";

$plantilla = new Plantilla();
$plantilla->LlamarPlantilla();
