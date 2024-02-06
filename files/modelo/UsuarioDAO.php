<?php
/**
 * Description of UsuarioDAO
 *
 * @author Laura
 */
require_once 'DAO.php';
require_once 'DAOInterface.php';
require_once '../entidades/Usuario.php';
class UsuarioDAO extends DAO implements DAOInterface {
    
    /***** Constructor *****/
    //invoco al constructor padre
    function __construct($conexion) {
        parent::__construct($conexion);
    }
    
    //boton derecho override trae los metodos que va a implementar
    public function actualizar($objeto): bool {
        $this->setError("");
        $resultado = false;
        $id = $objeto->getId();
        $cuenta = $objeto->getCuenta();
        $correo = $objeto->getCorreo();
        $consulta = 'SELECT * FROM usuarios WHERE user_cuenta = "'.$cuenta.'" OR user_correo = "'.$correo.'";';   
        if($stmt = $this->conexion->prepare($consulta)){
            if($stmt->execute(array())){
                if($stmt->rowCount() >= 2){
                    $this->setError("Duplicado");  
                }
                else{
                    $sql = 'UPDATE usuarios SET user_cuenta = :cuenta, user_apellido = :apellido, user_nombres = :nombres, user_correo = :correo WHERE id_usuario = "'.$id.'";';

                    if($stmt = $this->conexion->prepare($sql)){
                        if($stmt->execute(array("cuenta"=>$objeto->getCuenta(),"apellido"=>$objeto->getApellido(),"nombres"=>$objeto->getNombres(),"correo"=>$objeto->getCorreo()))){
                            $resultado = true;
                        }
                        else $this->setError($stmt->errorInfo()[2]);
                        $stmt = null;
                    }
                    else $this->setError($this->conexion->errorInfo()[2]);//devuelve false o excepcion si no es posible
                }
            }
        }
        return $resultado;
    }

    public function cargar($id): \Usuario {
        $usuario = new Usuario();
        if(!is_integer($id) || ($id <= 0)){
            $this->setError("Id invalido");
            return false;
        }
        $sql = 'SELECT id_usuario, user_cuenta, user_apellido, user_nombres, user_correo FROM usuarios WHERE id_usuario = :id;';
         if($stmt = $this->conexion->prepare($sql)){
            if($stmt->execute(array("id" =>$id))){
                if($stmt->rowCount() == 1){
                    $registro = $stmt->fetch();          
                    //los setters vienen como strings
                    $usuario->setId((int)$registro->id_usuario);
                    $usuario->setCuenta($registro->user_cuenta);
                    $usuario->setApellido($registro->user_apellido);
                    $usuario->setNombres($registro->user_nombres);
                    $usuario->setCorreo($registro->user_correo);
                }
            }
            else $this->setError($stmt->errorInfo()[2]);
            $stmt = null;
            //le asigno null para no gastar recursos
        }
        else $this->setError($this->conexion->errorInfo()[2]);//devuelve false o excepcion si no es posible
        
    return $usuario;
    }

    public function eliminar($objeto): bool {
        $this->setError("");
        $resultado = false;
        $id = $objeto->getId();
        $sql = 'DELETE FROM usuarios WHERE id_usuario = "'.$id.'";';   
        if($stmt = $this->conexion->prepare($sql)){
            if($stmt->execute(array("id"=>$objeto->getId()))){
                $resultado = true;
            }
            else $this->setError($stmt->errorInfo()[2]);
            $stmt = null;
        }
        else $this->setError($this->conexion->errorInfo()[2]);//devuelve false o excepcion si no es posible
     
        return $resultado;
    }

    public function guardar($objeto): bool {
        $this->setError("");
        $resultado = false;
        $cuenta = $objeto->getCuenta();
        $correo = $objeto->getCorreo();
        $consulta = 'SELECT * FROM usuarios WHERE user_cuenta = "'.$cuenta.'" OR user_correo = "'.$correo.'";';   
       
        if($stmt = $this->conexion->prepare($consulta)){
            if($stmt->execute(array())){
                if($stmt->rowCount() >= 1){
                    $this->setError("Duplicado");  
                }
                else{
                    $sql = 'insert into usuarios values(null,:cuenta,:clave,:apellido,:nombres,:correo,NOW());';
                    if($stmt = $this->conexion->prepare($sql)){
                        if($stmt->execute( array("cuenta"=>$objeto->getCuenta(),"clave"=>$objeto->getClave(),"apellido"=>$objeto->getApellido(),"nombres"=>$objeto->getNombres(),"correo"=>$objeto->getCorreo()))){
                            $objeto->setId((int)$this->conexion->lastInsertId());
                            $resultado = true;
                        }
                        else $this->setError($stmt->errorInfo()[2]);
                        $stmt = null;
                        //le asigno null para no gastar recursos
                    }
                    else $this->setError($this->conexion->errorInfo()[2]);//devuelve false o excepcion si no es posible
                }
            }
        }
        return $resultado;
    }

    public function listar($filtros): array {
        $registros = array();
        
        $this->setRegistrosEncontrados(0);
        $this->setError('');
        
        $sql = "SELECT SQL_CALC_FOUND_ROWS id_usuario, user_apellido, user_nombres, user_cuenta, user_correo FROM usuarios";
        $clausulas = [];
        
        //falta identificar filtros
        $sugestivo = false;
        if(is_string($filtros->{"clave"}) && strlen($filtros->{"clave"}) > 0){
            $clausulas[] = "(user_cuenta LIKE '".$filtros->{"clave"}."%')";
            $sugestivo = true; 
        }
      
        //-----------------------------------------------------------
        if(count($clausulas) > 0){
            $sql .= " WHERE ";
            foreach($clausulas as $clausula){ $sql .= $clausula." AND ";}
            $sql = substr_replace($sql, "", strlen($sql)-5,5);
        }
        $sql .= (is_string($filtros->{"orden"}) && (strlen($filtros->{"orden"}) > 0))
        ? " ORDER BY ".$filtros->{"orden"} : " ORDER BY user_apellido ASC";
        
        $sql .= (is_integer($filtros->{"indice"}) && is_integer($filtros->{"cantidad"}) && ($filtros->{"cantidad"} >0))
        ? " LIMIT ".$filtros->{"indice"}.", ".$filtros->{"cantidad"}.";" : ";";
                
        if($stmt = $this->conexion->prepare($sql)){
            if($stmt->execute()){
                $registros = $stmt->fetchAll(PDO::FETCH_ASSOC);
                
                if($stmtTotal = $this->conexion->prepare("SELECT FOUND_ROWS();")){
                    if($stmtTotal->execute()){
                        $total = $stmtTotal->fetch(PDO::FETCH_NUM);
                        $this->setRegistrosEncontrados((int)$total[0]);
                        unset($total);
                    }
                    $stmtTotal = null;
                }
                else{ $this->setError($this->conexion->errorInfo()[2]);}
            }
            else{ $this->setError($stmt->errorInfo()[2]);}
            $stmt = null;
        }
        else{ $this->setError($this->conexion->errorInfo()[2]);}
        
        return $registros;
    }
    
    public function crearpdf(){
 
    }

}
