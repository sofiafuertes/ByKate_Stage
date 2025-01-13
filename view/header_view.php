<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Café de especialidad, pastelería y brunch">
    <base href="/ByKate_Stage/">
    <link rel="stylesheet" href="style/commun.css">
    <link rel="stylesheet" href="style/home.css">
    <link rel="stylesheet" href="style/adminPages.css">
    <link rel="stylesheet" href="style/menu.css">
    <link rel="stylesheet" href="style/contact.css">
    <link rel="stylesheet" href="style/aboutUs.css">
    <script src="javascript/header.js" defer></script>
    <script src="javascript/slide.js" defer></script>
    <script src="javascript/search.js" defer></script>
    <script src="javascript/form.js" defer></script>
    <script src="javascript/adminPage.js" defer></script>
    <script src="https://kit.fontawesome.com/cdc160965e.js" crossorigin="anonymous" ></script>
    <title>ByKate® - Coffee & Cakes -</title>
</head>

<body>
        <header>
            <nav>
                <div class="logoHeader">
                    <a href="/ByKate_Stage/"><img src="/ByKate_Stage/photos/logoHeader.png" alt="Logo ByKate®" width="200px"></a>
                </div>
                <div class="navbar">
                    <div class="navPages">
                        <a href="/ByKate_Stage/quienessomos">¿QUIÉNES SOMOS?</a>
                        <a href="/ByKate_Stage/nuestromenu">NUESTRO MENÚ</a>
                        <a href="/ByKate_Stage/recetas">RECETAS</a>
                        <a href="/ByKate_Stage/contacto">CONTACTO</a>
                        <a class="<?php echo $header->getclassConnexion() ?>" href="/ByKate_Stage/gestion">GESTIÓN</a>
                        <a class="<?php echo $header->getclassConnexion() ?>" href="/ByKate_Stage/logout">DESCONEXIÓN</a>

                    </div>
                </div>
                <div id="burgerMenu"><i class="fa-solid fa-bars" style="color: #67465B;" id="hamburgerMenu"></i></div>
            </nav>
        </header>
 