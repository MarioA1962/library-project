<div class="content-wrapper">
    <section class="content-header">
        <h1>Gestor de Géneros Literarios</h1>
        <br>
        <form method="post">
            <div class="col-md-3 col-xs-12">
                <input type="text" class="form-control" name="genero" placeholder="Ingresar Nuevo Género" required="">
            </div>
            <button type="submit" class="btn btn-primary">Agregar</button>
            <?php
            $crear = new GenerosC();
            $crear->CrearGeneroC();
            ?>
        </form>
    </section>
    <section class="content">
        <div class="box">
            <div class="box-body">
                <table class="table table-bordered table-hover table-striped"> <!-- dt-responsive -->
                    <thead>
                        <tr>
                            <th>N°</th>
                            <th>Nombre</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $columna = null;
                        $valor = null;
                        $resultado = GenerosC::VerGenerosC($columna, $valor);
                        foreach ($resultado as $key => $value) {
                            echo '<tr>
                                <td>' . ($key + 1) . '</td>
                                <td>
                                    <form method="post">
                                        <input type="text" name="nombreE" class="form-control" value="' . $value["nombre"] . '" required>
                                        <input type="hidden" name="idE" class="form-control" value="' . $value["id"] . '" required>
                                        <button type="submit" class="btn btn-success"><i class="fa fa-check"> Guardar</i></button>';

                            $editar = new GenerosC();
                            $editar->EditarGeneroC();

                            echo ' </form>
                                </td>
                                <td>
                                    <a href=""> 
                                        <button class="btn btn-primary"><i class="fa fa-book"> Ver Libros</i></button>
                                    </a>
                                    <button class="btn btn-danger BorrarGenero" Gid="' . $value["id"] . '" ><i class="fa fa-trash"></i></button>
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

<?php
$borrar = new GenerosC();
$borrar->BorrarGeneroC();
