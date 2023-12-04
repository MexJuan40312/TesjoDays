const openDeleteDialogButton = document.getElementById('openDeleteDialogButton');
const dialogg = document.getElementById('dialogg');
const closeDeleteDialogButton = document.getElementById('closeDeleteDialogButton');

// Función para mostrar el diálogo al hacer clic en el botón
openDeleteDialogButton.addEventListener('click', () => {
    dialogg.style.display = 'flex';
});

// Función para cerrar el diálogo al hacer clic en el botón de cierre
closeDeleteDialogButton.addEventListener('click', () => {
    dialogg.style.display = 'none';
});

document.getElementById('deleteButton').addEventListener('click', function() {
    if (confirm('¿Está seguro de que desea eliminar este usuario?')) {
        document.getElementById('deleteForm').submit();
    }
});

