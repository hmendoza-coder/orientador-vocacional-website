<?php
    class Domicilio{
        private $estado;
        private $municipio;
        private $colonia;
        
        public function setEstado($string){
            $this->estado = $string;
        }
        public function setMunicipio($string){
            $this->municipio = $string;
        }
        public function setColonia($string){
            $this->colonia = $string;
        }
        public function getEstado()){
            return $this->$estado;
        }
        public function getMunicipio(){
            return $this->$municipio;
        }
        public function getColonia(){
            return $this->$colonia;
        }
    }
?>