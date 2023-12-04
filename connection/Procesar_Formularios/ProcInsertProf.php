<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
    $conexion = oci_connect("SYSTEM", "oracle", "localhost/xe"); # Credenciales para el inicio de sesión

    if (!$conexion) {
        $m = oci_error();
        echo $m['message'], "n";
        exit;
    }

    $query = 'SELECT p.Num_Control, p.Nombre, p.Apellido_Pat, p.Apellido_Mat, p.Grado_Estudios, p.Antiguedad, p.Edad, p.Num_Celular, c.Nombre as Nombre_Carrera
                FROM Profesor p
                INNER JOIN Carrera c ON p.Carrera_ID = c.Carrera_ID
                ORDER BY p.Antiguedad DESC';

    $statement = oci_parse($conexion, $query);
    oci_execute($statement);

    if (isset($_POST['submit'])) {
        $num_control = $_POST['num_control']; // Obtener el número de control del formulario
        $nombre = $_POST['nombre']; // Obtener el nombre del formulario
        $apellido_pat = $_POST['apellido_pat']; // Obtener el apellido paterno del formulario
        $apellido_mat = $_POST['apellido_mat']; // Obtener el apellido materno del formulario
        $grado_estudios = $_POST['grado_estudios']; // Obtener el grado de estudios del formulario
        $antiguedad = $_POST['antiguedad']; // Obtener la antigüedad del formulario
        $edad = $_POST['edad']; // Obtener la edad del formulario
        $num_celular = $_POST['num_celular']; // Obtener el número de celular del formulario
        $carrera_id = $_POST['carrera_id']; // Obtener el ID de la carrera del formulario

        // Consulta de inserción de datos
        $query_insert = "INSERT INTO Profesor (Num_Control, Nombre, Apellido_Pat, Apellido_Mat, Grado_Estudios, Antiguedad, Edad, Num_Celular, Carrera_ID)
                        VALUES ('$num_control', '$nombre', '$apellido_pat', '$apellido_mat', '$grado_estudios', '$antiguedad', '$edad', '$num_celular', '$carrera_id')";

        $statement_insert = oci_parse($conexion, $query_insert);
        $result = oci_execute($statement_insert);

        if ($result) {
            echo "Datos insertados correctamente.";
        } else {
            $e = oci_error($statement_insert);
            echo "Error al insertar datos: " . $e['message'];
        }
    }

?>
<a href="../TablasBDD/TablaProf.php">Volver</a>
</body>
</html>