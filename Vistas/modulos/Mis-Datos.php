<div class="content-wrapper">
    <section class="content-header">
        <h1>Gestor de su Perfil Personal</h1>
    </section>
    <section class="content">
        <div class="box">
            <div class="box-body">
                <form method="post" enctype="multipart/form-data">
                    <div class="row">
                        <?php
                        $perfil = new UsuariosC();
                        $perfil->VerPerfilC();
                        ?>
                    </div>
                    <div class="box-footer">
                        <button type="submit" class="btn btn-success btn-lg pull-right">Guardar Cambios</button>
                    </div>
                    <?php
                    $cambiar = new UsuariosC();
                    $cambiar->EditarPerfilC();
                    ?>
                </form>
            </div>
        </div>
    </section>
</div>