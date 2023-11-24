<div class="content-wrapper">
    <section class="content-header">
        <?php
        $exp=explode("/", $_GET["url"]);
        if(isset($exp[1])){

            $columna = "id";
            $valor = $exp[1];

            $vent = VentasC::VerVentasC($columna, $valor);

            if($vent["estado"]=="Finalizado"){
                echo '<script>
                window.location = "http://localhost/libreria/Crear-Venta";
                </script>';
                return;
                
            }

            $columna = "id";
            $valor = $exp[1];
            $resultado = VentasC::VerVentasC($columna, $valor);

            $valor = $resultado["id_vendedor"];
            $vendedor = UsuariosC::VerUsuariosC($columna, $valor);

            $valor = $resultado["id_cliente"];
            $cliente = ClientesC::VerClientesC($columna, $valor);

            $fecha = explode(" ", $resultado["fecha"]);
            $fechaF = explode("-", $fecha[0]);

            echo '<h1>Gestionar la Venta ID: '.$exp[1].'</h1>
            <h3><b>Vendedor:</b> '.$vendedor["apellido"].' '.$vendedor["nombre"].'</h3>
            <h3><b>Cliente:</b> '.$cliente["apellido"].' '.$cliente["nombre"].'</h3>
            <h3><b>Fecha:</b> '.$fechaF[2].'-'.$fechaF[1].'-'.$fechaF[0].'</h3>';

            $total = VentasC::PrecioTotalC($exp[1]);

            echo '<h3><b>Precio Total: </b>'.$total.' S/.</h3>';

        }
        ?>

        <br>

        <button class="btn btn-primary" data-toggle="modal" data-target="#AgregarLibro">Agregar Libro a la Venta</button>
        
        <form method="post">
            <?php
            if(isset($exp[1])){
                echo '<input type="hidden" name="fechaF" value="'.$resultado["fecha"].'" >
                <input type="hidden" name="id_ventaF" value="'.$exp[1].'" >';
            }
            ?>
            <button type="submit" class="btn btn-success pull-right">Finalizar Venta</button>
            <?php
            $estado = new VentasC();
            $estado -> FinalizarVentasC();
            ?>

        </form>
        <br>
    </section>
    <section class="content">
        <div class="box">
            <div class="box-body">
                <table class="table table-bordered table-hover table-striped dt-responsive">
                    <thead>
                        <tr>
                            <th>N°</th> 
                            <th>Libro</th>
                            <th>Autor</th>
                            <th>Portada</th>
                            <th>Precio</th>
                            <th></th>
                        </tr>

                    </thead>

                    <tbody>
                        <?php
                        $columna = null;
                        $valor = null;

                        $ven = VentasC::VerVentas2C($columna, $valor);

                        foreach($ven as $key => $value){
                            if(isset($exp[1])){
                                if($value["id_venta"]==$exp[1]){
                                    echo '<tr><td> '.($key+1).' </td>';                              
                                    $columna = "id";
                                    $valor = $value["id_libro"];
                                    $libro = LibrosC::verLibrosC($columna, $valor);
                                    echo '<td> '.$libro["titulo"].' </td>';

                                    $columna = "id";
                                    $valor = $libro["id_autor"];
                                    $autor = AutoresC::VerAutoresC($columna, $valor);
                                    echo '<td>' . $autor["nombre"] . '</td>

                                    <td> <img src="http://localhost/libreria/'.$libro["portada"].'" width="50px"></td>

                                    <td>S/.' . $value["precio"] . '</td>

                                    <td>
                                        <button class="btn btn-danger QuitarLibro" Vid="'.$exp[1].'" Lid="'.$libro["id"].'" LVid="'.$value["id"].'" 
                                        LStock="'.$libro["stock"].'"><i class="fa fa-times"></i></button>
                                    </td>

                                    </tr>';

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

<div class="modal fade" id="AgregarLibro">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="post">
                <div class="moda-body">
                    <div class="box-body">
                        <div class="form-group">
                            <h2>Libro:</h2>
                            <?php
                            echo '<input type="hidden" name="id_venta" value="'.$exp[1].'">

                            <select class="form-control input-lg SL" name="id_libro" style="width:100%" id="select2" required="">
                                <option value="">Seleccionar...</option>';

                                $columna = null;
                                $valor = null;

                                $libros = LibrosC::verLibrosC($columna, $valor);

                                foreach($libros as $key => $value){
                                    if($value["stock"]!=0){
                                        echo'<option Lid="'.$value["id"].'" value="'.$value["id"].'">'.$value["titulo"].'</option>';
                                    }
                                }

                            ?>                

                            </select>
                        </div>
                        <div class="form-group">
                            <h2>Portada:</h2>
                            <img src="" id="portada" width="150px">
                        </div>
                        <div class="form-group">
                            <h2>Precio:</h2>
                            <div class="input-group">
                                <span class="input-group-addon">S/.</span>
                                <input type="text" class="form-control input-lg" id="precio" name="precio" readonly="">

                                <input type="hidden" id="stock" name="stock">

                            </div>
                        </div>

                    </div>
                </div> 
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Agregar a la Venta</button>
                    <button type="submit" class="btn btn-danger" data-dismiss="modal">Cerrar</button>

                </div>

                <?php
                $agregar = new VentasC();
                $agregar -> AgregarLibroVentaC();
                ?>

            </form>

        </div>

    </div>

</div>

<?php

$quitar = new VentasC();
$quitar -> QuitarLibroC();
?>