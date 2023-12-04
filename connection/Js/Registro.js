document.getElementById('registration-form').addEventListener('submit', function (e) {
    e.preventDefault();
  
    // Obtener los valores del formulario
    const username = document.querySelector('input[name="username"]').value;
    const email = document.querySelector('input[name="email"]').value;
    const password = document.querySelector('input[name="password"]').value;
  
    // Realizar la petición AJAX al servidor PHP
    const xhr = new XMLHttpRequest();
    xhr.open('POST', 'register.php', true);
    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
  
    xhr.onload = function () {
      if (xhr.status === 200) {
        // Maneja la respuesta del servidor (puede mostrar un mensaje de éxito, redirigir, etc.)
        console.log(xhr.responseText);
      } else {
        console.error('Error al procesar la solicitud.');
      }
    };
  
    // Enviar los datos del formulario al servidor
    xhr.send(`username=${username}&email=${email}&password=${password}`);
  });
  