<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CRUD/estilos/estilosver.css">
    <title>Editar</title>
</head>
<body class="bodyAgregar">
    <?php
    if(!isset($_GET['id'])){
        header("Location: http://localhost/Repaso-PHP/CRUD/ver.php");
    }
    $id = $_GET['id'];

    include 'conexion.php';
    $sql = $bd->prepare("SELECT * FROM tcliente WHERE id = '$id'");
    $sql->execute();
    $cliente = $sql->FETCH(PDO::FETCH_OBJ);
    ?>
    <center>
        <p>Editar usuario</p><hr>
        <form action="http://localhost/Repaso-PHP/CRUD/edicion.php?id=<?php echo $id ?>" method="post">
            <label for="Nombre" class="ilabel2">Nombre</label>
            <input type="text" class="itext2" value="<?php echo $cliente->nombre;?>" name="Nombre" id=""><br>
            <label for="" class="ilabel2">Apellido</label>
            <input type="text" class="itext2" value="<?php echo $cliente->apellido;?>" name="Apellido" id=""><br>
            <label for="" class="ilabel2">Usuario</label>
            <input type="text" class="itext2" value="<?php echo $cliente->usuario;?>" name="Usuario" id=""><br>
            <label for="" class="ilabel2">Clave</label>
            <input type="text" class="itext2" value="<?php echo $cliente->clave;?>" name="Clave" id=""><br>
            <input type="submit" class="btnAgregar" value="Salvar">
            <a href="ver.php" class="atras">Volver</a>
        </form>
    </center>
</body>
</html>
<?php?>