document.getElementById('contactForm').addEventListener('submit', async function(event) {
    event.preventDefault(); // Evitar el envío estándar del formulario

    const form = event.target;
    const formData = new FormData(form);

    try {
        const response = await fetch(form.action, {
            method: 'POST',
            body: formData,
        });

        const result = await response.json();

        const responseMessage = document.getElementById('responseMessage');
        responseMessage.style.display = 'block';

        if (result.success) {
            responseMessage.textContent = result.success;
            responseMessage.style.color = 'green';
            alert('Mensaje enviado con éxito, nos podremos en contacto contigo lo antes posible!');

            form.reset(); // Limpiar el formulario
        } else {
            responseMessage.textContent = result.error || 'Error desconocido.';
            responseMessage.style.color = 'red';
        }
    } catch (error) {
        console.error('Error al enviar el formulario:', error);
        alert('Hubo un problema al enviar el formulario. Inténtalo más tarde.');
    }
});
