<?php 

require_once 'secret.php';

$accion = filter_input(INPUT_POST, "accion", FILTER_SANITIZE_STRING);

    if(is_string($accion) && ($accion == "validar")){
        $cuil1 = filter_input(INPUT_POST, "campoCuil", FILTER_SANITIZE_STRING);
        $dni1 = filter_input(INPUT_POST, "campoDNI", FILTER_SANITIZE_STRING);
        $cadena2 = str_split($dni1);

        $cadena = substr($cuil1,2,9);
       
        if($dni1.length == 7){
            $dni1 = "0".$dni1;
        }else{
            if($cadena != $dni1){
                //echo "Cuil y DNI no son iguales";
            }
        }
    }

?>
<!DOCTYPE html>
<html>
    <head>
        <title>Alumnos Alta - Sistema</title>
        <?php require_once 'secciones/head.php'; ?>
        <script defer src="js/valida_alumno.js" type="text/javascript"></script>
        <link href="css/estilos.css" rel="stylesheet" type="text/css"/>
        <script type="text/javascript" rel="javascript">
            function activar(){
                let link = document.getElementById("menuA");
                link.setAttribute("class","nav-link active");
            }
        </script> 
    </head>
    <body>
        <header>
             <h1>Gestión Alumnos Web</h1>
        </header>
        <main>
            <div class="card">
                <div class="card-header text-center">
                    <div class="d-flex justify-content-between">
                        <div class=""><a href="files/index.php">Inicio</a>/
                            <a href="files/alumnos.php">Alumnos</a>/
                            Alta de Alumnos</div>
                        <div class="salir">
                            <strong>¡Bienvenido <em><?php echo  $_SESSION['usuario'] ?></em>!</strong>
                            <a href="files/logoff.php" id=""><strong>Cerrar sesión</strong></a>
                        </div>
                    </div>
                </div>
                <div id="cardA" class="card-body">
                    <?php require_once 'secciones/menu.php'; ?>
                    <script type="text/javascript" rel="javascript"> activar();</script>
                    
                    <div id="idalerta" hidden class="alert alert-success alert-dismissible col-7" role="alert">
                            
                    </div>
                    <div id="contenido">
                        <!--<small style="visibility: hidden;" id="alerta" >Datos ingresados</small>-->
                        <form id="formA" action="" method="" autocomplete="off">
                            <div class="form-group mx-2 form-inline">
                                <label for="campoAp">Apellido</label>
                                <input type="text" class="form-control mx-2" name="campoAp" id="campoAp" placeholder="Apellido" minlength=0 maxlength=80>
                                <small style="visibility: hidden;" id="msj1" ></small>
                            </div>
                            <div class="form-group mx-2 form-inline">
                                <label for="campoName">Nombre</label>
                                <input type="text" class="form-control mx-2" name="campoName" id="campoName" placeholder="Nombres" minlength=0 maxlength=80 >
                                <small style="visibility: hidden;" id="msj2"></small>
                            </div>
                            <div class="form-group mx-2 form-inline">
                                <label for="campoDNI">DNI</label>
                                <input type="text" class="form-control mx-2" name="campoDNI" id="campoDNI" placeholder="DNI" minlength=7 maxlength=8>
                                <small style="visibility: hidden;" id="msj3" ></small>
                            </div>
                            <div class="form-group mx-2 form-inline">
                                <label for="campoCuil">CUIL</label>
                                <input type="text" class="form-control mx-2" name="campoCuil" id="campoCuil" placeholder="Cuil" minlength=11 maxlength=11>
                                <small style="visibility: hidden;" id="msj4" ></small>
                            </div>
                            <div class="form-group mx-2 form-inline">
                                <label for="campoDomicilio">Domicilio</label>
                                <input type="text" class="form-control mx-2" name="campoDomicilio" id="campoDomicilio" placeholder="Domicilio"maxlength=100>
                                <small style="visibility: hidden;" id="msj5"></small>
                            </div>
                            
                            <div class="form-group mx-2 form-inline">
                                <label for="campoLocalidad">Localidad</label>
                                <input type="text" class="form-control mx-2" name="campoLocalidad" id="campoLocalidad" placeholder="Localidad"maxlength=100>
                                <small style="visibility: hidden;" id="msj6"></small>
                            </div>
                            <div class="form-group mx-2 form-inline">
                                <label for="campoProvincia">Provincia</label>
                                <input type="text" class="form-control mx-2" name="campoProvincia" id="campoProvincia" placeholder="Provincia"maxlength=100>
                                <small style="visibility: hidden;" id="msj7"></small>
                            </div>
                            <div class="form-group mx-2 form-inline">
                                <label for="campoTel1">Teléfono 1</label>
                                <input type="number" class="form-control mx-2" name="campoTel1" id="campoTel1" placeholder="Telefono1" maxlength=20>
                                <small style="visibility: hidden;" id="msj8"></small>
                            </div>
                            <div class="form-group mx-2 form-inline">
                                <label for="campoTel2">Teléfono 2</label>
                                <input type="number" class="form-control mx-2" name="campoTel2" id="campoTel2" placeholder="Telefono2" maxlength=20>
                                <small style="visibility: hidden;" id="msj9"></small>
                            </div>
                            <div class="form-group mx-2 form-inline">
                                <label for="campoMail">Correo Electrónico</label>
                                <input type="email" class="form-control mx-2" name="campoMail" id="campoMail" placeholder="Correo electrónico" minlength=4 maxlength=120>
                                <small style="visibility: hidden;" id="msj10"></small>
                            </div>
                            <div class="form-group mx-2 form-inline">
                                <label for="campoMail2">Confirme Correo Electrónico</label>
                                <input type="email" class="form-control mx-2" name="campoMail2" id="campoMail2" placeholder="Confirme correo electrónico" minlength=4 maxlength=120>
                                <small style="visibility: hidden;" id="msj11"></small>
                            </div>
                            <div class="form-group mx-2 form-inline">
                                <label for="campoFechaN">Fecha de Nacimiento</label>
                                <input type="date" class="form-control mx-2" name="campoFechaN" id="campoFechaN" placeholder="Fecha de Nacimiento" maxlength=20>
                                <small style="visibility: hidden;" id="msj12"></small>
                            </div>
                            <div id="botones" class="text-center mt-2 col-8">
                                <!--<button type="submit" class="btn btn-info col-2" >Validar</button>
                                <input id="accion" name="accion" type="hidden" value="validar"/>-->
                                                              
                                <button type="button" class="btn btn-info col-2" onclick="valta()">Agregar</button>
                                <button type="reset" class="btn btn-secondary col-2" onclick="alumno.resetearAlta">Limpiar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </main>
         <?php require_once 'secciones/footer.php'; ?>
    </body>
</html>
