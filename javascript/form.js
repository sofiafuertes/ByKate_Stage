document.getElementById('contactForm').addEventListener('submit', function(event) {
    event.preventDefault();  // Prevenir que el formulario se envíe de forma tradicional

    var formData = new FormData(this);

    // Enviar formulario usando AJAX
    var xhr = new XMLHttpRequest();
    xhr.open('POST', this.action, true);
    
    xhr.onload = function() {
        if (xhr.status === 200) {  // Verifica que la respuesta del servidor sea exitosa
            var response = JSON.parse(xhr.responseText);  // Convertir la respuesta JSON a objeto

            var responseMessage = document.getElementById('responseMessage');
            if (response.success) {
                // Mostrar mensaje de éxito y vaciar el formulario
                responseMessage.style.color = 'green';
                responseMessage.style.display = 'block';
                responseMessage.textContent = response.success;
                document.getElementById('contactForm').reset(); // Vaciar el formulario
            } else if (response.error) {
                // Mostrar mensaje de error
                responseMessage.style.color = 'red';
                responseMessage.style.display = 'block';
                responseMessage.textContent = response.error;
            }
        } else {
            console.error('Error en la solicitud AJAX:', xhr.status, xhr.statusText);
        }
    };

    // Manejar errores de la solicitud
    xhr.onerror = function() {
        console.error('Error en la solicitud AJAX');
    };

    // Enviar los datos del formulario
    xhr.send(formData);
});