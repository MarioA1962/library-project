<div class="content-wrapper">
    <section class="content-header">
        <?php
        $exp=explode("/", $_GET["url"]);
        if(isset($exp[1])){

            $columna = "id";
            $valor = $exp[1];
            $resultado = VentasC::VerVentasC($columna, $valor);

            $valor = $resultado["id_vendedor"];
            $vendedor = UsuariosC::VerUsuariosC($columna, $valor);

            $valor = $resultado["id_cliente"];
            $cliente = ClientesC::VerClientesC($columna, $valor);

            $fecha = explode(" ", $resultado["fecha"]);
            $fechaF = explode("-", $fecha[0]);

            echo '<h1>Gestionar la Venta ID: '.$exp[1].'</h1>
            <h3><b>Vendedor:</b> '.$vendedor["apellido"].' '.$vendedor["nombre"].'</h3>
            <h3><b>Cliente:</b> '.$cliente["apellido"].' '.$cliente["nombre"].'</h3>
            <h3><b>Fecha:</b> '.$fechaF[2].'-'.$fechaF[1].'-'.$fechaF[0].'</h3>';

            $total = VentasC::PrecioTotalC($exp[1]);
            

            echo '<h3><b>Precio Total: </b>'.$total.' S/.</h3>';

        }
        ?>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
        <div class="container mt-4">
            <a href="http://localhost/libreria/Vistas/fpdf/PruebaV.php" target="_blank" class="btn btn-success">
                <i class="fas fa-file-pdf"></i> Descargar Boleta
            </a>
        </div>        

    </section>
    <section class="content">
        <div class="box">
            <div class="box-body">
                <table class="table table-bordered table-hover table-striped dt-responsive">
                    <thead>
                        <tr>
                            <th>N°</th> 
                            <th>Libro</th>
                            <th>Autor</th>
                            <th>Portada</th>
                            <th>Precio</th>
                        </tr>

                    </thead>

                    <tbody>
                        <?php
                        $columna = null;
                        $valor = null;

                        $ven = VentasC::VerVentas2C($columna, $valor);

                        foreach($ven as $key => $value){
                            if(isset($exp[1])){
                                if($value["id_venta"]==$exp[1]){
                                    echo '<tr> <td> '.($key+1).' </td>';                              
                                    $columna = "id";
                                    $valor = $value["id_libro"];
                                    $libro = LibrosC::verLibrosC($columna, $valor);
                                    echo '<td> '.$libro["titulo"].' </td>';

                                    $columna = "id";
                                    $valor = $libro["id_autor"];
                                    $autor = AutoresC::VerAutoresC($columna, $valor);
                                    echo '<td>' . $autor["nombre"] . '</td>

                                    <td> <img src="http://localhost/libreria/'.$libro["portada"].'" width="50px"></td>

                                    <td>S/.' . $value["precio"] . '</td>

                                    </tr>';

                                    $libro = LibrosC::verLibrosC($columna, $valor);
                                }
                            }                                                        
                        }
                        ?>                    
                    </tbody>

                </table>
            </div>
        </div>
    </section>
</div>
