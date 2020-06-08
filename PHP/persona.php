<?php
    class Usuario{
        //id necesario?
        private $nombre;
        private $apellidoP;
        private $apellidoM;
        //credencia?
        private $sexo;
        private $correo;
        private $fechaNacimiento;
        //private $idDomicilio;  Objeto de tipo domicilio

        public function setNombre($string){
            $this->nombre = $string;
        }
        public function setApellidoP($string){
            $this->apellidoP = $string;
        }
        public function setApellidoM($string){
            $this->setApellidoM = $string;
        }
        public function getNombre(){
            return $this->$nombre;
        }
        public function getApellidoP(){
            return $this->$apellidoP;
        }
        public function getApellidoM(){
            return $this->$apellidoM;
        }
    }
?>