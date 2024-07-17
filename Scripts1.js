document.addEventListener('DOMContentLoaded', function() {
    document.getElementById('loginForm').addEventListener('submit', function(event) {
        event.preventDefault(); // Prevent the default form submission

        // Get the values from the input fields
        var email = document.getElementById('email').value;
        var password = document.getElementById('password').value;

        // Basic validation
        if (email === "" || password === "") {
            alert("Por favor, complete todos los campos.");
            return;
        }

        // Simulate successful login
        alert("Inicio de sesión exitoso!");
        window.location.href = "Home.html"; // Redirect to Home.html
    });
});