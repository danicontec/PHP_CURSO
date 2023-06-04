<?php

    class Blog {
        private $id;
        private $titulo;
        private $comentario;
        private $fecha;
        private $imagen;

        public function setId($id){

            $this->id = $id;
        }

        public function getId(){
            return $this->id;

        }

        public function setComentario($comentario){
            $this->comentario = $comentario;
        }

        public function getComentario() {
            return $this->comentario;
        }
        public function setTitulo($titulo){
            $this->titulo = $titulo;
        }

        public function getTitulo() {
            return $this->titulo;
        }
        public function setFecha($fecha){
            $this->fecha = $fecha;
        }

        public function getFecha() {
            return $this->fecha;
        }
        public function setImagen($imagen){
            $this->imagen = $imagen;
        }

        public function getImagen() {
            return $this->imagen;
        }
    }

?>