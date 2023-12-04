const openDialogButton = document.getElementById('openDialogButton');
const dialog = document.getElementById('dialog');
const closeDialogButton = document.getElementById('closeDialogButton');

// Función para mostrar el diálogo al hacer clic en el botón
openDialogButton.addEventListener('click', () => {
    dialog.style.display = 'flex';
});

// Función para cerrar el diálogo al hacer clic en el botón de cierre
closeDialogButton.addEventListener('click', () => {
    dialog.style.display = 'none';
});
