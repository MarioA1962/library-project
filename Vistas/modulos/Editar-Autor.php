<div class="content-wrapper">
    <section class="content-header">
        <?php
        $exp = explode("/", $_GET["url"]);
        $columna = "id";
        $valor = $exp[1];
        $autor = AutoresC::verAutoresC($columna, $valor);
        echo '<h1>Editar Autor: <b>'.$autor["nombre"].'</b></h1>';
        ?>
    </section>
    <section class="content">
        <div class="box">
            <div class="box-body">
                <form method="post" enctype="multipart/form-data">
                    <?php
                        echo '<div class="col-md-6">
                                <h2>Nombre:</h2>
                                <input type="text" name="nombreE" class="input-lg form-control" required="" value="'.$autor["nombre"].'">
                                <input type="hidden" name="idE" class="input-lg form-control" required="" value="'.$autor["id"].'">
                                <h2>Foto:</h2>
                                <img src="http://localhost/libreria/'.$autor["foto"].'" width="100%">
                                <h3>Cambiar Foto:</h3>
                                <input type="file" name="fotoE" class="input-lg form-control">
                                <input type="hidden" name="fotoActual" class="input-lg form-control" required="" value="'.$autor["foto"].'">
                            </div>
                            <div class="col-md-6">
                                <h2>Bibliografía:</h2>
                                <textarea class="form-control" name="bibliografiaE" style="height: 250px" required="">'.$autor["bibliografia"].'</textarea>
                                <br>
                                <button type="submit" class="btn btn-success btn-lg">Guardar Cambios</button>
                            </div>';

                            $actualizar = new AutoresC();
                            $actualizar -> ActualizarAutorC();
                    ?>
                </form>
            </div>
        </div>
    </section>
</div>