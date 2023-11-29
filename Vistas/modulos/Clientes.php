<div class="content-wrapper">
    <section class="content-header">
        <h1>Gestor de Clientes</h1>
    </section>
    <section class="content">
        <div class="box">
            <div class="box-header with-border">
                <button class="btn btn-primary" data-toggle="modal" data-target="#CrearCliente">Crear Cliente</button>
            </div>
            <div class="box-body">
                <table class="table table-bordered table-hover table-striped"> <!-- dt-responsive -->
                    <thead>
                        <tr>
                            <th>Apellido</th>
                            <th>Nombre</th>
                            <th>Documento</th>
                            <th>Fecha de Nacimiento</th>
                            <th>Dirección</th>
                            <th>Teléfono</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $columna = null;
                        $valor = null;
                        $resultado = ClientesC::VerClientesC($columna, $valor);
                        foreach ($resultado as $key => $value) {
                            echo '<tr>
                                <td>' . $value["apellido"] . '</td>
                                <td>' . $value["nombre"] . '</td>
                                <td>' . $value["documento"] . '</td>
                                <td>' . $value["fecha_nac"] . '</td>
                                <td>' . $value["direccion"] . '</td>
                                <td>' . $value["telefono"] . '</td>
                                <td>
                                    <a href="http://localhost/libreria/Compras/'.$value["id"].'"> 
                                        <button class="btn btn-primary"><i class="fa fa-shopping-cart"></i></button>
                                    </a>
                                    <button class="btn btn-success EditarCliente" data-toggle="modal" data-target="#EditarCliente" Cid="' . $value["id"] . '"><i class="fa fa-pencil"></i></button>                                   
                            </tr>';
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

<div class="modal fade" id="EditarCliente">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="post">
                <div class="moda-body">
                    <div class="box-body">
                        <div class="form-group">
                            <h2>Apellido:</h2>
                            <input type="text" name="apellidoE" id="apellido" class="input-lg form-control" required="">
                            <input type="hidden" name="idE" id="id" class="input-lg form-control" required="">
                        </div>
                        <div class="form-group">
                            <h2>Nombre:</h2>
                            <input type="text" name="nombreE" id="nombre" class="input-lg form-control" required="">
                        </div>
                        <div class="form-group">
                            <h2>Documento:</h2>
                            <input type="text" name="documentoE" id="documento" class="input-lg form-control" required="">
                        </div>
                        <div class="form-group">
                            <h2>Fecha de Nacimiento:</h2>
                            <input type="text" name="fecha_nacE" id="fecha_nac" class="input-lg form-control" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask required="">
                        </div>
                        <div class="form-group">
                            <h2>Dirección:</h2>
                            <input type="text" name="direccionE" id="direccion" class="input-lg form-control" required="">
                        </div>
                        <div class="form-group">
                            <h2>Teléfono:</h2>
                            <input type="text" name="telefonoE" id="telefono" class="input-lg form-control" data-inputmask="'mask': '+(99) 999-999-999'" data-mask required="">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">Editar</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                </div>
                <?php
                $actualizar = new ClientesC();
                $actualizar->EditarClienteC();
                ?>
            </form>
        </div>
    </div>
</div>

<?php
$borrar = new ClientesC();
$borrar->BorrarClienteC();
