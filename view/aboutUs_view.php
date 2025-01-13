<main id="aboutUsPage">
    <h1 class="titlePage">¿QUIÉNES SOMOS?</h1>

    <section class="aboutUsSection">
        <div class="aboutUsContainer">
            <div class="aboutUsRight">
                <div class="titleTextFlex">
                    <h1>La historia de nuestra tienda</h1>
                </div>
                <div class="aboutUsText">
                    <p><?php echo $controller->displayText('/ByKate_Stage/quienessomos', 'storyShop') ?></p>
                </div>

            </div>
            <div class="aboutUsImg">
                <img src="./photos/storyShop.jpg" alt="Foto de la tienda desde arriba">
            </div>
        </div>

    </section>

    <section id="automaticSlideAboutUs">
    </section>

    <section class="aboutUsSection">
        <div class="aboutUsContainer">
            <div class="aboutUsRight">
                <div class="titleTextFlex">
                    <h1>La historia de Catalina</h1>
                </div>
                <div class="aboutUsText">
                    <p><?php echo $controller->displayText('/ByKate_Stage/quienessomos', 'storyOwner') ?></p>
                </div>

            </div>
            <div class="aboutUsImg">
                <img src="./photos/storyOwner.jpg" alt="Foto de Catalina, propietaria de la tienda">
            </div>
        </div>

    </section>


</main>