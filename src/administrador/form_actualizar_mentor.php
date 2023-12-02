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

        #formActualizarMentor {
            display: flex;
            flex-direction: column;
            width: 50%;
            margin: 0 5% 0 5%;
        }
    </style>

</head>
<body>
    <h1>Actualizar datos mentor</h1>
    <?php
    if(isset($_POST['idMentor'])) {
        session_start();

        require_once __DIR__ . '/../../config.php';

        $idMentor = $_POST['idMentor'];

        $conexion = mysqli_connect($DB_SERVER, $DB_USER, $DB_PASSWORD, $DB_NAME);
        $query = "SELECT * FROM Mentor WHERE idMentor = '$idMentor'";
        $result = mysqli_query($conexion, $query);
        $row = mysqli_fetch_array($result);

        // print_r ($row); para comprobar que datos tengo en el array 
    ?>
        <form action="actualizar_mentor.php" method="post" id="formActualizarMentor" display="flex">
        
            <label for="nombreMentor">Nombre</label>
            <input type="text" name="nombreMentor" id="nombreMentor" value="<?php echo $row['nombreMentor']; ?>" required>

            <label for="especialidad">Especialidad</label>
            <input type="text" name="especialidad" id="especialidad" value="<?php echo $row['especialidad']; ?>" required>

            <label for="experiencia">Experiencia</label>
            <input type="text" name="experiencia" id="experiencia" value="<?php echo $row['experiencia']; ?>" required>

            <label for="correo">Correo</label>
            <input type="text" name="correo" id="correo" value="<?php echo $row['correo']; ?>" required>

            <label for="tlf">Teléfono</label>
            <input type="text" name="tlf" id="tlf" value="<?php echo $row['tlf']; ?>" required>

            <input type="hidden" name="idMentor" value="<?php echo $row['idMentor']; ?>">

            <input type="submit" value="Actualizar">
        
        </form>
    <?php
    }
    
        
    ?>
    


</body>
</html>