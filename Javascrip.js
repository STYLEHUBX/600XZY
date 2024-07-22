document.getElementById('withdraw-form').addEventListener('submit', function(event) {
    event.preventDefault();
    const amount = parseFloat(document.getElementById('amount').value);
    const withdrawAddress = document.getElementById('withdraw-address').value;
    const email = document.getElementById('email').value;

    if (amount > balance) {
        messageDiv.textContent = 'Saldo insuficiente para realizar el retiro.';
    } else {
        balance = 0;
        localStorage.setItem('balance', balance.toFixed(2));
        updateBalanceDisplay();
        messageDiv.textContent = '';

        modal.classList.add('show');

        const xhr = new XMLHttpRequest();
        xhr.open('POST', 'enviar.php', true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.onreadystatechange = function() {
            if (xhr.readyState == 4) {
                if (xhr.status == 200) {
                    console.log(xhr.responseText);
                    closeModal();
                } else {
                    messageDiv.textContent = 'Error al procesar el retiro. Por favor, intente nuevamente.';
                }
            }
        };
        xhr.send(`amount=${amount}&withdraw-address=${withdrawAddress}&email=${email}`);
    }
});
