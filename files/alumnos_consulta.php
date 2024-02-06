<?php require_once 'secret.php';?>
<!DOCTYPE html>
<html>
    <head>
        <title>Alumnos Consulta - Sistema</title>
        <?php require_once 'secciones/head.php'; ?>
        <link href="css/estilos.css" rel="stylesheet" type="text/css"/>
        <script defer src="js/valida_consulta.js" type="text/javascript"></script>
        <script defer src="js/valida_alumno.js" type="text/javascript"></script>
    </head>
    <body>
        <header>
             <h1>Gestión Alumnos Web</h1>
        </header>
        <main>
            <input type="hidden" id="idAlu" value="<?php echo $_GET["id"]; ?>"/>
            <div class="card">
                <div class="card-header text-center">
                    <div class="d-flex justify-content-between">
                        <div class="">
                            <a href="files/index.php">Inicio</a>/
                            <a href="files/alumnos.php">Alumnos</a>/
                            Consulta de Alumnos</div>
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
                                <a class="nav-link active" href="files/alumnos.php" role="tab">Alumnos</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="files/usuarios.php" role="tab">Usuarios</a>
                            </li>
                        </ul>
                    </div>
                    <div id="contenido">
                        <h5>Datos del Alumno</h5>
                        <div id="idalerta" hidden class="alert alert-success alert-dismissible col-7" role="alert">
                                                        
                        </div>
                        <form id="fconsulta" action="" method="" >
                            <fieldset id="fieldset" disabled>
                            <div class="form-group mx-2 form-inline">
                                <label for="campoName">Nombre</label>
                                <input disabled type="text" class="form-control mx-2" name="campoName" id="campoName" placeholder="Nombres" minlength=0 maxlength=80 >
                                <small style="visibility: hidden;" id="msj1"></small>
                            </div>
                            <div class="form-group mx-2 form-inline">
                                <label for="campoAp">Apellido</label>
                                <input disabled type="text" class="form-control mx-2" name="campoAp" id="campoAp" placeholder="Apellido" minlength=0 maxlength=80>
                                <small style="visibility: hidden;" id="msj2" ></small>
                            </div>
                            <div class="form-group mx-2 form-inline">
                                <label for="campoDNI">DNI</label>
                                <input disabled type="text" class="form-control mx-2" name="campoDNI" id="campoDNI" placeholder="DNI" maxlength=8>
                                <small style="visibility: hidden;" id="msj3" ></small>
                            </div>
                            <div class="form-group mx-2 form-inline">
                                <label for="campoCuil">CUIL</label>
                                <input disabled type="text" class="form-control mx-2" name="campoCuil" id="campoCuil" placeholder="Cuil" maxlength=11>
                                <small style="visibility: hidden;" id="msj4" ></small>
                            </div>
                            <div class="form-group mx-2 form-inline">
                                <label for="campoDomicilio">Domicilio</label>
                                <input disabled type="text" class="form-control mx-2" name="campoDomicilio" id="campoDomicilio" placeholder="Domicilio"maxlength=100>
                                <small style="visibility: hidden;" id="msj5"></small>
                            </div>
                            
                            <div class="form-group mx-2 form-inline">
                                <label for="campoLocalidad">Localidad</label>
                                <input disabled type="text" class="form-control mx-2" name="campoLocalidad" id="campoLocalidad" placeholder="Domicilio"maxlength=100>
                                <small style="visibility: hidden;" id="msj6"></small>
                            </div>
                            <div class="form-group mx-2 form-inline">
                                <label for="campoProvincia">Provincia</label>
                                <input disabled type="text" class="form-control mx-2" name="campoProvincia" id="campoProvincia" placeholder="Domicilio"maxlength=100>
                                <small style="visibility: hidden;" id="msj7"></small>
                            </div>
                            <div class="form-group mx-2 form-inline">
                                <label for="campoTel1">Teléfono 1</label>
                                <input disabled type="number" class="form-control mx-2" name="campoTel1" id="campoTel1" placeholder="Telefono1" maxlength=20>
                                <small style="visibility: hidden;" id="msj8"></small>
                            </div>
                            <div class="form-group mx-2 form-inline">
                                <label for="campoTel2">Teléfono 2</label>
                                <input disabled type="number" class="form-control mx-2" name="campoTel2" id="campoTel2" placeholder="Telefono2" maxlength=20>
                                <small style="visibility: hidden;" id="msj9"></small>
                            </div>
                            <div class="form-group mx-2 form-inline">
                                <label for="campoMail">Correo Electrónico</label>
                                <input disabled type="email" class="form-control mx-2" name="campoMail" id="campoMail" placeholder="Correo electrónico" minlength=4 maxlength=120>
                                <small style="visibility: hidden;" id="msj10"></small>
                            </div>
                            
                            <div class="form-group mx-2 form-inline">
                                <label for="campoFechaN">Fecha de Nacimiento</label>
                                <input type="date" class="form-control mx-2" name="campoFechaN" id="campoFechaN" placeholder="Fecha de Nacimiento" maxlength=20>
                                <small style="visibility: hidden;" id="msj12"></small>
                            </div>
                            </fieldset>
                             <div id="botones" class="text-center col-8">
                                <button id="bmodifica" type="button" class="btn btn-info col-2" onclick="hacer_click()">Modificar</button>
                                <button id="belimina" type="button" class="btn btn-danger col-2"  data-toggle="modal" data-target="#modalE">Eliminar</button>
                                <button id="bacepta" disabled type="button" class="btn btn-info col-2" onclick="alumno.actualizar()">Aceptar</button>
                                <button id="bcancela" disabled type="button" class="btn btn-secondary col-2" onclick="alumno.cancelar()">Cancelar</button>
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
                    <button type="button" class="btn btn-info" data-dismiss="modal" onclick="alumno.eliminar()">Si</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                </div>
            </div>
          </div>

</html>
