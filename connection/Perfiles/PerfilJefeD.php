<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>TesjoDays</title>
   <link rel="stylesheet" href="../CSS/estilos.css">
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

// Verificar si el usuario está autenticado
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
                  <li><a href="../Perfiles/PerfilJefeD.php">Inicio</a></li>
                  <li><a href="#">Servicios</a></li>
                  <li><a href="#">Producto</a></li>
                  <li><a href="#">Contacto</a></li>
               </ul>
            </nav>
         </div>
      </div>
   </header>
   <h2 class="GetOutB">Hola <?php echo $_SESSION['username']; ?></h2>

<div class="GetOutB">
    <h2>Hola <?php echo $_SESSION['username']; ?></h2>

    <!-- Botón de cerrar sesión -->
    <form action="../logout.php" method="post">
       <input type="submit" value="Cerrar Sesión">
    </form>
 </div>

</body>
</html>