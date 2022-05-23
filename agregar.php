<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilos/estilosver.css">
    <title>Agregar Datos</title>
</head>
<body class="bodyAgregar">    
<center>
    <form action="agregar.php" class="fForm" method="post">
        <p>Por favor complete los campos </p><hr>
        <input type="text" class="itext2" placeholder="Nombre" name="Nombre"><br>
        <input type="text" class="itext2" placeholder="Apellido" name="Apellido"><br>
        <input type="text" class="itext2" placeholder="Usuario" name="Usuario"><br>
        <input type="text" class="itext2" placeholder="Clave" name="Clave"><br>
        <input type="submit" class="btnAgregar" value="Guardar">
        <a href="index.php" class="atras">Volver</a>
    </form>
</center>
<div id="datos">

        <?php
            include 'conexion.php';
            
            if(isset($_POST['Nombre']) && isset($_POST['Apellido']) && isset($_POST['Usuario']) && isset($_POST['Clave'])){
                $nombre = $_POST['Nombre'];
                $apellido = $_POST['Apellido'];
                $user = $_POST['Usuario'];
                $contra = $_POST['Clave'];

                if($nombre == ""){
                    echo "El campo nombre no puede estar vacio\n";
                }if($apellido == ""){
                    echo "El campo apellido no puede estar vacio\n";
                }if($user == ""){
                    echo "El campo usuario no puede estar vacio\n";
                }if($contra == ""){
                    echo "El campo clave no puede estar vacio\n";
                }else{
                    $sql = $bd->prepare("INSERT INTO tcliente (nombre,apellido,usuario,clave)
                    values('$nombre','$apellido','$user','$contra')");
                    $sql->execute();
    
                    if($sql == true){
                        echo "Datos insertados de manera exitosa";
                    }else{
                        die("Ha ocurrido un error al insertar los datos\n");
                    }            
                }
            }
            
        ?>
    </div>
</body>
</html>