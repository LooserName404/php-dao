<?php

    class Usuario {
    
        private $idUsuario;
        private $loginUsuario;
        private $senhaUsuario;
        private $dataUsuario;

        public function getIdUsuario(){
            return $this->idUsuario;
        }

        public function setIdUsuario($value){
            $this->idUsuario = $value;
        }

        public function getLoginUsuario(){
            return $this->loginUsuario;
        }

        public function setLoginUsuario($value){
            $this->loginUsuario = $value;
        }

        public function getSenhaUsuario(){
            return $this->senhaUsuario;
        }

        public function setSenhaUsuario($value){
            $this->senhaUsuario = $value;
        }

        public function getDataUsuario(){
            return $this->dataUsuario;
        }

        public function setDataUsuario($value){
            $this->dataUsuario = $value;
        }

        public function loadById($id){

            $sql = new Sql();

            $results = $sql->select("SELECT * FROM Usuario WHERE id = :ID", array(
                ":ID"=>$id
            ));

            if(count($results) > 0){

                $row = $results[0];

                $this->setIdUsuario($row['id']);
                $this->setLoginUsuario($row['login']);
                $this->setSenhaUsuario($row['senha']);
                $this->setDataUsuario(new DateTime($row['dtcadastro']));

            }

            
        }
        
        public function __toString(){

            return json_encode(array(
                "id"=>$this->getIdUsuario(),
                "login"=>$this->getLoginUsuario(),
                "senha"=>$this->getSenhaUsuario(),
                "dtcadastro"=>$this->getDataUsuario()->format("d/m/Y H:i:s")
            ));

        }

    }