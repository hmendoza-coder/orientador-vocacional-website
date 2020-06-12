<?php
    class Pregunta{
        public $idPregunta;
        public $contenido;
       
        public function setidPregunta($string){
            $this->idPregunta = $string;
        }
        public function setContenido($string){
            $this->contenido = $string;
        }
        
        public function getidPregunta(){
            return $this->idPregunta;
        }
        public function getContenido(){
            return $this->contenido;
        }
    }
?>