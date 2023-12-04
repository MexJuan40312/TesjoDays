<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consulta de Profesores</title>
    <link rel="stylesheet" href="../CSS/estilos.css">
    <script src="../Js/filtroBusqueda.js" defer></script>
</head>
<body>
<!-- CABECERA -->
<header>
      <div class="content">
         <div class="menu container">
            <a href="../JefeDeDivision.php" class="logo">Tesjo<span class="DaysLite">Days</span> 
            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-school" width="54" height="54" viewBox="0 0 24 24" stroke-width="2" stroke="#ffffff" fill="none" stroke-linecap="round" stroke-linejoin="round">
            <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
            <path d="M22 9l-10 -4l-10 4l10 4l10 -4v6" />
            <path d="M6 10.6v5.4a6 3 0 0 0 12 0v-5.4" />
            </svg>
            </a>
            </a>
            <input type="checkbox" id="menu">
            <label for="menu">
               <img src="imagenes/menu.png" class="menu-icono" alt="Menu">
            </label>
            <nav class="navbar">
               <ul>
                  <li><a href="../TablasBDD_JefeDiv/TablaProf.php">Inicio</a></li>
                  <li><a href="#">Servicios</a></li>
                  <li><a href="#">Producto</a></li>
                  <li><a href="#">Contacto</a></li>
               </ul>
            </nav>
         </div>
      </div>
   </header>

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

        // Validar inicio de sesión
        session_start();

        // Verificar si el usuario no está autenticado
        if (!isset($_SESSION['user_id'])) {
            // Redirigir a la página de inicio de sesión si el usuario no está autenticado
            header("Location: login.php");
            exit();
        }
?>

    <!-- Contiene la caja con todo el contenido con la clase "CajaTab" -->
<div class="CajaTab">
    <div class="buscador">
        <h2 class="titu">Profesores y sus datos correspondientes:</h2>
        <input type="text" id="busqueda" placeholder="Buscar profesor...">
        <button onclick="buscar()" id="botonBuscar">Buscar</button>
    </div>
    
<!-- Ventana del formulario ingresar datos -->
<div id="dialog" class="dialog-background" style="display: none;">
    <div class="dialog-box">
        <!-- Formulario para ingresar datos -->
        <form class="formInsert" method="post" action="../Procesar_Formularios/ProcInsertProf.php">
            <div class="form-column">
                <label for="num_control">Número de Control:</label>
                <input type="text" name="num_control">
            </div>
            <div class="form-column">
                <label for="nombre">Nombre:</label>
                <input type="text" name="nombre">
            </div>
            <div class="form-column">
                <label for="apellido_pat">Apellido Paterno:</label>
                <input type="text" name="apellido_pat">
            </div>
            <div class="form-column">
                <label for="apellido_mat">Apellido Materno:</label>
                <input type="text" name="apellido_mat">
            </div>
            <div class="form-column">
                <label for="grado_estudios">Grado de Estudios:</label>
                <input type="text" name="grado_estudios">
            </div>
            <div class="form-column">
                <label for="antiguedad">Antigüedad:</label>
                <input type="text" name="antiguedad">
            </div>
            <div class="form-column">
                <label for="edad">Edad:</label>
                <input type="text" name="edad">
            </div>
            <div class="form-column">
                <label for="num_celular">Número Celular:</label>
                <input type="text" name="num_celular">
            </div>
            <div class="form-column">
                <label for="carrera_id">Carrera ID:</label>
                <input type="text" name="carrera_id">
            </div>
            <div class="form-row">
                <input class="InserT" type="submit" name="submit" value="Insertar">
            </div>
        </form>
        <!-- Botón para cerrar el diálogo -->
        <button class="btnCerrar" id="closeDialogButton">Cerrar</button>
    </div>
</div>
<script src="../Js/VentDialog.js"></script>


    <!-- Ventana del formulario Eliminar datos -->
    <div id="dialogg" class="dialog-background" style="display: none;">
        <div class="dialog-box">
            <!-- Formulario para ingresar datos -->
            <form method="post" action="../Procesar_Formularios/ProcElimProf.php">
                Número de Control: <input type="text" name="num_control"><br>
                <input class="InserT" type="submit" name="submit" value="Eliminar">
            </form>
            <!-- Botón para cerrar el diálogo -->
            <button class="btnCerrar btnCerrar1" id="closeDeleteDialogButton">Cerrar</button>
        </div>
    </div>
    <script src="../Js/ElimProf.js"></script>

    <!-- Tablas expresadas -->
    <table border="1">
        <tr>
            <th>Número de Control</th>
            <th>Nombre del Profesor</th>
            <th>Apellido Paterno</th>
            <th>Apellido Materno</th>
            <th>Grado de Estudios</th>
            <th>Antigüedad</th>
            <th>Edad</th>
            <th>Número Celular</th>
            <th>Nombre de Carrera</th>
        </tr>
        <?php
            while ($row = oci_fetch_array($statement, OCI_ASSOC+OCI_RETURN_NULLS)) {
                echo "<tr>\n";
                echo "<td>" . ($row['NUM_CONTROL'] !== null ? htmlentities($row['NUM_CONTROL'], ENT_QUOTES) : "&nbsp;") . "</td>\n";
                echo "<td>" . ($row['NOMBRE'] !== null ? htmlentities($row['NOMBRE'], ENT_QUOTES) : "&nbsp;") . "</td>\n";
                echo "<td>" . ($row['APELLIDO_PAT'] !== null ? htmlentities($row['APELLIDO_PAT'], ENT_QUOTES) : "&nbsp;") . "</td>\n";
                echo "<td>" . ($row['APELLIDO_MAT'] !== null ? htmlentities($row['APELLIDO_MAT'], ENT_QUOTES) : "&nbsp;") . "</td>\n";
                echo "<td>" . ($row['GRADO_ESTUDIOS'] !== null ? htmlentities($row['GRADO_ESTUDIOS'], ENT_QUOTES) : "&nbsp;") . "</td>\n";
                echo "<td>" . ($row['ANTIGUEDAD'] !== null ? htmlentities($row['ANTIGUEDAD'], ENT_QUOTES) : "&nbsp;") . "</td>\n";
                echo "<td>" . ($row['EDAD'] !== null ? htmlentities($row['EDAD'], ENT_QUOTES) : "&nbsp;") . "</td>\n";
                echo "<td>" . ($row['NUM_CELULAR'] !== null ? htmlentities($row['NUM_CELULAR'], ENT_QUOTES) : "&nbsp;") . "</td>\n";
                echo "<td>" . ($row['NOMBRE_CARRERA'] !== null ? htmlentities($row['NOMBRE_CARRERA'], ENT_QUOTES) : "&nbsp;") . "</td>\n";
                echo "</tr>\n";
            }
        ?>
    </table>
</div>

<?php
    oci_free_statement($statement);
    oci_close($conexion);
?>
</body>
</html>
