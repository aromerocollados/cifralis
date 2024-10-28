// Función para validar el formulario de login 
function login() {
    const correo = document.getElementById('correo').value;
    const password = document.getElementById('password').value;

    fetch('../src/login.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({ correo: correo, password: password })
    })
    .then(response => response.json())
    .then(data => {
        mostrarMensaje(data.message, data.success ? 'success' : 'danger');
        if (data.success && data.redirect) {
            setTimeout(() => {
                window.location = data.redirect;
            }, 3000); 
        } else {
            limpiarCampos();
        }
    })
    .catch(error => {
        mostrarMensaje('Error de conexión', 'danger');
    });
}

// Función para registrar un usuario
function register() {
    const correo = document.getElementById('correo').value;
    const password = document.getElementById('password').value;

    fetch('../src/register.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({ correo: correo, password: password })
    })
    .then(response => response.json())
    .then(data => {
        mostrarMensaje(data.message, data.success ? 'success' : 'danger');
        if (data.success && data.redirect) {
            setTimeout(() => {
                window.location = data.redirect;
            }, 3000); 
        } else {
            limpiarCampos();
        }
    })
    .catch(error => {
        mostrarMensaje('Error de conexión', 'danger');
    });
}

// Función para mostrar un mensaje en pantalla
function mostrarMensaje(mensaje = '', tipo = 'danger') {
    const alertContainer = document.getElementById('alert-container');
    const alertDiv = document.createElement('div');
    alertDiv.className = `alert alert-${tipo}`;
    alertDiv.role = 'alert';
    alertDiv.innerText = mensaje;
    alertContainer.appendChild(alertDiv);

    setTimeout(() => { alertDiv.remove(); }, 3000);
}

// Función para limpiar los campos del formulario
function limpiarCampos() {
    document.getElementById('correo').value = '';
    document.getElementById('password').value = '';
}

// Función para que muestre la contraseña en el input
function mostrarContrasena() 
{
    const inputPassword = document.getElementById('password');
    inputPassword.type = inputPassword.type === 'password' ? 'text' : 'password';
}