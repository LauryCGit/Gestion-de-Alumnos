<?php

require_once 'DAO.php';
require_once 'DAOInterfaceA.php';
require_once '../entidades/Alumno.php';

class AlumnoDAO extends DAO implements DAOInterfaceA{
    
    /***** Constructor *****/
    //invoco al constructor padre
    function __construct($conexion) {
        parent::__construct($conexion);
    }
    
    public function actualizar($objeto): bool {
        $this->setError("");
        $resultado = false;
        $id = $objeto->getId();
        $dni = $objeto->getDni();
        $cuil = $objeto->getCuil();
        $correo = $objeto->getCorreo();
        $consulta = 'SELECT * FROM alumnos WHERE alu_dni = "'.$dni.'" OR alu_cuil = "'.$cuil.'" OR alu_correo = "'.$correo.'";';   
        if($stmt = $this->conexion->prepare($consulta)){
            if($stmt->execute(array())){
                if($stmt->rowCount() >= 2){
                    $this->setError("Duplicado");  
                }
                else{
                    $sql = 'UPDATE alumnos SET alu_apellido = :apellido, alu_nombres = :nombres, alu_dni = :dni, alu_cuil = :cuil, alu_domicilio = :domicilio, alu_domicilio_localidad = :localidad, alu_domicilio_provincia = :provincia, alu_telefono01 = :telefono1, alu_telefono02 = :telefono2, alu_correo = :correo, alu_fecha_nacimiento = :fechaNac WHERE id_alumno = "'.$id.'";';

                    if($stmt = $this->conexion->prepare($sql)){                    
                        if($stmt->execute(array("apellido"=>$objeto->getApellido(),"nombres"=>$objeto->getNombres(),"dni"=>$objeto->getDni(),"cuil"=>$objeto->getCuil(),"domicilio"=>$objeto->getDomicilio(),"localidad"=>$objeto->getLocalidad(),"provincia"=>$objeto->getProvincia(),"telefono1"=>(int)$objeto->getTelefono1(), "telefono2"=>(int)$objeto->getTelefono2(), "correo"=>$objeto->getCorreo(),"fechaNac"=>$objeto->getFechaNac()))){
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

    public function cargar($id): \Alumno {
        $alumno = new Alumno();
        if(!is_integer($id) || ($id <= 0)){
            $this->setError("Id invalido");
            return false;
        }
        $sql = 'select id_alumno, alu_apellido, alu_nombres, alu_dni, alu_cuil, alu_domicilio, alu_domicilio_localidad, alu_domicilio_provincia, alu_telefono01, alu_telefono02, alu_correo, alu_fecha_nacimiento FROM alumnos WHERE id_alumno = :id;';
        if($stmt = $this->conexion->prepare($sql)){
            if($stmt->execute(array("id"=>$id ))){
                if($stmt->rowCount() == 1){
                    $registro = $stmt->fetch();
                    $alumno->setId((int)$registro->id_alumno);
                    $alumno->setApellido($registro->alu_apellido);
                    $alumno->setNombres($registro->alu_nombres);
                    $alumno->setDni($registro->alu_dni);
                    $alumno->setCuil($registro->alu_cuil);
                    $alumno->setDomicilio($registro->alu_domicilio);
                    $alumno->setLocalidad($registro->alu_domicilio_localidad);
                    $alumno->setProvincia($registro->alu_domicilio_provincia);
                    $alumno->setTelefono1($registro->alu_telefono01);
                    $alumno->setTelefono2($registro->alu_telefono02);
                    $alumno->setCorreo($registro->alu_correo);
                    $alumno->setFechaNac($registro->alu_fecha_nacimiento);
                }
            }
            else $this->setError($stmt->errorInfo()[2]);
            $stmt = null;
        }
        else $this->setError($this->conexion->errorInfo()[2]);//devuelve false o excepcion si no es posible
        
    return $alumno;
    }

    public function eliminar($objeto): bool {
        $this->setError("");
        $resultado = false;
        $id = $objeto->getId();
        $sql = 'DELETE FROM alumnos WHERE id_alumno = "'.$id.'";';   
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
        $dni = $objeto->getDni();
        $cuil = $objeto->getCuil();
        $correo = $objeto->getCorreo();
        $consulta = 'SELECT * FROM alumnos WHERE alu_dni = "'.$dni.'" OR alu_cuil = "'.$cuil.'" OR alu_correo = "'.$correo.'";';   
        //where user_cuenta = cuenta and (id_usuario <>id) 
         if($stmt = $this->conexion->prepare($consulta)){
            if($stmt->execute(array())){
                if($stmt->rowCount() >= 1){
                    $this->setError("Duplicado");  
                }
                else{
                    $sql = 'insert into alumnos values(null, :apellido, :nombres, :dni, :cuil, :domicilio, :localidad, :provincia, :telefono1, :telefono2, :correo, :fecha_nac, NOW());';
                    if($stmt = $this->conexion->prepare($sql)){
                        if($stmt->execute(array("apellido"=>$objeto->getApellido(),"nombres"=>$objeto->getNombres(),
                            "dni"=>$objeto->getDni(),"cuil"=>$objeto->getCuil(),"domicilio"=>$objeto->getDomicilio(),
                            "localidad"=>$objeto->getLocalidad(),"provincia"=>$objeto->getProvincia(),"telefono1"=>(int)$objeto->getTelefono1(),
                            "telefono2"=>(int)$objeto->getTelefono2(), "correo"=>$objeto->getCorreo(),"fecha_nac"=>$objeto->getFechaNac()))){             
                            $objeto->setId((int)$this->conexion->lastInsertId());
                            $resultado = true;
                        }
                        else $this->setError($stmt->errorInfo()[2]);
                        $stmt = null;
                    }
                    else $this->setError($this->conexion->errorInfo()[2]);
                }
            }
        }
        return $resultado;
    }

    public function listar($filtros): array {
        $registros = array();
        $this->setRegistrosEncontrados(0);
        $this->setError('');
        
        $sql = "SELECT SQL_CALC_FOUND_ROWS id_alumno, alu_apellido, alu_nombres, alu_dni, alu_correo FROM alumnos";
        $clausulas = [];
        $sugestivo = false;
        
        if(is_string($filtros->{"clave"}) && strlen($filtros->{"clave"}) > 0){
            $clausulas[] = "(alu_apellido LIKE '".$filtros->{"clave"}."%')";
            $sugestivo = true; 
        }
        //-----------------------------------------------------------
        if(count($clausulas) > 0){
            $sql .= " WHERE ";
            foreach($clausulas as $clausula){ $sql .= $clausula." AND ";}
            $sql = substr_replace($sql, "", strlen($sql)-5,5);
        }
        $sql .= (is_string($filtros->{"orden"}) && (strlen($filtros->{"orden"}) > 0))
        ? " ORDER BY ".$filtros->{"orden"} : " ORDER BY alu_apellido ASC";
        
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

}

