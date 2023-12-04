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
            <input type="checkbox" id="menu">
            <label for="menu">
               <img src="imagenes/menu.png" class="menu-icono" alt="Menu">
            </label>
            <nav class="navbar">
               <ul>
                  <li><a href="../consultas_JefeDeDivision/consulta1.php">Inicio</a></li>
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
        
        $query = 'SELECT p.Num_Control, p.Nombre as Nombre_Profesor, p.Apellido_Pat, p.Apellido_Mat, c.Nombre as Nombre_Carrera, d.DiasEconmicos_Total
                FROM Profesor p
                INNER JOIN Carrera c ON p.Carrera_ID = c.Carrera_ID
                INNER JOIN DiaEconomico d ON p.Num_Control = d.Num_Control';
        
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
    <div class="CajaTab">
    <div class="buscador">
            <h2 class="titu">Profesores y sus días económicos</h2>
            <input type="text" id="busqueda" placeholder="Buscar profesor...">
            <button onclick="buscar()" id="botonBuscar">Buscar</button>
        </div>
    <table border="1">
        <tr>
            <th>Número de Control</th>
            <th>Nombre del Profesor</th>
            <th>Apellido Paterno</th>
            <th>Apellido Materno</th>
            <th>Carrera</th>
            <th>Días Económicos Totales</th>
        </tr>
        <?php
            while ($row = oci_fetch_array($statement, OCI_ASSOC+OCI_RETURN_NULLS)) {
                echo "<tr>\n";
                echo "<td>" . ($row['NUM_CONTROL'] !== null ? htmlentities($row['NUM_CONTROL'], ENT_QUOTES) : "&nbsp;") . "</td>\n";
                echo "<td>" . ($row['NOMBRE_PROFESOR'] !== null ? htmlentities($row['NOMBRE_PROFESOR'], ENT_QUOTES) : "&nbsp;") . "</td>\n";
                echo "<td>" . ($row['APELLIDO_PAT'] !== null ? htmlentities($row['APELLIDO_PAT'], ENT_QUOTES) : "&nbsp;") . "</td>\n";
                echo "<td>" . ($row['APELLIDO_MAT'] !== null ? htmlentities($row['APELLIDO_MAT'], ENT_QUOTES) : "&nbsp;") . "</td>\n";
                echo "<td>" . ($row['NOMBRE_CARRERA'] !== null ? htmlentities($row['NOMBRE_CARRERA'], ENT_QUOTES) : "&nbsp;") . "</td>\n";
                echo "<td>" . ($row['DIASECONMICOS_TOTAL'] !== null ? htmlentities($row['DIASECONMICOS_TOTAL'], ENT_QUOTES) : "&nbsp;") . "</td>\n";
                echo "</tr>\n";
            }
        ?>
    </table>
    </div>
</body>
</html>

<?php
    oci_free_statement($statement);
    oci_close($conexion);
?>
