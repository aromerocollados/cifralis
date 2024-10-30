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
function mostrarContrasena() {
    const inputPassword = document.getElementById('password');
    inputPassword.type = inputPassword.type === 'password' ? 'text' : 'password';
}

// Función para cambiar el active de los links
function cambiarActive() {
    const navLinks = document.querySelectorAll('.nav-link');
    navLinks.forEach(link => {
        link.addEventListener('click', function () {
            navLinks.forEach(link => link.classList.remove('active'));
            this.classList.add('active');
        });
    });
}

// Función para cerrar sesión
function cerrarSesion() {
    const overlay = document.createElement('div');
    overlay.id = 'overlay';
    overlay.style.position = 'fixed';
    overlay.style.top = '0';
    overlay.style.left = '0';
    overlay.style.width = '100%';
    overlay.style.height = '100%';
    overlay.style.backgroundColor = 'rgba(0, 0, 0, 0.5)';
    overlay.style.zIndex = '999';

    const mensajeDiv = document.createElement('div');
    mensajeDiv.id = 'cerrando-sesion';
    mensajeDiv.innerText = 'Cerrando sesión...';
    
    mensajeDiv.style.position = 'fixed';
    mensajeDiv.style.top = '50%';
    mensajeDiv.style.left = '50%';
    mensajeDiv.style.transform = 'translate(-50%, -50%)';
    mensajeDiv.style.padding = '20px';
    mensajeDiv.style.backgroundColor = '#333';
    mensajeDiv.style.color = '#fff';
    mensajeDiv.style.fontSize = '18px';
    mensajeDiv.style.borderRadius = '5px';
    mensajeDiv.style.boxShadow = '0 0 10px rgba(0, 0, 0, 0.5)';
    mensajeDiv.style.zIndex = '1000';

    overlay.appendChild(mensajeDiv);

    document.body.appendChild(overlay);

    setTimeout(() => {
        window.location.href = '../src/logout.php';
    }, 3000); 
}