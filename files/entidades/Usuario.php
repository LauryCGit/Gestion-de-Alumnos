<?php

class Usuario {
    /*** Atributos ***/
        //const PERFIL_ADMINISTRADOR = 'Administrador';
        //const PERFIL_OPERADOR = 'Operador';
    
    private $id, $cuenta, $clave, $apellido, $nombres, $correo, $fecha;
    
    /*** Constructor (clase predefinida) ***/
    function __construct() {
        //inicializar valores de atributos 
        $this->setId(0);
        $this->setCuenta("");
        $this->setClave("");
        $this->setApellido("");
        $this->setNombres("");
        $this->setCorreo("");
        $this->setFecha("");
    }
    /*** Getters ***/
    public function getId(): int { //vamos a trabajar con un elemento de tipo int, si hay error nos avisara
        return $this->id;
    }

    public function getCuenta(): string {
        return $this->cuenta;
    }

    public function getClave(): string {
        return $this->clave;
    }

    public function getApellido() {
        return $this->apellido;
    }

    public function getNombres() {
        return $this->nombres;
    }

    public function getCorreo() {
        return $this->correo;
    }

    public function getFecha() {
        return $this->fecha;
    }

    /*** Setters ***/
    public function setId($id) {
        
        $this->id = (is_integer($id) && ($id > 0)) ? $id:0;
    }

    public function setCuenta($cuenta) {
        //strlen longitud de un string
        $this->cuenta = (is_string($cuenta) && (strlen($cuenta) <= 20)) ? $cuenta:"";
    }

    public function setClave($clave) {
        //el md5 nos da un valor de 32 caracteres
        $this->clave = (is_string($clave) && (strlen($clave) == 32)) ? $clave:"";
    }

    public function setApellido($apellido) {
        $this->apellido = $apellido;
    }

    public function setNombres($nombres) {
        $this->nombres = $nombres;
    }

    public function setCorreo($correo) {
        $this->correo = $correo;
    }

    public function setFecha($fecha) {
        $this->fecha = $fecha;
    }

        /*** Métodos ***/
    //siempre va a devolver un array
    public function toArray(): array{
        $salida = array(
            "id" => $this->getId(),
            "cuenta" => $this->getCuenta(),
            "clave" => $this->getClave(),
            "apellido" => $this->getApellido(),
            "nombres" => $this->getNombres(),
            "correo" => $this->getCorreo(),
            "fecha" => $this->getFecha(),
        );
        return $salida;
    }
    
    public function toJSON(): object{
               
        $json = json_decode("{}");
        $json->{"id"} = $this->getId();
        $json->{"cuenta"} = $this->getCuenta();
        $json->{"clave"} = $this->getClave();
        $json->{"apellido"} = $this->getApellido();
        $json->{"nombres"} = $this->getNombres();
        $json->{"correo"} = $this->getCorreo();
        $json->{"fecha"} = $this->getFecha();
        
        //devuelve un string con la representacion de json
        return $json;
    }
}
