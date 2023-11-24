<div class="content-wrapper">
    <section class="content-header">
        <h1>Crear Venta</h1>
    </section>
    <section class="content">
        <div class="box">
            <div class="box-header">
                <div class="col-md-4">
                    <h2>Seleccione el Cliente:</h2>
                    <form method="post">
                        <select class="form-control input-lg" id="select2" name="id_cliente" required="">
                            <option value="">Seleccione...</option>
                            <?php
                            $columna=null;
                            $valor=null;

                            $resultado = ClientesC::VerClientesC($columna, $valor);

                            foreach($resultado as $key => $value){

                                echo '<option value="'.$value["id"].'">'.$value["apellido"].' '.$value["nombre"].' - '.$value["documento"].'</option>';

                            }

                            echo'<input type="hidden" name="id_vendedor" value="'.$_SESSION["id"].'">';
                            ?>                            
                        </select>

                        <br><br>

                        <button type="submit" class="btn btn-primary"> Crear </button>
                        <?php
                        $crearV = new VentasC();
                        $crearV -> CrearVentasC();
                        ?>
                    </form>
                </div>
                <div class="col-md-4">
                    <br><br><br>

                    <button class="btn btn-default" data-toggle="modal" data-target="#CrearCliente">Crear Nuevo Cliente</button>

                </div>
            </div>
            <div class="box-body">
                <table class="table table-bordered table-hover table-striped dt-responsive">
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

                            if($value["estado"]=="Creado" && $_SESSION["id"]==$value["id_vendedor"]){
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

                                    echo '<td>'.$value["fecha"].'</td>';

                                    echo '<td>
                                                <a href="Venta/'.$value["id"].'">
                                                <button class="btn btn-success"> Gestionar Venta </button>
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

<div class="modal fade" id="CrearCliente">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="post">
                <div class="moda-body">
                    <div class="box-body">
                        <div class="form-group">
                            <h2>Apellido:</h2>
                            <input type="text" name="apellido" class="input-lg form-control" required="">
                            <?php
                            $exp = explode("/", $_GET["url"]);
                            echo '<input type="hidden" name="dir" class="input-lg form-control" value="' . $exp[0] . '">';
                            ?>
                        </div>
                        <div class="form-group">
                            <h2>Nombre:</h2>
                            <input type="text" name="nombre" class="input-lg form-control" required="">
                        </div>
                        <div class="form-group">
                            <h2>Documento:</h2>
                            <input type="text" name="documento" class="input-lg form-control" required="">
                        </div>
                        <div class="form-group">
                            <h2>Fecha de Nacimiento:</h2>
                            <input type="text" name="fecha_nac" class="input-lg form-control" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask required="">
                        </div>
                        <div class="form-group">
                            <h2>Dirección:</h2>
                            <input type="text" name="direccion" class="input-lg form-control" required="">
                        </div>
                        <div class="form-group">
                            <h2>Teléfono:</h2>
                            <input type="text" name="telefono" class="input-lg form-control" data-inputmask="'mask': '+(99) 999-999-999'" data-mask required="">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Crear</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                </div>
                <?php
                $crear = new ClientesC();
                $crear->CrearClienteC();
                ?>
            </form>
        </div>
    </div>
</div>