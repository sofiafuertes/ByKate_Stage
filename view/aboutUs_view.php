<main id="aboutUsPage">

    <h1 class="titlePage">¿QUIÉNES SOMOS?</h1>

    <section class="sectionAboutUs">
        <div class="sectionContainer">
            <div class="sectionContent">
                <div class="sectionTitle">
                    <h1>La historia de nuestra tienda</h1>
                </div>
                <div class="sectionText">
                    <p><?php echo $controller->displayText('/ByKate_Stage/quienessomos', 'storyShop') ?></p>
                </div>
            </div>
            <div class="sectionImg">
                <img src="./photos/storyShop.jpg" alt="Foto de la tienda desde arriba">
            </div>
        </div>
    </section>

    <section id="automaticSlideAboutUs" class="slider">
    </section>

    <section class="sectionAboutUs">
        <div class="sectionContainer">
            <div class="sectionContent">
                <div class="sectionTitle">
                    <h1>La historia de Catalina</h1>
                </div>
                <div class="sectionText">
                    <p><?php echo $controller->displayText('/ByKate_Stage/quienessomos', 'storyOwner') ?></p>
                </div>

            </div>
            <div class="sectionImg">
                <img src="./photos/storyOwner.jpg" alt="Foto de Catalina, propietaria de la tienda">
            </div>
        </div>
    </section>


</main>