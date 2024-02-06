<?php 
    $msj = "";
    $accion = filter_input(INPUT_POST, "accion", FILTER_SANITIZE_STRING);
    if(is_string($accion) && ($accion === "login")){
        $usuario = filter_input(INPUT_POST, "campoName", FILTER_SANITIZE_STRING);
        $clave = filter_input(INPUT_POST, "campoPass", FILTER_SANITIZE_STRING);
        require_once 'files/modelo/Conexion.php';
        require_once 'lib/config.php';
        try{
            $conexion = new PDO(DB_DATA, DB_USER, DB_PASS);
            if(!$conexion) throw new PDOException();
            $conexion->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
            $clave = md5($clave);

            $sql = "select id_usuario, user_cuenta, user_apellido, user_nombres from usuarios where user_cuenta = :cuenta AND user_clave = :clave";

            if($stmt = $conexion->prepare($sql)){
                if($stmt->execute(array("cuenta" => $usuario, "clave"=> $clave))){
                    if($stmt->rowCount() == 1){
                        $registro = $stmt->fetch();
                        session_start();
                        $_SESSION['id_usuario'] = (int)$registro->id_usuario;
                        $_SESSION['cuenta'] = $registro->user_cuenta;
                        $_SESSION['usuario'] = $registro->user_nombres;
                        $_SESSION['perfil'] = "";
                        $_SESSION['logueado'] = 2019;
                        $stmt = null;
                        $conexion = null;

                        unset($registro);
                        header("Location:files/index.php");
                    }
                    else $msj = "Datos incorrectos";
                    $stmt->closeCursor();
                }
                else $msj = "No se pudo ejecutar la operacion 1";
                $stmt = null;
            }
            else $msj = "No se pudo ejecutar la operacion 2";
            $conexion = null;

        }catch(Exception $ex){
            $msj = "No se pudo conectar a la base de datos";
        }
    }
?>
<!DOCTYPE html>

<html>
    <head>
        <title>Login - Sistema</title>
        <?php require_once 'files/secciones/head.php'; ?>
        
        <script src="js/valida_login.js" type="text/javascript"></script>
        <link href="css/login.css" rel="stylesheet" type="text/css"/>
        <!--<script src="js/valida_alta.js" type="text/javascript"></script>-->
    </head>
    <body>
        <header>
            <!-- Nombre del sistema web -->
            <h1>Gestión Alumnos Web</h1>
        </header>
        <main>
            <!-- Formulario de autenticacion-->
        <div class="card">
            <div class="card-header text-center">
                <h4>Ingreso al Sistema</h4>
            </div>
            <div class="card-body col-6 align-self-center">
                <form name="formL" id="formL" action="index.php" method="POST" onsubmit="return vlogin()" autocomplete="off">
                    <div class="form-group text-center">
                        <label for="campoName">Nombre Usuario</label>
                        <input type="text" class="form-control text-center" name="campoName" id="campoName" placeholder="Nombre de usuario de 6 a 30 caracteres" minlength=6 maxlength=30>
                        <small style="visibility: hidden;" id="msj" class="msj"></small>
                    </div>
                    <div class="form-group text-center">
                        <label for="campoPass">Contraseña</label>
                        <input type="password" class="form-control text-center" name="campoPass" id="campoPass" placeholder="Contraseña de 8 a 15 caracteres" minlength=8 maxlength=15>
                        <small style="visibility: hidden;" id="msj2" class="msj2"></small>
                    </div>
                    <button type="submit" class="btn btn-info col">Ingresar</button>
                    <input name="accion" type="hidden" value="login"/>
                </form>
                
            </div>
            <?php if($msj != ""){  ?>
            <div id="msjs" class="alert alert-warning alert-dismissible col-5 align-self-center" role="alert">
                <button type="button" class="close" data-dismiss="alert">
                <span>&times;</span></button>
                <small class=""><?php echo $msj ?></small>
            </div>
            <?php } ?>
        </div>
            
        </main>
         <?php require_once 'files/secciones/footer.php'; ?>
    </body>
</html>
