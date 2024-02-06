<?php require_once 'secret.php';?>
<!DOCTYPE html>
<html>
    <head>
        <title>Usuarios Consulta - Sistema</title>
        <?php require_once 'secciones/head.php'; ?>
        <link href="css/estilos.css" rel="stylesheet" type="text/css"/>
        <script defer src="js/valida_consulta.js" type="text/javascript"></script>
        <script defer src="js/valida_alta.js" type="text/javascript"></script>
    </head>
    <body>
        <header>
             <h1>Gestión Alumnos Web</h1>
        </header>
        <main>
            <input type="hidden" id="idUser" value="<?php echo $_GET["id"]; ?>"/>
            <div class="card">
                <div class="card-header text-center">
                    <div class="d-flex justify-content-between">
                        <div class="">
                            <a href="files/index.php">Inicio</a>/
                            <a href="files/usuarios.php">Usuarios</a>/
                            Consulta de Usuarios</div>
                        <div class="salir">
                            <strong>¡Bienvenido <em><?php echo  $_SESSION['usuario'] ?></em>!</strong>
                            <a href="files/logoff.php" id=""><strong>Cerrar sesión</strong></a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div id="menuP">
                        <ul class="nav nav-pills flex-column col-sm-2" role="tablist">
                            <li class="nav-item ">
                               <a class="nav-link" href="files/index.php" role="tab">Inicio</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="files/alumnos.php" role="tab">Alumnos</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" href="files/usuarios.php" role="tab">Usuarios</a>
                            </li>
                        </ul>
                    </div>
                    <div id="contenido">
                        <h5>Datos del Usuario</h5>
                        <div id="idalerta" hidden class="alert alert-success alert-dismissible col-7" role="alert">
                                                        
                        </div>
                        <form id="fconsulta" action="" method="" >
                            <fieldset id="fieldset" disabled>
                            <div class="form-group mx-2 form-inline">
                                <label for="campoName">Nombre</label>
                                <input disabled type="text" class="form-control mx-2" name="campoName" id="campoName" placeholder="Nombre">
                            </div>
                             <div class="form-group mx-2 form-inline">
                                <label for="campoAp">Apellido</label>
                                <input disabled type="text" class="form-control mx-2" name="campoAp" id="campoAp" placeholder="Apellido">
                            </div>
                             <div class="form-group mx-2 form-inline">
                                <label for="campoNU">Nombre de Usuario</label>
                                <input disabled type="text" class="form-control mx-2" name="campoNU" id="campoNU" placeholder="Usuario">
                            </div>
                            <div class="form-group mx-2 form-inline">
                                <label for="campoMail">Correo Electrónico</label>
                                <input disabled type="email" class="form-control mx-2" name="campoMail" id="campoMail" placeholder="Correo electrónico">
                            </div>

                            
                            </fieldset>
                            <div id="botones" class="text-center col-8">
                                <button id="bmodifica" type="button" class="btn btn-info col-2" onclick="hacer_click()">Modificar</button>
                                <button id="belimina" type="button" class="btn btn-danger col-2"  data-toggle="modal" data-target="#modalE">Eliminar</button>
                                <button id="bacepta" disabled type="button" class="btn btn-info col-2" onclick="usuario.actualizar()">Aceptar</button>
                                <button id="bcancela" disabled type="button" class="btn btn-secondary col-2" onclick="usuario.cancelar()">Cancelar</button>
                            </div>
                         </form>
                    </div>
                </div>
                
            </div>
        </main>
        
        <?php require_once 'secciones/footer.php'; ?>   
    </body>
    <!-- The Modal -->
        <div class="modal fade" id="modalE">
          <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h6>Un momento...</h6>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    ¿Esta seguro que desea eliminar este usuario?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-info" data-dismiss="modal" onclick="usuario.eliminar()">Si</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                </div>
            </div>
          </div>

</html>