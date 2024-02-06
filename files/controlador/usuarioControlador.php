<?php
    //convierte el stringify a json
    $data = json_decode($_POST["data"]);
    $respuesta = json_decode('{"accion":"","registros":[],"error":"","total":0}');
    
    require_once '../entidades/Usuario.php';
    require_once '../modelo/Conexion.php';
    require_once '../modelo/UsuarioDAO.php';
    
    $respuesta->{"accion"} = $data->{"accion"};
    
//validaciones: que exista data en post, no haya errores en json_decode
    if($data->{"accion"} === "ALTA"){
        try{
            $con = Conexion::establecer();              
            $usuario = new Usuario();
            $usuario->setApellido($data->{"apellido"});
            $usuario->setNombres($data->{"nombres"});
            $usuario->setCuenta($data->{"cuenta"});
            $usuario->setClave(md5($data->{"clave"}));
            $usuario->setCorreo($data->{"correo"});

            $usuarioDAO = new UsuarioDAO($con);
            if($usuarioDAO->guardar($usuario)){
                $respuesta->{"registros"} = $usuario->toJSON();
            }else{
                $respuesta->{"error"} = $usuarioDAO->getError();
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
            $usuarioDAO = new UsuarioDAO($con);
            $respuesta->{"registros"} = $usuarioDAO->listar($data);
            $respuesta->{"error"} = $usuarioDAO->getError();
            $respuesta->{"total"} = $usuarioDAO->getRegistrosEncontrados();
            $con = null;
        }catch (PDOException $ex){
            echo $ex->getMessage();
        }
    }
    else if($data->{"accion"} === "CARGAR"){
        try{
            $con = Conexion::establecer();
            $usuarioDAO = new UsuarioDAO($con);
            $usuario = $usuarioDAO->cargar($data->{"id"});

            if($usuario->getId() > 0){
                $respuesta->{"registros"} = $usuario->toJSON();
            }
            else{
                $respuesta->{"error"} = $usuarioDAO->getError();
            }
            $con = null;
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
     }
    else if ($data->{"accion"} === "ACTUALIZAR"){
        try{
            $con = Conexion::establecer();              
            $usuario = new Usuario();
            $usuario->setId((int)$data->{"id"});
            $usuario->setApellido($data->{"apellido"});
            $usuario->setNombres($data->{"nombres"});
            $usuario->setCuenta($data->{"cuenta"});
            $usuario->setCorreo($data->{"correo"});
            
            $usuarioDAO = new UsuarioDAO($con);
            if($usuarioDAO->actualizar($usuario)){
                $respuesta->{"registros"} = $usuario->toJSON();
                
            }else{
                $respuesta->{"error"} = $usuarioDAO->getError();
            }
            
            $con = null;
        }catch (PDOException $ex){
            echo $ex->getMessage();
        }
    }
    else if ($data->{"accion"} === "ELIMINAR"){
        try{
            $con = Conexion::establecer();              
            $usuario = new Usuario();
            $usuario->setId((int)$data->{"id"});

            $usuarioDAO = new UsuarioDAO($con);
            if($usuarioDAO->eliminar($usuario)){
                $respuesta->{"registros"} = $usuario->toJSON();
            }else{
                $respuesta->{"error"} = $usuarioDAO->getError();
            }
            $con = null;
        }catch (PDOException $ex){
            echo $ex->getMessage();
        }
    }
    

    //convierte el json en string, es lo que se pasa entre servidores
    echo json_encode($respuesta);
?>