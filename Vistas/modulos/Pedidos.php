<div class="content-wrapper">
    <section class="content-header">
        <h1>Gestor de Pedidos</h1>
    </section>
    <section class="content">
        <div class="box">
            <div class="box-header">
                <div class="col-md-6">
                    <form method="post">
                        <h2>Cantidad de Productos</h2>
                        <input type="number" name="cantidad" class="form-control" required="">
                        <br>

                        <div class="row">
                            <div class="col-md-6">
                                <h2>Fecha de Envío</h2>
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-calendar"> </i>
                                        
                                    </div>
                                    <input type="text" name="fecha_envio" class="form-control pull-right" id="datepicker" required="">

                                </div>
                            </div>
                            <div class="col-md-6">
                                <h2>Fecha de Entrega</h2>
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-calendar"> </i>
                                        
                                    </div>
                                    <input type="text" name="fecha_entrega" class="form-control pull-right" id="datepicker2" required="">

                                </div>
                            </div>

                        </div>
                        <br>
                        <button type="submit" class="btn btn-primary">Crear Pedido</button>

                        <?php

                        $pedido = new PedidosC();
                        $pedido -> CrearPedidoC();
                        ?>
                    </form>
                </div>
            </div>     

            <div class="box-body">
            <table class="table table-bordered table-hover table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Cantidad</th>
                        <th>Fecha Envio</th>
                        <th>Fecha Entrega</th>
                        <th>Estado</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $columna = null;
                    $valor = null;
                    $resultado = PedidosC::VerPedidosC($columna, $valor);
                    foreach ($resultado as $key => $value) {
                        echo '<tr>
                            <td>' . $value["id"] . '</td>
                            <td>' . $value["cantidad"] . '</td>
                            <td>' . $value["fecha_envio"] . '</td>
                            <td>' . $value["fecha_entrega"] . '</td>';
                        if($value["estado"]=="Solicitado"){
                            echo '<td> 
                                <button class="btn btn-primary">'.$value["estado"].'</button>
                                <div class="form-group">
                                    <form method="post">
                                        <input type="hidden" name="estado" value="En Camino">
                                        <input type="hidden" name="id_pedido" value="'.$value["id"].'">
                                        <button class="btn btn-warning" data-toggle="tooltip" title="En Camino"><i class="fa fa-truck"></i></button>
                                    </form>
                                </div>
                            </td>';
                        } else if($value["estado"]=="En Camino"){
                            echo '<td> 
                                <button class="btn btn-warning">'.$value["estado"].'</button>
                                <div class="form-group">
                                    <form method="post">
                                        <input type="hidden" name="estado" value="Entregado">
                                        <input type="hidden" name="id_pedido" value="'.$value["id"].'">
                                        <button class="btn btn-success" data-toggle="tooltip" title="Entregado"><i class="fa fa-check"></i></button>
                                    </form>
                                </div>
                            </td>';
                        } else {
                            echo '<td> 
                                <button class="btn btn-success">'.$value["estado"].'</button>                                    
                            </td>';
                        }
                        
                        echo '</tr>';
                    }
                    $estado = new PedidosC();
                    $estado -> CambiarEstadoPedidoC();
                    ?>
                </tbody>
            </table>
            </div>
        </div>
    </section>
</div>