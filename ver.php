<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="estilos/estilosver.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <title>Ver Datos</title>
</head>
<body class="bodyVer">
    <?php

        $servidor = "localhost";
        $usuario = "admin";
        $clave = "clave123";
        $db = "dbprueba";

        $conexion = new mysqli($servidor,$usuario,$clave,$db);
        if($conexion -> connect_error){
            die("conexion fallida".$conexion->connect_error);
        }

        $sql = "select * from tcliente";
        $resultado = $conexion->query($sql);
        if($resultado -> num_rows > 0){
            echo "<h3>Se han encontrado los siguientes resultados</h3>";
            }else{
                echo "<center><h3>No se han encontrado resultados</h3></center>";
            }
    ?>
        <input onkeyup="buscar_ahora($('#buscar').val());" type="search" class="itext" name="buscar" id="buscar" placeholder="Buscar">
        <input type="submit" class="btnBuscar" value="Ir">
<hr>

<div id="datos"></div>
<?php
?>
<script type="text/javascript">
    function buscar_ahora(buscar){
        var parametros = {"buscar":buscar};
        $.ajax({
            data:parametros,
            type: 'POST',
            url: 'buscar.php',
            success: function(data){
                document.getElementById("body").innerHTML = data;
            }
        });
    }
</script>

<div class="cuadro">

<center>
<a href="index.php" class="atras">Atras</a>
        <table>
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Nombre</th>
                    <th>Apelldio</th>
                    <th>Usuario</th>
                    <th>Clave</th>
                </tr>
            </thead>
            <tbody id="body">
                <div id="cuadro1">
                <?php 
                    foreach($resultado as $resu){
                        ?>
                            <tr>
                                <td><?php echo $resu['id']; ?></td>
                                <td><?php echo $resu['nombre']; ?></td>
                                <td><?php echo $resu['apellido']; ?></td>
                                <td><?php echo $resu['usuario']; ?></td>
                                <td><?php echo $resu['clave']; ?></td>
                                <td><a href="eliminar.php?id=<?php echo $resu['id']?>" class="borrar"><i class="fa fa-trash"></i></a></td>
                                <td><a href="editar.php?id=<?php echo $resu['id']?>" class="editar"><i class="fa fa-wrench"></i></a></td>
                            </tr>                     
                        <?php
                    }
                ?> 
            </div>  
            </tbody>
        </table>
</center>
</div>

</body>
</html>