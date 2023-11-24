<div class="content-wrapper">
    <section class="content-header">
        <h1>Bienvenido al Sistema</h1>
    </section>
    <section class="content">
        <div class="box">
            <div class="box-body">
                <div class="row">
                    <div class="col-lg-4 col-xs-6">
                    <div class="small-box bg-aqua">
                        <div class="inner">

                        <?php
                        $columna = null;
                        $valor = null;
                        $venta = VentasC::VerVentasC($columna, $valor);

                        $ventasTotal = count($venta);
                        echo '<h3>'.$ventasTotal.'</h3>';

                        ?>
                        <p>VENTAS</p>
                        </div>
                        <div class="icon">
                        <i class="fa fa-cart-plus"></i>
                        </div>
                        <a href="Ver-Ventas" class="small-box-footer">Ir a Ventas <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                    </div>
                    <div class="col-lg-4 col-xs-6">
                    <div class="small-box bg-green">
                        <div class="inner">
                        <?php
                        $columna = null;
                        $valor = null;
                        $libro = LibrosC::verLibrosC($columna, $valor);

                        $libroTotal = count($libro);
                        echo '<h3>'.$libroTotal.'</h3>';

                        ?>

                        <p>LIBROS</p>
                        </div>
                        <div class="icon">
                        <i class="fa fa-book"></i>
                        </div>
                        <a href="Libros" class="small-box-footer">Ir a Libros <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                    </div>
                    <div class="col-lg-4 col-xs-6">
                    <div class="small-box bg-yellow">
                        <div class="inner">
                        <?php
                        $columna = null;
                        $valor = null;
                        $cliente = ClientesC::VerClientesC($columna, $valor);

                        $clienteTotal = count($cliente);
                        echo '<h3>'.$clienteTotal.'</h3>';

                        ?>

                        <p>Clientes</p>
                        </div>
                        <div class="icon">
                        <i class="fa fa-users"></i>
                        </div>
                        <a href="Clientes" class="small-box-footer">Ir a Clientes <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                    </div>
                </div>
                <h2>Libros con Poco Stock</h2>
                <table class="table table-bordered table-hover table-striped dt-responsive">
                    <thead>
                        <tr>
                            <th>Título</th>
                            <th>Autor</th>
                            <th>Portada</th>
                            <th>Precio</th>
                            <th>Stock</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $columna = null;
                        $valor = null;

                        $resultado = LibrosC::verLibrosC($columna, $valor);
                        foreach ($resultado as $key => $value){
                            if($value["stock"]<=10){
                                echo '<tr>
                                    <td>' . $value["titulo"] . '</td>';
                                $columna = "id";
                                $valor = $value["id_autor"];
                                $autor = AutoresC::VerAutoresC($columna, $valor);
                                echo '<td>' . $autor["nombre"] . '</td>';
                            
                                echo '<td>
                                        <img src="' . $value["portada"] . '" width="60px" height="90px">
                                    </td>';
                                echo '<td>S/. ' .$value["precio"]. '</td>';
                                if($value["stock"]<=5){
                                    echo '<td>
                                    <button class="btn btn-danger">'.$value["stock"].'</button>
                                    <button class="btn btn-success AumentarStock" Lid="'.$value["id"].'" data-toggle="modal" data-target="#AumentarStock">
                                    <i class="fa fa-plus-square" data-toggle="tooltip" title="Aumentar Stock"></i></button>
                                    </td>';
                                }else if($value["stock"]<=10){
                                    echo '<td>
                                    <button class="btn btn-warning">'.$value["stock"].'</button>
                                    <button class="btn btn-success AumentarStock" Lid="'.$value["id"].'" data-toggle="modal" data-target="#AumentarStock">
                                    <i class="fa fa-plus-square" data-toggle="tooltip" title="Aumentar Stock"></i></button>
                                    </td>';
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

<div id="AumentarStock" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="post">
                <div class="modal-body">
                    <div class="box-body">
                        <h2>Stock Actual: </h2>
                        <input type="text" class="form-control input-lg" id="StockA" readonly="">
                        <input type="hidden" id="id_libro" name="id_libro">
                        
                        <h2>Stock a Sumar: </h2>
                        <input type="text" class="form-control input-lg" id="StockN" required="">

                        <h2>Stock Total: </h2>
                        <input type="text" class="form-control input-lg" id="StockT" name="stock" readonly="">
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">Agregar</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                </div>
                <?php
                $stock = new LibrosC;
                $stock -> AgregarStockC();
                ?>
            </form>

        </div>

    </div>
</div>