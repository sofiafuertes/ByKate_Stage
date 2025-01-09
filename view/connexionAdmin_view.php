<main>
    <div class="container">
    <h1>CONEXIÓN</h1>
    <form class="formConnexion" action="" method="POST">
        <input type="mail" name="login" class="login"
            maxlength="30" placeholder="Mail" autofocus required>
        <input type="password" name="password" class="password" placeholder="Password" required>
        <div class="forgotpwd">
            <a href="#">Contraseña olvidada?</a>
        </div>
        <p><?php echo $connexion->getMessage()?></p>
        <div class="divButton">
            <input class="button" type="submit" name="connexionSubmit" value="CONEXIÓN">
        </div>
    </form>
    </div>
</main>