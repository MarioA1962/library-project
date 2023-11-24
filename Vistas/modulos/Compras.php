<div class="content-wrapper">
    <section class="content-header">
        <?php
        $exp=explode("/", $_GET["url"]);

        $columna = "id";
        $valor = $exp[1];   

        $cliente = ClientesC::VerClientesC($columna, $valor);
        echo '<h1>Compras del Cliente: '.$cliente["apellido"].' '.$cliente["nombre"].'</h1>
        '

        ?>
    </section>
    <section class="content">
        <div class="box">
            <div class="box-body">
            <table class="table table-bordered table-hover table-striped dt-responsive">
                    <thead>
                        <tr>
                            <th>ID</th> 
                            <th>Vendedor</th>
                            <th>Fecha</th>
                            <th>Hora</th>
                            <th></th>
                        </tr>

                    </thead>

                    <tbody>
                        <?php
                        $columna = null;
                        $valor = null;

                        $resultado = VentasC::VerVentasC($columna, $valor);

                        foreach($resultado as $key => $value){
                            if(isset($exp[1])){
                                if($value["estado"]=="Finalizado" && $value["id_cliente"]==$exp[1]){
                                    echo '<tr>
                                            <td>'.$value["id"].'</td>';
                                        
                                        $columna = "id";
                                        $valor = $value["id_vendedor"];
                                        $vendedor = UsuariosC::VerUsuariosC($columna, $valor);
                                        echo '<td>'.$vendedor["apellido"].''.$vendedor["nombre"].'</td>';
                            
                                        $fecha = explode(" ", $value["fecha"]);
                                        $fechaF = explode("-", $fecha[0]);
                            
                                        echo '<td> '.$fechaF[2].'-'.$fechaF[1].'-'.$fechaF[0].'</td>
                                            <td>'.$fecha[1].'</td>
                                            <td>
                                                <a href="http://localhost/libreria/Ver-Venta/'.$value["id"].'">
                                                   <button class="btn btn-primary">Ver Venta</button>                 
                                                </a>
                                            </td>';

                                    echo '</tr>';




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

