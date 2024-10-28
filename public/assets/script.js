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
        if (data.success) limpiarCampos();
    })
    .catch(error => {
        mostrarMensaje('Error de conexión', 'danger');
    });
}

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
        if (data.success) limpiarCampos();
    })
    .catch(error => {
        mostrarMensaje('Error de conexión', 'danger');
    });
}

function mostrarMensaje(mensaje = '', tipo = 'danger') {
    const alertContainer = document.getElementById('alert-container');
    const alertDiv = document.createElement('div');
    alertDiv.className = `alert alert-${tipo}`;
    alertDiv.role = 'alert';
    alertDiv.innerText = mensaje;
    alertContainer.appendChild(alertDiv);

    setTimeout(() => { alertDiv.remove(); }, 2000);
}

function limpiarCampos() {
    document.getElementById('correo').value = '';
    document.getElementById('password').value = '';
}

function mostrarContrasena() {
    const password = document.getElementById('password');
    password.type = password.type === 'password' ? 'text' : 'password';
}