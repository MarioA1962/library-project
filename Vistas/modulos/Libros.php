<div class="content-wrapper">
    <section class="content-header">
        <h1>Gestor de Libros</h1>
    </section>
    <section class="content">
        <div class="box">
            <div class="box-header with-border">
                <button class="btn btn-primary" data-toggle="modal" data-target="#AgregarLibro">Agregar Libro</button>
            </div>
            <div class="box-body">
            <table class="table table-bordered table-striped table-hover dt-responsive">
                    <thead>
                        <tr>
                            <th>Título</th>
                            <th>Género Literario</th>
                            <th>Autor</th>
                            <th>Sinopsis</th>
                            <th>Idioma</th>
                            <th>Portada</th>
                            <th>Fecha de Publicación</th>
                            <th>Stock</th>
                            <th>Precio</th>
                            <th></th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $columna = null;
                        $valor = null;

                        $resultado = LibrosC::verLibrosC($columna, $valor);
                        foreach ($resultado as $key => $value){
                            $sinopsis = substr($value["sinopsis"], 0, 300);
                            echo '<tr>
                                    <td>' . $value["titulo"] . '</td>';
                            $columna = "id";
                            $valor = $value["id_genero"];
                            $genero = GenerosC::VerGenerosC($columna, $valor);
                            echo '<td>' . $genero["nombre"] . '</td>';
                            $columna = "id";
                            $valor = $value["id_autor"];
                            $autor = AutoresC::VerAutoresC($columna, $valor);
                            echo '<td>' . $autor["nombre"] . '</td>';
                        
                            echo '<td>' . $sinopsis . '</td>
                                    <td>' . $value["idioma"] . '</td>
                                    <td>
                                        <img src="' . $value["portada"] . '" width="60px" height="90px">
                                    </td>
                                    <td>' . $value["fecha_publicacion"] . '</td>
                                    <td>';
                        
                            if ($value["stock"] <= 5) {
                                echo '<button class="btn btn-danger">' . $value["stock"] . '</button>';
                            } else if ($value["stock"] <= 10) {
                                echo '<button class="btn btn-warning">' . $value["stock"] . '</button>';
                            } else {
                                echo '<button class="btn btn-success">' . $value["stock"] . '</button>';
                            }
                        
                            echo '</td>
                                    <td>S/. ' . $value["precio"] . '</td>
                                    <td>
                                        <button class="btn btn-success"><i class="fa fa-pencil"></i></button>
                                        <button class="btn btn-danger"><i class="fa fa-trash"></i></button>
                                    </td>
                                </tr>';
                        }
                        ?>
                        <tr>
                            <td></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</div>

<div class="modal fade" id="AgregarLibro">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="box-body">
                        <div class="form-group">
                            <h2>Título:</h2>
                            <input type="text" name="titulo" class="form-control input-lg" required="">
                        </div>
                        <div class="form-group">
                            <h2>Genero Literario:</h2>
                            <select class="form-control input-lg" name="id_genero" required="">
                                <option value="">Seleccionar...</option>
                                <?php
                                    $columna = null;
                                    $valor = null;
                                    $generos = GenerosC::VerGenerosC($columna, $valor);
                                    foreach ($generos as $key => $g){
                                        echo '<option value="'.$g["id"].'">'.$g["nombre"].'</option>';
                                    }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <h2>Autor:</h2>
                            <select class="form-control input-lg" name="id_autor" required="">
                                <option value="">Seleccionar...</option>
                                <?php
                                    $columna = null;
                                    $valor = null;
                                    $autores = AutoresC::VerAutoresC($columna, $valor);
                                    foreach ($autores as $key => $a){
                                        echo '<option value="'.$a["id"].'">'.$a["nombre"].'</option>';
                                    }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <h2>Sinposis:</h2>
                            <textarea class="form-control" name="sinopsis" style="height: 100px" required=""></textarea>
                        </div>
                        <div class="form-group">
                            <h2>Idioma:</h2>
                            <input type="text" name="idioma" class="form-control input-lg" required="">
                        </div>
                        <div class="form-group">
                            <h2>Portada:</h2>
                            <input type="file" name="portada" class="form-control input-lg" required="">
                        </div>
                        <div class="form-group">
                            <h2>Fecha de Publicación:</h2>
                            <input type="text" name="fecha_publicacion" class="form-control input-lg" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask required="">
                        </div>
                        <div class="form-group">
                            <h2>Stock:</h2>
                            <input type="number" name="stock" class="form-control input-lg" required="">
                        </div>
                        <div class="form-group">
                            <h2>Precio:</h2>
                            <div class="input-group">
                                <span class="input-group-addon">S/.</span>
                                <input type="text" name="precio" class="form-control input-lg" required="">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Agregar</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                </div>
                <?php
                $agregar = new LibrosC();
                $agregar -> AgregarLibroC();
                ?>
            </form>
        </div>
    </div>
</div>