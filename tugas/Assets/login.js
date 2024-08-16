document.querySelector('form').addEventListener('submit', function(e) {
    e.preventDefault(); // Mencegah form dari reload halaman

    var formData = new FormData(this);

    fetch('login.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.text())
    .then(data => {
        const loginMessage = document.getElementById('loginMessage');

        if (loginMessage) {
            loginMessage.innerHTML = data;

            if (data.includes("Login sukses")) {
                loginMessage.className = 'success';
                window.location.href = 'dashboard.php'; // Redirect ke halaman utama
            } else {
                loginMessage.className = 'error'; // Menambahkan kelas error untuk styling
            }
        }
    })
    .catch(error => console.error('Error:', error));
});
