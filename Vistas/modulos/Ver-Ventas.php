<div class="content-wrapper">
    <section class="content-header">
        <h1>Gestor de Ventas Realizadas</h1>
        </section>
    <section class="content">
        <div class="box">
            <div class="box-header with-border">
            </div>
            <div class="box-body">
            <table class="table table-bordered table-striped table-hover dt-responsive">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Cliente</th>
                            <th>Vendedor</th>
                            <th>Fecha</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $columna = null;
                        $valor = null;

                        $resultado = VentasC::VerVentasC($columna, $valor);
                        foreach($resultado as $key => $value){

                            if($value["estado"]=="Finalizado" && $_SESSION["rol"] == "Administrador"){
                                echo'<tr>
                                    <td>'.$value["id"].'</td>';
                                    $columna = "id";
                                    $valor = $value["id_cliente"];
                                    $cliente = ClientesC::VerClientesC($columna, $valor);
                                    echo '<td>'.$cliente["apellido"].' '.$cliente["nombre"].'</td>';

                                    $columna = "id";
                                    $valor = $value["id_vendedor"];
                                    $vendedor = UsuariosC::VerUsuariosC($columna, $valor);
                                    echo '<td>'.$vendedor["apellido"].' '.$vendedor["nombre"].'</td>';

                                    $fecha = explode(" ", $value["fecha"]);
                                    $fechaF = explode("-", $fecha[0]);
                        
                                    echo '<td> '.$fechaF[2].'-'.$fechaF[1].'-'.$fechaF[0].'</td>';

                                    echo '<td>
                                                <a href="http://localhost/libreria/Ver-Venta/'.$value["id"].'">
                                                <button class="btn btn-success"> Ver Venta </button>
                                                </a>';  
                                    echo '</tr>';
                            }else if($value["estado"]=="Finalizado" && $_SESSION["id"] == $value["id_vendedor"]){
                                echo'<tr>
                                    <td>'.$value["id"].'</td>';
                                    $columna = "id";
                                    $valor = $value["id_cliente"];
                                    $cliente = ClientesC::VerClientesC($columna, $valor);
                                    echo '<td>'.$cliente["apellido"].' '.$cliente["nombre"].'</td>';

                                    $columna = "id";
                                    $valor = $value["id_vendedor"];
                                    $vendedor = UsuariosC::VerUsuariosC($columna, $valor);
                                    echo '<td>'.$vendedor["apellido"].' '.$vendedor["nombre"].'</td>';

                                    $fecha = explode(" ", $value["fecha"]);
                                    $fechaF = explode("-", $fecha[0]);
                        
                                    echo '<td> '.$fechaF[2].'-'.$fechaF[1].'-'.$fechaF[0].'</td>';

                                    echo '<td>
                                                <a href="http://localhost/libreria/Ver-Venta/'.$value["id"].'">
                                                <button class="btn btn-success"> Ver Venta </button>
                                                </a>';  
                                    echo '</tr>';
                            }                            
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</div>