let imgContainer = document.querySelector("#automaticSlide");

let imgArray = [
    "./photos/slide_img/imgSlide1.jpg",
    "./photos/slide_img/imgSlide2.JPG",
    "./photos/slide_img/imgSlide3.jpg",
    "./photos/slide_img/imgSlide4.jpg",
];

imgArray.forEach((slide) => {
    let div = document.createElement("div");
    let img = document.createElement("img");

    img.src = slide;
    img.classList.add("imgSlide");

    div.appendChild(img);
    imgContainer.appendChild(div);
});

//Index and transition delay
let index = 0;
let transitionDelay = 3000;

let slides = imgContainer.querySelectorAll(".imgSlide");

for (let slide of slides) {
    slide.style.transition = "all ${transitionDelay/1000}s linear";
}

showSlide(index);

function showSlide(numberSlide) {
    slides.forEach((slide, i) => {
        slide.style.display = i === numberSlide ? "block" : "none";
    });
    index++;
    if (index >= slides.length) {
        index = 0;
    }
}

setInterval(() => {
    showSlide(index);
}, transitionDelay);
