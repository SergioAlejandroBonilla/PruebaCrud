<?php

    class Conectar{
        
        protected $dbhost;

        protected function Conexion(){
            try{
            $conectar = $this->dbhost = new PDO("mysql:local=localhost;dbname=crudmvc","root","");
            return $conectar;

            }catch(Exception $e ){

                print"¡Error en la DB!: " . $e->getMessage() . "<br/>";
                die();
            }

        }
        
        public function set_names(){
			return $this->dbhost->query("SET NAMES 'utf8'");
        }

    }

?>