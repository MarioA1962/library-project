<div class="content-wrapper">
    <section class="content-header">
        <h1>Gestor de los Autores</h1>
    </section>
    <section class="content">
        <div class="box">
            <div class="box-header with-border">
                <button class="btn btn-primary" data-toggle="modal" data-target="#AgregarAutor">Agregar Autor</button>
            </div>
            <div class="box-body">
                <table class="table table-bordered table-hover table-striped dt-responsive">
                    <thead>
                        <tr>
                            <th>N°</th>
                            <th>Foto</th>
                            <th>Autor</th>
                            <th>Bibliografía</th>
                            <th></th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $columna = null;
                        $valor = null;

                        $resultado = AutoresC::verAutoresC($columna, $valor);
                        foreach ($resultado as $key => $value){
                            $bibliografia = substr($value["bibliografia"], 0, 300);
                            echo '<tr>
                                    <td>' . ($key+1) . '</td>';
                                    echo '<td>
                                        <img src="' . $value["foto"] . '" width="150px" height="100px">
                                    </td>';
                                    echo '<td>' . $value["nombre"] . '</td>';
                                    echo '<td>' . $bibliografia . '</td>';
                                    echo '<td>
                                        <a href="Editar-Autor/' . $value["id"] . '">
                                            <button class="btn btn-success"><i class="fa fa-pencil"></i></button>
                                        </a>
                                        <br>
                                        <button class="btn btn-danger BorrarAutor" Aid="' . $value["id"] . '" Afoto="' . $value["foto"] . '"><i class="fa fa-trash"></i></button>
                                    </td>';
                                    echo '</tr>';
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</div>

<div class="modal fade" id="AgregarAutor">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="box-body">
                        <div class="form-group">
                            <h2>Nombre:</h2>
                            <input type="text" name="nombre" class="form-control input-lg" required="">
                        </div>
                        <div class="form-group">
                            <h2>Bibliografía:</h2>
                            <textarea class="form-control" name="bibliografia" style="height: 100px" required=""></textarea>
                        </div>
                        <div class="form-group">
                            <h2>Foto:</h2>
                            <input type="file" name="foto" class="form-control input-lg" required="">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Agregar</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                </div>
                <?php
                $crear = new AutoresC();
                $crear->AgregarAutorC();
                ?>
            </form>
        </div>
    </div>
</div>

<?php
$borrar = new autoresC();
$borrar -> BorrarAutorC();