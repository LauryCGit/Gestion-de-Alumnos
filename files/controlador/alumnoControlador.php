<?php
    //convierte el stringify a json
    $data = json_decode($_POST["data"]);
    $respuesta = json_decode('{"accion":"","registros":[],"error":"","total":0}');
    
    require_once '../entidades/Alumno.php';
    require_once '../modelo/Conexion.php';
    require_once '../modelo/AlumnoDAO.php';
    
    $respuesta->{"accion"} = $data->{"accion"};
    
//validaciones: que exista data en post, no haya errores en json_decode
    if($data->{"accion"} === "ALTA"){
        try{
        $con = Conexion::establecer();
        $alumno = new Alumno();
        $alumno->setApellido($data->{"apellido"});
        $alumno->setNombres($data->{"nombres"});
        $alumno->setDni($data->{"dni"});
        $alumno->setCuil($data->{"cuil"});
        $alumno->setDomicilio($data->{"domicilio"});
        $alumno->setLocalidad($data->{"localidad"});
        $alumno->setProvincia($data->{"provincia"});
        $alumno->setTelefono1($data->{"telefono1"});
        $alumno->setTelefono2($data->{"telefono2"});
        $alumno->setCorreo($data->{"correo"});
        $alumno->setFechaNac($data->{"fechaNac"});
        
        $alumnoDAO = new AlumnoDAO($con);
        
        if($alumnoDAO->guardar($alumno)){
            $respuesta->{"registros"} = $alumno->toJSON();
        }else{
            $respuesta->{"error"} = $alumnoDAO->getError();
        }
        //automaticamente pdo cierra la conexion
        $con = null;
    }catch (PDOException $ex){
        echo $ex->getMessage();
    }
    
    }
    else if($data->{"accion"} === "LISTAR"){
            try{
            $con = Conexion::establecer();
            $alumnoDAO = new AlumnoDAO($con);
            $respuesta->{"registros"} = $alumnoDAO->listar($data);
            $respuesta->{"error"} = $alumnoDAO->getError();
            $respuesta->{"total"} = $alumnoDAO->getRegistrosEncontrados();
            $con = null;
        }catch (PDOException $ex){
            echo $ex->getMessage();
        }
    }
    else if($data->{"accion"} === "CARGAR"){
        try{
            $con = Conexion::establecer();
            $alumnoDAO = new AlumnoDAO($con);
            
            $alumno = $alumnoDAO->cargar($data->{"id"});

            if($alumno->getId() > 0){
                $respuesta->{"registros"} = $alumno->toJSON();
            }
            else{
                $respuesta->{"error"} = $alumnoDAO->getError();
            }

            $con = null;
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
    }
    else if ($data->{"accion"} === "ACTUALIZAR"){
        try{
            $con = Conexion::establecer();              
            $alumno = new Alumno();
            $alumno->setId((int)$data->{"id"});
            $alumno->setApellido($data->{"apellido"});
            $alumno->setNombres($data->{"nombres"});
            $alumno->setDni($data->{"dni"});
            $alumno->setCuil($data->{"cuil"});
            $alumno->setDomicilio($data->{"domicilio"});
            $alumno->setLocalidad($data->{"localidad"});
            $alumno->setProvincia($data->{"provincia"});
            $alumno->setTelefono1($data->{"telefono1"});
            $alumno->setTelefono2($data->{"telefono2"});
            $alumno->setCorreo($data->{"correo"});
            $alumno->setFechaNac($data->{"fechaNac"});
           
            
            $alumnoDAO = new AlumnoDAO($con);
            if($alumnoDAO->actualizar($alumno)){
                $respuesta->{"registros"} = $alumno->toJSON();
                
            }else{
                $respuesta->{"error"} = $alumnoDAO->getError();
            }
            
            $con = null;
        }catch (PDOException $ex){
            echo $ex->getMessage();
        }
    }
    else if ($data->{"accion"} === "ELIMINAR"){
        try{
            $con = Conexion::establecer();              
            $alumno = new Alumno();
            $alumno->setId((int)$data->{"id"});

            $alumnoDAO = new AlumnoDAO($con);
            if($alumnoDAO->eliminar($alumno)){
                $respuesta->{"registros"} = $alumno->toJSON();
            }else{
                $respuesta->{"error"} = $alumnoDAO->getError();
            }
            $con = null;
        }catch (PDOException $ex){
            echo $ex->getMessage();
        }
    }
     

    //convierte el json en string, es lo que se pasa entre servidores
    echo json_encode($respuesta);
?>
