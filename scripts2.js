document.addEventListener('DOMContentLoaded', (event) => {
    const invitationCodeInput = document.getElementById('invitation-code');
    if (invitationCodeInput) {
        const code = Math.floor(100000 + Math.random() * 900000).toString();
        invitationCodeInput.value = code;
    }
});

function register() {
    const email = document.getElementById('email').value;
    const password = document.getElementById('password').value;
    const confirmPassword = document.getElementById('confirm-password').value;

    if (!email || !password || !confirmPassword) {
        alert('Por favor, complete todos los campos.');
        return;
    }

    if (password !== confirmPassword) {
        alert('Las contraseñas no coinciden.');
        return;
    }

    alert('Registro exitoso');
    window.location.href = 'Home.html';
}

function login() {
    const email = document.getElementById('login-email').value;
    const password = document.getElementById('login-password').value;

    if (!email || !password) {
        alert('Por favor, complete todos los campos.');
        return;
    }

    alert('Ingreso exitoso');
    window.location.href = 'home.html';
}