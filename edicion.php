<?php
include 'conexion.php';

if(isset($_POST['Nombre'])&& isset($_POST['Apellido'])&& isset($_POST['Usuario'])&& isset($_POST['Clave'])){
    $nombre = $_POST['Nombre'];
    $apellido = $_POST['Apellido'];
    $usuario = $_POST['Usuario'];
    $clave = $_POST['Clave'];    
    $id = $_GET['id'];

    $sentencia = $bd->prepare("UPDATE tcliente SET nombre = '$nombre',
    apellido = '$apellido', usuario = '$usuario', clave = '$clave' WHERE id = '$id'");

    $res = $sentencia->execute();
    if($res === true){
        header("Location: http://localhost/Repaso-PHP/CRUD/ver.php");
    }else{
        echo "error1";
    }

}else{
    echo "error2";
}

?>