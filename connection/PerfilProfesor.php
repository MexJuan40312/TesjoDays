<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>TesjoDays</title>
   <link rel="stylesheet" href="CSS/estilos.css">
   <link rel="stylesheet" href="CSS/perfiles_estilos.css">
</head>
<body>
   <!-- Codigo de conexión con Php-->
   <?php
   $conexion = oci_connect("SYSTEM", "oracle", "localhost/xe"); # Credenciales para el inicio de sesión

   if (!$conexion) {
      $m = oci_error();
      echo $m['message'], "n";
      exit;
   }else{
      echo"";}

      session_start();

// Verificar si el usuario no está autenticado
if (!isset($_SESSION['user_id'])) {
    // Redirigir a la página de inicio de sesión si el usuario no está autenticado
    header("Location: login.php");
    exit();
}
   ?>

<!-- CABECERA -->
<header>
   <div class="content">
      <div class="menu container">
         <a href="../connection/PerfilProfesor.php" class="logo">Tesjo<span class="DaysLite">Days</span> 
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
               <li><a href="../connection/index.php">Inicio</a></li>
               <li><a href="#">Servicios</a></li>
               <li><a href="#">Producto</a></li>
               <li><a href="../connection/Perfiles/PerfilProf.php">Perfil</a></li>
            </ul>
         </nav>
      </div>
   </div>
</header>
<div class="container-principal">
   <img class="ImgPrinc" src="../connection/imagenes/TesjoFondoRemake.jpg" alt="">
   <div class="Texto">
      <h2 class="Contrl">Control Docente del Tecnológico de Estudios Superiores de Jocotitlán (Profesor)</h2>
      <p class="Contrl2">"¡Bienvenido!, Aquí podrás consultar la información con respecto a tus asistencias
        como profesor, recuerda que solo puedes consultar datos"</p>
   </div>
</div>


   <!-- INFORMACIÓN DENTRO DE LA CAJA -->
   <main class="contenedor1 sombra">
   <!-- CONSULTAS -->
      <h1 class="consult2">Puedes consultar algunas datos aquí:</h1>
   <div class="container1">
      <div class="content1">
         <!-- CONSULTA 1 -->
         <p>- Profesores y sus días economicos totales</p>
      </div>
      <span>
         <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-letter-i" width="28" height="28" viewBox="0 0 24 24" stroke-width="1.5" stroke="#000000" fill="none" stroke-linecap="round" stroke-linejoin="round">
         <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
         <path d="M12 4l0 16" />
         </svg>
      </span>

      <div class="icon-container">
      <!-- Botón ver -->
      <a href="../connection/consultas_PerfilProfesor/consulta1.php">
         <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-eye-check" width="28" height="28" viewBox="0 0 24 24" stroke-width="1.5" stroke="#00abfb" fill="none" stroke-linecap="round" stroke-linejoin="round">
               <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
               <path d="M10 12a2 2 0 1 0 4 0a2 2 0 0 0 -4 0" />
               <path d="M11.102 17.957c-3.204 -.307 -5.904 -2.294 -8.102 -5.957c2.4 -4 5.4 -6 9 -6c3.6 0 6.6 2 9 6a19.5 19.5 0 0 1 -.663 1.032" />
               <path d="M15 19l2 2l4 -4" />
         </svg>
      </a>
      </div>
   </div>

   <div class="container1">
      <div class="content1">
         <!-- CONSULTA 2 -->
         <p>- Profesores y sus días económicos restantes</p>
      </div>
    <span>
         <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-letter-i" width="28" height="28" viewBox="0 0 24 24" stroke-width="1.5" stroke="#000000" fill="none" stroke-linecap="round" stroke-linejoin="round">
         <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
         <path d="M12 4l0 16" />
         </svg>
        </span>
      <div class="icon-container">
      <!-- Botón ver -->
      <a href="../connection/consultas_PerfilProfesor/consulta2.php">
         <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-eye-check" width="28" height="28" viewBox="0 0 24 24" stroke-width="1.5" stroke="#00abfb" fill="none" stroke-linecap="round" stroke-linejoin="round">
               <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
               <path d="M10 12a2 2 0 1 0 4 0a2 2 0 0 0 -4 0" />
               <path d="M11.102 17.957c-3.204 -.307 -5.904 -2.294 -8.102 -5.957c2.4 -4 5.4 -6 9 -6c3.6 0 6.6 2 9 6a19.5 19.5 0 0 1 -.663 1.032" />
               <path d="M15 19l2 2l4 -4" />
         </svg>
      </a>
      </div>
   </div>

   <div class="container1">
      <div class="content1">
         <!-- CONSULTA 3 -->
         <p>- Profesores y la razón de permiso</p>
      </div>
    <span>
         <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-letter-i" width="28" height="28" viewBox="0 0 24 24" stroke-width="1.5" stroke="#000000" fill="none" stroke-linecap="round" stroke-linejoin="round">
         <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
         <path d="M12 4l0 16" />
         </svg>
        </span>
      <div class="icon-container">
      <!-- Botón ver -->
      <a href="../connection/consultas_PerfilProfesor/consulta3.php">
         <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-eye-check" width="28" height="28" viewBox="0 0 24 24" stroke-width="1.5" stroke="#00abfb" fill="none" stroke-linecap="round" stroke-linejoin="round">
               <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
               <path d="M10 12a2 2 0 1 0 4 0a2 2 0 0 0 -4 0" />
               <path d="M11.102 17.957c-3.204 -.307 -5.904 -2.294 -8.102 -5.957c2.4 -4 5.4 -6 9 -6c3.6 0 6.6 2 9 6a19.5 19.5 0 0 1 -.663 1.032" />
               <path d="M15 19l2 2l4 -4" />
         </svg>
      </a>
      </div>
   </div>

   <div class="container1">
      <div class="content1">
         <!-- CONSULTA 4 -->
         <p>- Jefes de división y sus respectivas carreras</p>
      </div>
    <span>
         <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-letter-i" width="28" height="28" viewBox="0 0 24 24" stroke-width="1.5" stroke="#000000" fill="none" stroke-linecap="round" stroke-linejoin="round">
         <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
         <path d="M12 4l0 16" />
         </svg>
        </span>
      <div class="icon-container">
      <!-- Botón ver -->
      <a href="../connection/consultas_PerfilProfesor/consulta4.php">
         <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-eye-check" width="28" height="28" viewBox="0 0 24 24" stroke-width="1.5" stroke="#00abfb" fill="none" stroke-linecap="round" stroke-linejoin="round">
               <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
               <path d="M10 12a2 2 0 1 0 4 0a2 2 0 0 0 -4 0" />
               <path d="M11.102 17.957c-3.204 -.307 -5.904 -2.294 -8.102 -5.957c2.4 -4 5.4 -6 9 -6c3.6 0 6.6 2 9 6a19.5 19.5 0 0 1 -.663 1.032" />
               <path d="M15 19l2 2l4 -4" />
         </svg>
      </a>
      </div>
   </div>

   <div class="container1">
      <div class="content1">
         <!-- CONSULTA 5 -->
         <p>- Profesores de mayor antiguedad</p>
      </div>
    <span>
         <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-letter-i" width="28" height="28" viewBox="0 0 24 24" stroke-width="1.5" stroke="#000000" fill="none" stroke-linecap="round" stroke-linejoin="round">
         <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
         <path d="M12 4l0 16" />
         </svg>
        </span>
      <div class="icon-container">
      <!-- Botón ver -->
      <a href="../connection/consultas_PerfilProfesor/consulta5.php">
         <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-eye-check" width="28" height="28" viewBox="0 0 24 24" stroke-width="1.5" stroke="#00abfb" fill="none" stroke-linecap="round" stroke-linejoin="round">
               <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
               <path d="M10 12a2 2 0 1 0 4 0a2 2 0 0 0 -4 0" />
               <path d="M11.102 17.957c-3.204 -.307 -5.904 -2.294 -8.102 -5.957c2.4 -4 5.4 -6 9 -6c3.6 0 6.6 2 9 6a19.5 19.5 0 0 1 -.663 1.032" />
               <path d="M15 19l2 2l4 -4" />
         </svg>
      </a>
      </div>
   </div>

   <h1 class="consult2">Para información detallada puedes consultarlo aquí:</h1>
   <!-- TABLA CARRERA -->
   <div class="container1">
      <div class="content1">
         <p>- Carreras del Tesjo</p>
      </div>
      <span>
         <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-letter-i" width="28" height="28" viewBox="0 0 24 24" stroke-width="1.5" stroke="#000000" fill="none" stroke-linecap="round" stroke-linejoin="round">
         <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
         <path d="M12 4l0 16" />
         </svg>
      </span>

      <div class="icon-container">
      <!-- Botón ver -->
      <a href="../connection/TablasBDD_Prof/TablaCarrera.php">
         <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-eye-check" width="28" height="28" viewBox="0 0 24 24" stroke-width="1.5" stroke="#00abfb" fill="none" stroke-linecap="round" stroke-linejoin="round">
               <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
               <path d="M10 12a2 2 0 1 0 4 0a2 2 0 0 0 -4 0" />
               <path d="M11.102 17.957c-3.204 -.307 -5.904 -2.294 -8.102 -5.957c2.4 -4 5.4 -6 9 -6c3.6 0 6.6 2 9 6a19.5 19.5 0 0 1 -.663 1.032" />
               <path d="M15 19l2 2l4 -4" />
         </svg>
      </a>
      </div>
   </div>

      <!-- TABLA JEFES DE DIVISIÓN -->
      <div class="container1">
      <div class="content1">
         <p>- Jefes de División</p>
      </div>
      <span>
         <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-letter-i" width="28" height="28" viewBox="0 0 24 24" stroke-width="1.5" stroke="#000000" fill="none" stroke-linecap="round" stroke-linejoin="round">
         <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
         <path d="M12 4l0 16" />
         </svg>
      </span>

      <div class="icon-container">
      <!-- Botón ver -->
      <a href="../connection/TablasBDD_Prof/TablaJDiv.php">
         <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-eye-check" width="28" height="28" viewBox="0 0 24 24" stroke-width="1.5" stroke="#00abfb" fill="none" stroke-linecap="round" stroke-linejoin="round">
               <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
               <path d="M10 12a2 2 0 1 0 4 0a2 2 0 0 0 -4 0" />
               <path d="M11.102 17.957c-3.204 -.307 -5.904 -2.294 -8.102 -5.957c2.4 -4 5.4 -6 9 -6c3.6 0 6.6 2 9 6a19.5 19.5 0 0 1 -.663 1.032" />
               <path d="M15 19l2 2l4 -4" />
         </svg>
      </a>
      </div>
   </div>

      <!-- TABLA PROFESORES -->
      <div class="container1">
      <div class="content1">
         <p>- Profesores</p>
      </div>
      <span>
         <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-letter-i" width="28" height="28" viewBox="0 0 24 24" stroke-width="1.5" stroke="#000000" fill="none" stroke-linecap="round" stroke-linejoin="round">
         <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
         <path d="M12 4l0 16" />
         </svg>
      </span>

      <div class="icon-container">
      <!-- Botón ver -->
      <a href="../connection/TablasBDD_Prof/TablaProf.php">
         <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-eye-check" width="28" height="28" viewBox="0 0 24 24" stroke-width="1.5" stroke="#00abfb" fill="none" stroke-linecap="round" stroke-linejoin="round">
               <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
               <path d="M10 12a2 2 0 1 0 4 0a2 2 0 0 0 -4 0" />
               <path d="M11.102 17.957c-3.204 -.307 -5.904 -2.294 -8.102 -5.957c2.4 -4 5.4 -6 9 -6c3.6 0 6.6 2 9 6a19.5 19.5 0 0 1 -.663 1.032" />
               <path d="M15 19l2 2l4 -4" />
         </svg>
      </a>
      </div>
   </div>

      <!-- TABLAS DIAS ECONÓMICOS -->
      <div class="container1">
      <div class="content1">
         <p>- Días económicos por caso</p>
      </div>
      <span>
         <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-letter-i" width="28" height="28" viewBox="0 0 24 24" stroke-width="1.5" stroke="#000000" fill="none" stroke-linecap="round" stroke-linejoin="round">
         <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
         <path d="M12 4l0 16" />
         </svg>
      </span>

      <div class="icon-container">
      <!-- Botón ver -->
      <a href="../connection/TablasBDD_Prof/DiaEcon.php">
         <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-eye-check" width="28" height="28" viewBox="0 0 24 24" stroke-width="1.5" stroke="#00abfb" fill="none" stroke-linecap="round" stroke-linejoin="round">
               <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
               <path d="M10 12a2 2 0 1 0 4 0a2 2 0 0 0 -4 0" />
               <path d="M11.102 17.957c-3.204 -.307 -5.904 -2.294 -8.102 -5.957c2.4 -4 5.4 -6 9 -6c3.6 0 6.6 2 9 6a19.5 19.5 0 0 1 -.663 1.032" />
               <path d="M15 19l2 2l4 -4" />
         </svg>
      </a>
      </div>
   </div>

      <!-- TABLA PERMISOS CON DÍA -->
      <div class="container1">
      <div class="content1">
         <p>- Administra los permisos</p>
      </div>
      <span>
         <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-letter-i" width="28" height="28" viewBox="0 0 24 24" stroke-width="1.5" stroke="#000000" fill="none" stroke-linecap="round" stroke-linejoin="round">
         <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
         <path d="M12 4l0 16" />
         </svg>
      </span>

      <div class="icon-container">
      <!-- Botón ver -->
      <a href="../connection/TablasBDD_Prof/TablaPermi_Dia.php">
         <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-eye-check" width="28" height="28" viewBox="0 0 24 24" stroke-width="1.5" stroke="#00abfb" fill="none" stroke-linecap="round" stroke-linejoin="round">
               <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
               <path d="M10 12a2 2 0 1 0 4 0a2 2 0 0 0 -4 0" />
               <path d="M11.102 17.957c-3.204 -.307 -5.904 -2.294 -8.102 -5.957c2.4 -4 5.4 -6 9 -6c3.6 0 6.6 2 9 6a19.5 19.5 0 0 1 -.663 1.032" />
               <path d="M15 19l2 2l4 -4" />
         </svg>
      </a>
      </div>
   </div>
   </main>

</body>
</html>