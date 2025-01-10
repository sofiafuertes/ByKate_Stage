<main class="contactPage">
    <div class="containerText">
        <h1 class="titlePage">CONTACTO</h1>
        <p class="textPage">¿Estás organizando un evento y te gustaría conocer nuestras opciones? ¿Tienes alguna
            pregunta sobre nuestros productos? <br> ¿O deseas hacer un pedido personalizado? <br>
            No dudes en preguntarnos cualquier detalle sobre ingredientes, tamaños, precios o cualquier otra duda que
            tengas. Estamos aquí para ayudarte a crear el pastel perfecto para tu ocasión especial.
        </p>

        <p class="textPage">Llena el formulario a continuación para que podamos comenzar a ayudarte con tu pedido. Nos
            pondremos en contacto contigo lo antes posible. Nuestro equipo responde en un plazo de 24 a 48 horas, de
            lunes a viernes.</p>
    </div>
    <section class="containerContactForm">
        <form id="contactForm" action="/ByKate_Stage/config/send_email.php" method="POST">
            <label for="name">Nombre Completo *</label>
            <input type="text" id="nameForm" name="name" placeholder="Nombre Apellido" autofocus required>
            <label for="email">Correo Electrónico *</label>
            <input type="email" id="emailForm" name="email" placeholder="nombre@mail.com" required>
            <select name="options" id="optionsForm">
                <option value="personalize">Quiero un pastel personalizado</option>
                <option value="event_info">Tengo un evento, quiero información sobre opciones y precios</option>
                <option value="issue">Tengo un problema o inquietud</option>
                <option value="general_question">Tengo otra pregunta</option>
            </select>
            <label for="message">Mensaje *</label>
            <textarea name="message" id="message" cols="40" rows="10" maxlength="600"
                placeholder="Escribe aquí tu mensaje" required></textarea>
            <p>Los campos marcados con * son obligatorios</p>
            <div class="divButton">
                <input class="button" type="submit" name="messageSend" value="Enviar">
            </div>
            <div id="responseMessage" style="display:none;"></div>
        </form>
    </section>
    <section class="containerSocialMedia">
        <div class="socialMediaContact">
            <p>También puedes encontrarnos en nuestras redes sociales:</p>
            <a href="https://www.instagram.com/bykatebcn/"><i class="fa-brands fa-instagram iconSocialMedia"
                    style="color: #67465b;"></i>/bykatebcn</a>
            <a href="https://www.facebook.com/bykatecafe"><i class="fa-brands fa-facebook-f iconSocialMedia"
                    style="color: #67465b;"></i>bykatecafe</a>
            <a href="https://www.tiktok.com/@bykatebcn"><i class="fa-brands fa-tiktok iconSocialMedia"
                    style="color: #67465b;"></i>bykatebcn</a>

        </div>

    </section>
</main>