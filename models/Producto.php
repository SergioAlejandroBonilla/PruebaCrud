<?php

//Como comentario, este archivo se debió de haber llamado producto, no productos

    class Producto extends Conectar{
        public function get_producto(){

            $conectar= parent::conexion();
            parent::set_names();
            $sql="SELECT * FROM pruebaproductos WHERE est=1";
            $sql=$conectar->prepare($sql);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }

        public function get_producto_x_id($prod_id){

            $conectar = parent::conexion();
            parent::set_names();
            $sql = "SELECT * FROM pruebaproductos WHERE prod_id = ?";
            $sql = $conectar->prepare($sql);
            $sql ->bindvalue(1,$prod_id);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }


      public function delete_producto($prod_id){

            $conectar = parent::conexion();
            parent::set_names();
            $sql = "UPDATE pruebaproductos
                    SET
                        est=0,
                        fech_elim=now()
                    WHERE
                        prod_id= ? ";
            $sql = $conectar->prepare($sql);
            $sql ->bindvalue(1,$prod_id);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }

        public function insert_producto($prod_nom){

            $conectar = parent::conexion();
            parent::set_names();
            $sql = "INSERT INTO pruebaproductos (prod_id, prod_nom, fecha_creacion, fecha_modi, fecha_elim, est) VALUES (NULL, ?, now(), NULL, NULL, 1); ";
            $sql = $conectar->prepare($sql);
            $sql ->bindvalue(1,$prod_nom);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }

        public function update_producto($prod_id,$prod_nom){

            $conectar = parent::conexion();
            parent::set_names();
            $sql = "UPDATE pruebaproductos SET
                    prod_nom=?,
                    fech_elim=now()
                WHERE
                    prod_id= ?";
            $sql = $conectar->prepare($sql);
            $sql ->bindvalue(1,$prod_nom);
            $sql ->bindvalue(1,$prod_id);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }


    }

?>