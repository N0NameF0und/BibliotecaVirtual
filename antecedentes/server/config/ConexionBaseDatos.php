<?php
include_once("../persistencia/DatosConexion.php");
class ConexionBaseDatos {
    private static $array = array();
    public static function DatosConexiones(){
        $array = array();
         $array[] = new DatosConexion("local","sql313.byethost32.com","b32_21140731_Biblioteca","b32_21140731","arbol123");
        return $array;
    }
}