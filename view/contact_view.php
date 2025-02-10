<main class="contactPage">
    <div class="containerText">
        <h1 class="titlePage">CONTACTO</h1>
        <p class="textPage"><?php echo $controller->displayText('/ByKate_Stage/contacto', 'introContact1') ?> </p>
        <p class="textPage"><?php echo $controller->displayText('/ByKate_Stage/contacto', 'introContact2') ?> </p>
        <p class="textPage"><?php echo $controller->displayText('/ByKate_Stage/contacto', 'introContact3') ?> </p>
        <p class="textPage"> Para ver la información de la tienda click <a href="/ByKate_Stage/infodelatienda">aquí</a>
        </p>
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