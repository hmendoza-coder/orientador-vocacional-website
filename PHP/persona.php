<?php
    class Persona{
        public $nombres;
        public $apellidoP;
        public $apellidoM;
        public $correo;
        public $password;
        public $sexo;
        public $fechaNacimiento;
        public $idEstado;
        public $idMunicipio;
        public $idColonia;

        public function setNombre($string){
            $this->nombres = $string;
        }
        public function setApellidoP($string){
            $this->apellidoP = $string;
        }
        public function setApellidoM($string){
            $this->apellidoM = $string;
        }
        public function setCorreo($string){
            $this->correo = $string;
        }
        public function setPass($string){
            $this->password = $string;
        }
        public function setSexo($string){
            $this->sexo = $string;
        }
        public function setfechaNacimiento($string){
            $this->fechaNacimiento = $string;
        }
        public function setidEstado($string){
            $this->idEstado = $string;
        }
        public function setidMunicipio($string){
            $this->idMunicipio = $string;
        }
        public function setidColonia($string){
            $this->idColonia = $string;
        }
               
        //Get
        public function getNombre(){
            return $this->nombres;
        }
        public function getApellidoP(){
            return $this->apellidoP;
        }
        public function getApellidoM(){
            return $this->apellidoM;
        }
        public function getCorreo(){
            return $this->correo;
        }
        public function getPass(){
            return $this->password;
        }
        public function getSexo(){
            return $this->sexo;
        }
        public function getfechaNacimiento(){
            return $this->fechaNacimiento;
        }
        public function getidEstado(){
            return $this->idEstado;
        }
        public function getidMunicipio(){
            return $this->idMunicipio;
        }
        public function getidColonia(){
            return $this->idColonia;
        }
    }
?>