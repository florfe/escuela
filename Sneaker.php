<?php
    class Sneaker{
        public function getDivision($IdCurso){
        $db = new $MiConexion();
            $sql_statement = "SELECT * 
                              FROM cursoscompletos
                              WHERE Curso='$IdCurso'";
            $account = $db->query($sql_statement)->fetchAll();
            $db->close();
            return $account;
        }
       // public function getPriceColorWay($id_sneaker){
          //  $db = new Db();
          //  $sql_statement = "SELECT * FROM prices
        //WHERE id_sneaker='$id_sneaker'";
          //  $account = $db->query($sql_statement)->fetchAll();
           // $db->close();
            //return $account;
        //}
    }
?>