document.getElementById('registerForm').addEventListener('submit', function(event) {
    event.preventDefault(); // Menghentikan pengiriman form standar

    const formData = new FormData(this);

    fetch('register.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.text())
    .then(data => {
        const responseMessage = document.getElementById('responseMessage');
        responseMessage.innerHTML = data;

        if (data.includes("berhasil")) {
            responseMessage.className = 'success';
        } else {
            responseMessage.className = 'error';
        }
    })
    .catch(error => console.error('Error:', error));
});
