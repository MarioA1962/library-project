<div class="login-box">
    <div class="login-logo">
        <h1>Librería</h1>
    </div>
    <div class="login-box-body">
        <p class="login-box-msg">Inicio de Sesión</p>
        <form method="post">
            <div class="form-group has-feedback">
                <input type="text" class="form-control" name="usuario" placeholder="Usuario">
                <span class="glyphicon glyphicon-user form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <input type="password" class="form-control" name="clave" placeholder="Contraseña">
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div>
            <div class="row">
                <div class="clo-md-12">
                    <button type="submit" class="btn btn-primary btn-block btn-flat">Ingresar</button>
                </div>
            </div>
            <?php
            if (isset($_POST["usuario"]) && isset($_POST["clave"])) {
                $iniciar = new UsuariosC();
                $iniciar->IniciarSesionC();
            }
            ?>
        </form>
    </div>
</div>