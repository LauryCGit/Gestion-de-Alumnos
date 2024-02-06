<?php
    
    require_once '../entidades/Usuario.php';
    require_once 'Conexion.php';
    require_once './UsuarioDAO.php';
    
    try{
        //capturo la exepcion
        $con = Conexion::establecer();
        echo "Conexion exitosa!!!!";
        //usamos la conexion
        
        $usuario = new Usuario();
        $usuario->setApellido("Carballo");
        $usuario->setNombres("Laura");
        $usuario->setCuenta("lauc");
        $usuario->setClave(md5("clave123"));
        $usuario->setCorreo("lc@hotmail.com");
        
        $usuarioDAO = new UsuarioDAO($con);
        
        if($usuarioDAO->guardar($usuario)){
            echo "Se guardo un registro";
        }else{
            echo $usuarioDAO->getError();
        }
        
        //automaticamente pdo cierra la conexion
        $con = null;
    } catch (PDOException $ex){
        echo $ex->getMessage();
    }
    
    /*
    $usuario = new Usuario();
    $usuario->setApellido("Carballo");
    $usuario->setNombres("Laura");
    $usuario->setCuenta("lauc");
    $usuario->setClave("clave123");
    $usuario->setCorreo("lc@hotmail.com");
    
    echo json_encode($usuario->toJSON()); 
    */
    
    
?>

