<?php

if ($_SESSION["rol"] != "Administrador") {
    echo '<script>
        window.location = "Inicio";
    </script>';
}

?>

<div class="content-wrapper">
    <section class="content-header">
        <h1>Gestor de Usuarios</h1>
    </section>
    <section class="content">
        <div class="box">
            <div class="box-header with-border">
                <button class="btn btn-primary" data-toggle="modal" data-target="#CrearUsuario">Crear Nuevo Usuario</button>
            </div>
            <div class="box-body">
                <table class="table table-bordered table-hover table-striped">
                    <thead>
                        <tr>
                            <th>Apellido</th>
                            <th>Nombre</th>
                            <th>Documento</th>
                            <th>Usuario</th>
                            <th>Contraseña</th>
                            <th>Rol</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $columna = null;
                        $valor = null;
                        $resultado = UsuariosC::VerUsuariosC($columna, $valor);
                        foreach ($resultado as $key => $value) {
                            echo '<tr>
                                <td>' . $value["apellido"] . '</td>
                                <td>' . $value["nombre"] . '</td>
                                <td>' . $value["documento"] . '</td>
                                <td>' . $value["usuario"] . '</td>
                                <td>' . $value["clave"] . '</td>
                                <td>' . $value["rol"] . '</td>
                                <td>
                                    <button class="btn btn-success EditarUsuario" data-toggle="modal" data-target="#EditarUsuario" Uid="' . $value["id"] . '"><i class="fa fa-pencil"></i></button>
                                    <button class="btn btn-danger BorrarUsuario" Uid="' . $value["id"] . '" Ufoto="' . $value["foto"] . '"><i class="fa fa-trash"></i></button>
                                </td>
                            </tr>';
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</div>

<div class="modal fade" id="CrearUsuario">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="post">
                <div class="moda-body">
                    <div class="box-body">
                        <div class="form-group">
                            <h2>Rol:</h2>
                            <select name="rol" class="input-lg form-control" required="">
                                <option value="">Seleccionar...</option>
                                <option value="Administrador">Administrador</option>
                                <option value="Vendedor">Vendedor</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <h2>Apellido:</h2>
                            <input type="text" name="apellido" class="input-lg form-control" required="">
                        </div>
                        <div class="form-group">
                            <h2>Nombre:</h2>
                            <input type="text" name="nombre" class="input-lg form-control" required="">
                        </div>
                        <div class="form-group">
                            <h2>Usuario:</h2>
                            <input type="text" name="usuario" class="input-lg form-control" required="">
                        </div>
                        <div class="form-group">
                            <h2>Contraseña:</h2>
                            <input type="text" name="clave" class="input-lg form-control" required="">
                        </div>
                        <div class="form-group">
                            <h2>Documento:</h2>
                            <input type="text" name="documento" class="input-lg form-control" required="">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Crear</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                </div>
                <?php
                $crear = new UsuariosC();
                $crear->CrearUsuarioC();
                ?>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="EditarUsuario">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="post">
                <div class="moda-body">
                    <div class="box-body">
                        <div class="form-group">
                            <h2>Rol:</h2>
                            <select name="rolE" id="rol" class="input-lg form-control" required="">
                                <option value="">Seleccionar...</option>
                                <option value="Administrador">Administrador</option>
                                <option value="Vendedor">Vendedor</option>
                            </select>
                        </div>
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
                            <h2>Usuario:</h2>
                            <input type="text" name="usuarioE" id="usuario" class="input-lg form-control" required="">
                        </div>
                        <div class="form-group">
                            <h2>Contraseña:</h2>
                            <input type="text" name="claveE" id="clave" class="input-lg form-control" required="">
                        </div>
                        <div class="form-group">
                            <h2>Documento:</h2>
                            <input type="text" name="documentoE" id="documento" class="input-lg form-control" required="">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">Editar</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                </div>
                <?php
                $editar = new UsuariosC();
                $editar->EditarUsuarioC();
                ?>
            </form>
        </div>
    </div>
</div>


<?php
$borrar = new UsuariosC();
$borrar->BorrarUsuarioC();
