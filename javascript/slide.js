class AutomaticSlider {
    constructor(containerSelector, imageArray, transitionDelay = 3000) {
        this.container = document.querySelector(containerSelector);
        this.imageArray = imageArray;
        this.transitionDelay = transitionDelay;
        this.index = 0;

        if (this.container) {
            this.init();
        }
    }

    init() {
        // Crear las imágenes y agregarlas al contenedor
        this.imageArray.forEach((imageSrc) => {
            const div = document.createElement("div");
            const img = document.createElement("img");

            img.src = imageSrc;
            img.classList.add("imgSlide");

            div.appendChild(img);
            this.container.appendChild(div);
        });

        // Obtener las imágenes dentro del contenedor
        this.slides = this.container.querySelectorAll(".imgSlide");

        // Establecer la transición para cada imagen
        this.slides.forEach((slide) => {
            slide.style.transition = `all ${
                this.transitionDelay / 1000
            }s linear`;
        });

        // Mostrar el primer slide
        this.showSlide(this.index);

        // Iniciar el intervalo automático
        setInterval(() => {
            this.showSlide(this.index);
        }, this.transitionDelay);
    }

    showSlide(numberSlide) {
        this.slides.forEach((slide, i) => {
            slide.style.display = i === numberSlide ? "block" : "none";
        });
        this.index++;
        if (this.index >= this.slides.length) {
            this.index = 0;
        }
    }
}

const sliderContainer = document.querySelector("#automaticSlide");
if (sliderContainer) {
    new AutomaticSlider("#automaticSlide", [
        "./photos/slide_img/imgSlide1.jpg",
        "./photos/slide_img/imgSlide2.JPG",
        "./photos/slide_img/imgSlide3.jpg",
        "./photos/slide_img/imgSlide4.jpg",
    ]);
}


// Slider About Us
const slider = document.querySelector("#automaticSlideAboutUs");

if(slider) {

const imagesAboutUs = ["./photos/slide_img/imgSlide5.jpg",
    "./photos/slide_img/imgSlide6.JPG",
    "./photos/slide_img/imgSlide7.jpg",
    "./photos/slide_img/imgSlide8.jpg",
    "./photos/slide_img/imgSlide9.jpg",
    "./photos/slide_img/imgSlide10.JPG",
    "./photos/slide_img/imgSlide11.jpg",]



imagesAboutUs.forEach((imageSrc) => {
    const img = document.createElement('img');
    img.src = imageSrc;
    img.alt = "Carousel Image";
    slider.appendChild(img);
})


// Función para desplazar automáticamente
function startAutoScroll() {
    const SCROLL_STEP = 5; // Velocidad del desplazamiento
    setInterval(() => {
        slider.scrollLeft += SCROLL_STEP;

        // Reiniciar el scroll al principio cuando llegue al final
        if (slider.scrollLeft + slider.clientWidth >= slider.scrollWidth) {
            slider.scrollLeft = 0;
        }
    }, 10); // Ajusta la frecuencia del desplazamiento (en milisegundos)
}

// Iniciar el desplazamiento automático
startAutoScroll();
}