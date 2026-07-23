// ======================
// Category Slider
// ======================

const categoryTrack = document.querySelector(".category-track");
const nextBtn = document.querySelector(".arrow.right");
const prevBtn = document.querySelector(".arrow.left");

const cards = document.querySelectorAll(".category-card");

let currentIndex = 0;
const cardsPerSlide = 9;

const cardWidth = cards[0].offsetWidth + 22;

// Hide left arrow initially
prevBtn.style.display = "none";

nextBtn.addEventListener("click", () => {

    currentIndex += cardsPerSlide;

    if (currentIndex >= cards.length - cardsPerSlide) {
        currentIndex = cards.length - cardsPerSlide;
        nextBtn.style.display = "none";
    }

    categoryTrack.style.transform =
        `translateX(-${currentIndex * cardWidth}px)`;

    prevBtn.style.display = "block";

});

prevBtn.addEventListener("click", () => {

    currentIndex -= cardsPerSlide;

    if (currentIndex <= 0) {
        currentIndex = 0;
        prevBtn.style.display = "none";
    }

    categoryTrack.style.transform =
        `translateX(-${currentIndex * cardWidth}px)`;

    nextBtn.style.display = "block";

});



// ======================
// Hero Banner Slider
// ======================

const heroTrack = document.querySelector(".hero-track");
const heroNext = document.querySelector(".hero-right");
const heroPrev = document.querySelector(".hero-left");

const heroCards = document.querySelectorAll(".hero-card");

let heroIndex = 0;
const heroCardsPerSlide = 3;

const heroCardWidth = heroCards[0].offsetWidth + 20;

// Hide left arrow initially
heroPrev.style.display = "none";

heroNext.addEventListener("click", () => {

    heroIndex += heroCardsPerSlide;

    if (heroIndex >= heroCards.length - heroCardsPerSlide) {
        heroIndex = heroCards.length - heroCardsPerSlide;
        heroNext.style.display = "none";
    }

    heroTrack.style.transform =
        `translateX(-${heroIndex * heroCardWidth}px)`;

    heroPrev.style.display = "block";

});

heroPrev.addEventListener("click", () => {

    heroIndex -= heroCardsPerSlide;

    if (heroIndex <= 0) {
        heroIndex = 0;
        heroPrev.style.display = "none";
    }

    heroTrack.style.transform =
        `translateX(-${heroIndex * heroCardWidth}px)`;

    heroNext.style.display = "block";

});



const track = document.querySelector(".slider-track");
const slides = document.querySelectorAll(".slider-track img");
const dots = document.querySelectorAll(".slider-dots span");

let index = 0;

function slideBanner(){
    track.style.transform = `translateX(-${index * 100}%)`;

    dots.forEach(dot=>dot.classList.remove("active"));
    dots[index].classList.add("active");
}

setInterval(()=>{
    index++;

    if(index >= slides.length){
        index = 0;
    }

    slideBanner();

},3000);




