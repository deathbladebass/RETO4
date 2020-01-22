<?php

class votacionClass{
        
        protected $idVotacion;
        protected $idUsuario;
        protected $idJugador;
        protected $idCategoria;
        /**
         * @return mixed
         */
        public function getIdCategoria()
        {
            return $this->idCategoria;
        }
    
        /**
         * @param mixed $idCategoria
         */
        public function setIdCategoria($idCategoria)
        {
            $this->idCategoria = $idCategoria;
        }
    
        /**
         * @return mixed
         */
        public function getIdVotacion()
        {
            return $this->idVotacion;
        }
    
        /**
         * @return mixed
         */
        public function getIdUsuario()
        {
            return $this->idUsuario;
        }
    
        /**
         * @return mixed
         */
        public function getIdJugador()
        {
            return $this->idJugador;
        }
    
        /**
         * @param mixed $idVotacion
         */
        public function setIdVotacion($idVotacion)
        {
            $this->idVotacion = $idVotacion;
        }
    
        /**
         * @param mixed $idUsuario
         */
        public function setIdUsuario($idUsuario)
        {
            $this->idUsuario = $idUsuario;
        }
    
        /**
         * @param mixed $idJugador
         */
        public function setIdJugador($idJugador)
        {
            $this->idJugador = $idJugador;
        }
    
        function getObjectVars()
        {
            $vars = get_object_vars($this);
            return  $vars;
        }
        
    
    
}
?>