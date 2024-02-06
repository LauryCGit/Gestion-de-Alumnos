<?php


class Alumno {
    
    private $id, $apellido, $nombres, $dni, $cuil, $domicilio, $localidad, $provincia, 
            $telefono1, $telefono2, $correo, $fechaNac, $fecha;
    
    /*** Constructor (clase predefinida) ***/
    function __construct() {
        //inicializar valores de atributos
        $this->setId(0);
        $this->setApellido("");
        $this->setNombres("");
        $this->setDni("");
        $this->setCuil("");
        $this->setDomicilio("");
        $this->setLocalidad("");
        $this->setProvincia("");
        $this->setTelefono1(0);
        $this->setTelefono2(0);
        $this->setCorreo("");
        $this->setFechaNac("");
        $this->setFecha("");
    }
    
    public function getId(): int {
        return $this->id;
    }

    public function getApellido(): string {
        return $this->apellido;
    }

    public function getNombres() {
        return $this->nombres;
    }

    public function getDni() {
        return $this->dni;
    }

    public function getCuil(){
        return $this->cuil;
    }

    public function getDomicilio() {
        return $this->domicilio;
    }

    public function getLocalidad() {
        return $this->localidad;
    }

    public function getProvincia() {
        return $this->provincia;
    }

    public function getTelefono1() {
        return $this->telefono1;
    }

    public function getTelefono2() {
        return $this->telefono2;
    }

    public function getCorreo() {
        return $this->correo;
    }

    public function getFechaNac() {
        return $this->fechaNac;
    }

    public function getFecha() {
        return $this->fecha;
    }
//--------------------------------------------------//
    public function setId($id) {
        $this->id = (is_integer($id) && ($id > 0)) ? $id:0;
    }

    public function setApellido($apellido) {
        $this->apellido = $apellido;
    }

    public function setNombres($nombres) {
        $this->nombres = $nombres;
    }

    public function setDni($dni) {
        $this->dni = $dni;
    }

    public function setCuil($cuil) {
        $this->cuil = $cuil;
    }

    public function setDomicilio($domicilio) {
        $this->domicilio = $domicilio;
    }

    public function setLocalidad($localidad) {
        $this->localidad = $localidad;
    }

    public function setProvincia($provincia) {
        $this->provincia = $provincia;
    }

    public function setTelefono1($telefono1) {
        $this->telefono1 = $telefono1;
    }

    public function setTelefono2($telefono2) {
        $this->telefono2 = $telefono2;
    }

    public function setCorreo($correo) {
        $this->correo = $correo;
    }

    public function setFechaNac($fechaNac) {
        $this->fechaNac = $fechaNac;
    }

    public function setFecha($fecha) {
        $this->fecha = $fecha;
    }

    /*** Métodos ***/
    //siempre va a devolver un array
    public function toArray(): array{
        $this->setApellido("");
        $this->setNombres("");
        $this->setDni("");
        $this->setCuil("");
        $this->setDomicilio("");
        $this->setLocalidad("");
        $this->setProvincia("");
        $this->setTelefono1(0);
        $this->setTelefono2(0);
        $this->setCorreo("");
        $this->setFechaNac("");
        $this->setFecha("");
        
        $salida = array(
            "id" => $this->getId(),
            "apellido" => $this->getApellido(),
            "nombres" => $this->getNombres(),
            "dni" => $this->getDni(),
            "cuil" => $this->getCuil(),
            "domicilio" => $this->getDomicilio(),
            "localidad" => $this->getLocalidad(),
            "provincia" => $this->getProvincia(),
            "telefono1" => $this->getTelefono1(),
            "telefono2" => $this->getTelefono2(),
            "correo" => $this->getCorreo(),
            "fechaNac" => $this->getFechaNac(),
            "fecha" => $this->getFecha(),
        );
        return $salida;
    }
    
    public function toJSON(): object{
               
        $json = json_decode("{}");
        $json->{"id"} = $this->getId();
        $json->{"apellido"} = $this->getApellido();
        $json->{"nombres"} = $this->getNombres();
        $json->{"dni"} = $this->getDni();
        $json->{"cuil"} = $this->getCuil();
        $json->{"domicilio"} = $this->getDomicilio();
        $json->{"localidad"} = $this->getLocalidad();
        $json->{"provincia"} = $this->getProvincia();
        $json->{"telefono1"} = $this->getTelefono1();
        $json->{"telefono2"} = $this->getTelefono2();
        $json->{"correo"} = $this->getCorreo();
        $json->{"fechaNac"}= $this->getFechaNac();
        $json->{"fecha"} = $this->getFecha();
        
        //devuelve un string con la representacion de json
        return $json;
    }

}
