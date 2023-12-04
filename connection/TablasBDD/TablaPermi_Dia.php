<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consulta de Permiso y Día</title>
    <link rel="stylesheet" href="../CSS/estilos.css">
    <script src="../Js/filtroBusqueda.js" defer></script>
</head>
<body>
<!-- CABECERA -->
<header>
      <div class="content">
         <div class="menu container">
            <a href="../index.php" class="logo">Tesjo<span class="DaysLite">Days</span> 
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
                  <li><a href="../TablasBDD/TablaPermi_Dia.php">Inicio</a></li>
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

    $query = 'SELECT p.Permiso_ID, p.Aplica, p.Razon_Permiso, p.Num_Control, d.Dia_ID, d.Nombre, d.Fecha
                FROM Permiso p
                INNER JOIN Dia d ON p.Permiso_ID = d.Permiso_ID';

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
        <h2 class="titu">Administración de los permisos y días:</h2>
        <input type="text" id="busqueda" placeholder="Buscar permiso o día...">
        <button onclick="buscar()" id="botonBuscar">Buscar</button>
    </div>
    <div class="editDate">
        <!-- Añadir datos -->
        <a href="#" class="enlaceSVG">
        <svg xmlns="http://www.w3.org/2000/svg" class="icon2 icon-tabler icon-tabler-pencil-plus" width="28" height="28" viewBox="0 0 24 24" stroke-width="1.5" stroke="#00abfb" fill="none" stroke-linecap="round" stroke-linejoin="round">
            <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
            <path d="M4 20h4l10.5 -10.5a2.828 2.828 0 1 0 -4 -4l-10.5 10.5v4" />
            <path d="M13.5 6.5l4 4" />
            <path d="M16 19h6" />
            <path d="M19 16v6" />
        </svg>
        </a>
        <!-- Eliminar datos -->
        <a href="" class="enlaceSVG">
        <svg xmlns="http://www.w3.org/2000/svg" class="icon2 icon-tabler icon-tabler-trash" width="28" height="28" viewBox="0 0 24 24" stroke-width="1.5" stroke="#ff2825" fill="none" stroke-linecap="round" stroke-linejoin="round">
            <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
            <path d="M4 7l16 0" />
            <path d="M10 11l0 6" />
            <path d="M14 11l0 6" />
            <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" />
            <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" />
        </svg>
        </a>
    </div>
    <table border="1">
        <tr>
            <th>Permiso ID</th>
            <th>Aplica</th>
            <th>Razón del Permiso</th>
            <th>Número de Control</th>
            <th>Día ID</th>
            <th>Nombre del Día</th>
            <th>Fecha del Día</th>
        </tr>
        <?php
            while ($row = oci_fetch_array($statement, OCI_ASSOC+OCI_RETURN_NULLS)) {
                echo "<tr>\n";
                echo "<td>" . ($row['PERMISO_ID'] !== null ? htmlentities($row['PERMISO_ID'], ENT_QUOTES) : "&nbsp;") . "</td>\n";
                echo "<td>" . ($row['APLICA'] !== null ? htmlentities($row['APLICA'], ENT_QUOTES) : "&nbsp;") . "</td>\n";
                echo "<td>" . ($row['RAZON_PERMISO'] !== null ? htmlentities($row['RAZON_PERMISO'], ENT_QUOTES) : "&nbsp;") . "</td>\n";
                echo "<td>" . ($row['NUM_CONTROL'] !== null ? htmlentities($row['NUM_CONTROL'], ENT_QUOTES) : "&nbsp;") . "</td>\n";
                echo "<td>" . ($row['DIA_ID'] !== null ? htmlentities($row['DIA_ID'], ENT_QUOTES) : "&nbsp;") . "</td>\n";
                echo "<td>" . ($row['NOMBRE'] !== null ? htmlentities($row['NOMBRE'], ENT_QUOTES) : "&nbsp;") . "</td>\n";
                echo "<td>" . ($row['FECHA'] !== null ? htmlentities($row['FECHA'], ENT_QUOTES) : "&nbsp;") . "</td>\n";
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
