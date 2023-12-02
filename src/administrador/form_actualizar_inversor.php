<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>


    <style>

        * {
            font-family: helvetica;

        }

        #formActualizarInversor {
            display: flex;
            flex-direction: column;
            width: 50%;
            margin: 0 5% 0 5%;
        }
    </style>

</head>
<body>
    <h1>Actualizar datos inversor</h1>
    <?php
    if(isset($_POST['idInversor'])) {
        session_start();

        require_once __DIR__ . '/../../config.php';

        $idInversor = $_POST['idInversor'];

        $conexion = mysqli_connect($DB_SERVER, $DB_USER, $DB_PASSWORD, $DB_NAME);
        $query = "SELECT * FROM Inversor WHERE idInversor = '$idInversor'";
        $result = mysqli_query($conexion, $query);
        $row = mysqli_fetch_array($result);

        // print_r ($row); para comprobar que datos tengo en el array 
    ?>
        <form action="actualizar_inversor.php" method="post" id="formActualizarInversor" display="flex">
        
            <label for="nombreInversor">Nombre</label>
            <input type="text" name="nombreInversor" id="nombreInversor" value="<?php echo $row['nombreInversor']; ?>" required>

            <label for="correo">Correo</label>
            <input type="text" name="correo" id="correo" value="<?php echo $row['correo']; ?>" required>

            <label for="tlf">Teléfono</label>
            <input type="text" name="tlf" id="tlf" value="<?php echo $row['tlf']; ?>" required>

            <input type="hidden" name="idInversor" value="<?php echo $row['idInversor']; ?>">

            <input type="submit" value="Actualizar">
        
        </form>
    <?php
    }
    
        
    ?>
    


</body>
</html>