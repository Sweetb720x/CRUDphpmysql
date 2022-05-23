<?php
if(!isset($_GET['id'])){
    echo "Este cliente no existe";
}
$id = $_GET['id'];

include 'conexion.php';

$sql = $bd->prepare("DELETE FROM tcliente WHERE id = '$id'");
$sql->execute();

if($sql == true){
    header('Location: http://localhost/Repaso-PHP/CRUD/ver.php');
}else{
    echo "Ha ocurrido un error";
}
?>