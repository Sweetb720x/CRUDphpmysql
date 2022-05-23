<?php
$usuario = "admin";
$clave = "clave123";
$dbnombre = "dbprueba";

try{
    $bd = new PDO(
        "mysql:host=localhost;
        dbname=".$dbnombre,
        $usuario,
        $clave
    );
//    echo "Conexion con conexion de php exitosa";
}catch(Exception $e){
    echo "Conexion con conexion de php fallida";
}

?>