<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script
      src="https://kit.fontawesome.com/64d58efce2.js"
      crossorigin="anonymous"
    ></script>
    <link rel="stylesheet" href="../connection/CSS/estilosLog.css">
    <title>TesjoDays</title>
</head>
<body>
  
<?php
session_start();

$conexion = oci_connect("SYSTEM", "oracle", "localhost/xe");

if (!$conexion) {
    $m = oci_error();
    echo $m['message'], "\n";
    exit;
}

// Función para limpiar y validar datos
function cleanInput($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

// Registrar el usuario
if (isset($_POST['register'])) {
    $username = cleanInput($_POST['username']);
    $email = cleanInput($_POST['email']);
    $password = password_hash(cleanInput($_POST['password']), PASSWORD_DEFAULT);
    $role = cleanInput($_POST['role']);

    // Validación 
    if (empty($username) || empty($email) || empty($password) || empty($role)) {
        echo "Por favor, completa todos los campos.";
    } else {
        // Consulta preparada para evitar inyección SQL
        $query = oci_parse($conexion, "INSERT INTO Usuarios (Username, Email, Password, ROL) VALUES (:username, :email, :password, :role)");
        oci_bind_by_name($query, ':username', $username);
        oci_bind_by_name($query, ':email', $email);
        oci_bind_by_name($query, ':password', $password);
        oci_bind_by_name($query, ':role', $role);

        if (oci_execute($query)) {
            echo "Usuario registrado exitosamente.";
        } else {
            echo "Error al registrar el usuario: " . oci_error($query)['message'];
        }
    }
}

// Inicio de sesión
if (isset($_POST['login_username']) && isset($_POST['login_password'])) {
    $login_username = cleanInput($_POST['login_username']);
    $login_password = cleanInput($_POST['login_password']);

    // Validación
    if (empty($login_username) || empty($login_password)) {
        echo "Por favor, ingresa usuario y contraseña.";
    } else {
        // Consulta preparada
        $query = oci_parse($conexion, "SELECT * FROM Usuarios WHERE Username = :username");
        oci_bind_by_name($query, ':username', $login_username);

        if (oci_execute($query)) {
            $row = oci_fetch_assoc($query);

            if ($row && password_verify($login_password, $row['PASSWORD'])) {
                $_SESSION['user_id'] = $row['ID'];
                $_SESSION['username'] = $row['Username'];
                $role = $row['ROL'];

                // Redirigir al usuario según su rol
                switch ($role) {
                    case 'Desarrollador':
                        header("Location: index.php");
                        break;
                    case 'Jefe de carrera':
                        header("Location: JefeDeDivision.php");
                        break;
                    case 'Profesor':
                        header("Location: PerfilProfesor.php");
                        break;
                    default:
                        // Redirige a una página predeterminada si el rol no coincide con ninguna opción
                        header('Location: login.php');
                        break;
                }
                exit();
            } else {
                echo "Credenciales incorrectas.";
            }
        } else {
            echo "Error al realizar la consulta: " . oci_error($query)['message'];
        }
    }
}

oci_close($conexion);
?>

   <!-- Contenedor nuestro login -->
<div class="container">
      <div class="forms-container">
        <div class="signin-signup">

            <!-- FORMULARIO DE INICIO DE SESIÓN -->
            <form action="login.php" method="post" class="sign-in-form">
                <!-- Caja de la entrada -->
                <h2 class="title">Ingresa ahora</h2>
                <!-- Panel de ingresar Usuario -->
                <div class="input-field">
                    <i class="fas fa-user"></i>
                    <input type="text" name="login_username" placeholder="Usuario" />
                </div>
                <!-- Panel de ingresar Contraseña -->
                <div class="input-field">
                    <i class="fas fa-lock"></i>
                    <input type="password" name="login_password" placeholder="Contraseña" />
                </div>
                <input type="submit" value="Ingresar" class="btn solid" />
                <p class="social-text">Conoce más en estas plataformas</p>
                <!-- Iconos de las aplicaciones -->
                <div class="social-media">
                    <!-- Icono de Youtube -->
                    <a href="https://www.youtube.com/@juamba1775/videos" class="social-icon">
                        <i class="fab fa-youtube"></i>
                    </a>
                    <!-- Icono de Github -->
                    <a href="#" class="social-icon">
                        <i class="fab fa-github"></i>
                    </a>
                    <!-- Icono de Google -->
                    <a href="#" class="social-icon">
                        <i class="fab fa-google"></i>
                    </a>
                    <!-- Icono de Instagram -->
                    <a href="https://instagram.com/juanr.gn?igshid=MzMyNGUyNmU2YQ==" class="social-icon">
                        <i class="fab fa-instagram"></i>
                    </a>
                </div>
            </form>
          <script src="../connection/Js/Registro.js"></script>

          <!-- FORMULARIO PARA NUEVO USUARIO -->
          <form id="registration-form" action="login.php" method="post" class="sign-up-form">
            <h2 class="title">Regístrate</h2>
            <div class="input-field">
                <i class="fas fa-user"></i>
                <input type="text" name="username" placeholder="Nombre de Usuario" required/>
            </div>
            <div class="input-field">
                <i class="fas fa-envelope"></i>
                <input type="email" name="email" placeholder="Correo electronico" required/>
            </div>
            <div class="input-field">
                <i class="fas fa-lock"></i>
                <input type="password" name="password" placeholder="Contraseña" required/>
            </div>
            <div class="input-field">
            <label class="SelectIcon" for="role"><i class="fas fa-user"></i></label>
            <select class="SelectR" name="role" id="role" required>
                <option value="Jefe de carrera">Jefe de carrera</option>
                <option value="Profesor">Profesor</option>
            </select>
            </div>
            <input type="submit" class="btn" name="register" value="Crear cuenta" />
            <p class="social-text">Puedes saber más sobre nosotros</p>
            <div class="social-media">
                <!-- Icono de Youtube -->
                <a href="https://www.youtube.com/@juamba1775/videos" class="social-icon">
                    <i class="fab fa-youtube"></i>
                </a>
                <!-- Icono de GitHub -->
                <a href="#" class="social-icon">
                    <i class="fab fa-github"></i>
                </a>
                <!-- Icono de Google -->
                <a href="#" class="social-icon">
                    <i class="fab fa-google"></i>
                </a>
                <!-- Icono de Instagram -->
                <a href="https://instagram.com/juanr.gn?igshid=MzMyNGUyNmU2YQ==" class="social-icon">
                    <i class="fab fa-instagram"></i>
                </a>
            </div>
        </form>
        </div>
      </div>

      <!-- Blocke para el cambio al formulario de registro -->
      <div class="panels-container">
        <div class="panel left-panel">
          <div class="content">
            <h3>No tienes una cuenta? Registrate!</h3>
            <p>
              Si no tienes una cuenta puedes registrarte aquí, ya sea como 
              profesor o administrador!
            </p>
            <button class="btn transparent" id="sign-up-btn">
              Registrarme
            </button>
        <!-- Blocke para el cambio al formulario de Inicio de Sesión -->
          </div>
          <img src="../connection/imagenes/hombrePortada.png" class="image" alt="" />
        </div>
        <div class="panel right-panel">
          <div class="content">
            <h3>Eres uno de nosotros? Inicia Sesión ahora!</h3>
            <p>
              Si ya tienes una cuenta, puedes iniciar sesión dandole
              clic al siguiente botón.
            </p>
            <button class="btn transparent" id="sign-in-btn">
              Inicia ahora
            </button>
          </div>
          <img src="../connection/imagenes/HombrePc.png" class="image" alt="" />
        </div>
      </div>
    </div>

    <script src="../connection/Js/app.js"></script>
</body>
</html>