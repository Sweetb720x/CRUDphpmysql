
<?php

$servidor = "localhost";
$usuario = "admin";
$clave = "clave123";
$db = "dbprueba";

$conexion = new mysqli($servidor,$usuario,$clave,$db);
if($conexion -> connect_error){
    die("conexion fallida".$conexion->connect_error);
}

$sql = "SELECT * from tcliente where nombre like lower('%".$_POST["buscar"]."%') or apellido like lower('%".$_POST["buscar"]."%')";
$resultado = $conexion->query($sql);

$numero = mysqli_num_rows($resultado);

while($encontrados = mysqli_fetch_assoc($resultado)){
    echo "<table><tr><td>".$encontrados['id']."</td><td>".$encontrados['nombre']."</td>";
    echo "<td>".$encontrados['apellido']."</td><td>".$encontrados['usuario']."</td><td>".$encontrados['clave']."</td></tr></table>";
}

?>