<?php

/**
 * Description of DAO
 *
 * @author Laura
 */
class DAO {
    //metodos que se van a repetir en todas las clases DAO
    
    /***** Atributos *****/
    //error informa errores en la base de datos registros
    private $error, $registrosEncontrados;
    protected $conexion;
    
    /***** Constructor *****/
    function __construct($conexion) {
        $this->conexion = $conexion;
        //setteamos vacios al principio
        $this->setError("");
        $this->setRegistrosEncontrados(0);
    }
    
    /***** Getters *****/
    public function getError() {
        return $this->error;
    }

    public function getRegistrosEncontrados() {
        return $this->registrosEncontrados;
    }

    /***** Setters *****/
    public function setError($error) {
        $this->error = (is_string($error)) ? trim($error) :'';
    }
    //trim elimina los espacios en blanco adelante y atras
    public function setRegistrosEncontrados($registrosEncontrados) {
        $this->registrosEncontrados = (is_integer($registrosEncontrados)) ? $registrosEncontrados : 0;
    }


}
