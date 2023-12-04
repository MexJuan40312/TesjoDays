<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
    $conexion = oci_connect("SYSTEM", "oracle", "localhost/xe"); // Credenciales para el inicio de sesión

    if (!$conexion) {
        $m = oci_error();
        echo $m['message'], "n";
        exit;
    }

    if (isset($_POST['submit'])) {
        $num_control = $_POST['num_control'];
        $query = "DELETE FROM Profesor WHERE Num_Control = :num_control";
        $statement = oci_parse($conexion, $query);
        oci_bind_by_name($statement, ":num_control", $num_control);
        $result = oci_execute($statement);

        if ($result) {
            echo "Eliminación exitosa.";
        } else {
            echo "Error en la eliminación.";
        }
    }

    oci_free_statement($statement);
    oci_close($conexion);
?>


    <a href="../TablasBDD/TablaProf.php">Volver</a>

</body>
</html>