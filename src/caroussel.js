// Get carousel elements
const carousel = document.querySelector('.carousel');
const carouselImages = document.querySelectorAll('.carousel img');
const prevBtn = document.querySelector('.arrow-btn-prev');
const nextBtn = document.querySelector('.arrow-btn-next');

// Set initial position of carousel
let counter = 0;
const size = carouselImages[0].clientWidth;
carousel.style.transform = `translateX(${-size * counter}px)`;

// Set size of carousel on window resize
window.addEventListener('resize', () => {
    setCarouselSize();
});

// Set size of carousel on page load
document.addEventListener('DOMContentLoaded', () => {
    setCarouselSize();
});

// Set size of carousel wrapper and images
function setCarouselSize() {
    const wrapper = document.querySelector('.carousel-wrapper');
    const imgWidth = document.querySelector('.carousel img').clientWidth;
    wrapper.style.width = `${imgWidth}px`;
    carouselImages.forEach((image) => {
        image.style.width = `${imgWidth}px`;
    });
    // Hide or show arrows
    if (carouselImages.length == 1){
        prevBtn.style.display = 'none';
        nextBtn.style.display = 'none';
    }else{
        if (counter === 0) {

            prevBtn.style.display = 'none';
            nextBtn.style.display = 'flex';
        } else if (counter === carouselImages.length - 1) {
            prevBtn.style.display = 'flex';
            nextBtn.style.display = 'none';
        } else {
            prevBtn.style.display = 'flex';
            nextBtn.style.display = 'flex';
        }
    }

}

// Move carousel to next image
function moveToNext() {
    if (counter >= carouselImages.length - 1) return;
    carousel.style.transition = "transform 0.5s ease-in-out";
    counter++;
    carousel.style.transform = `translateX(${-size * counter}px)`;
    // Hide or show arrows
    if (counter === carouselImages.length - 1) {
        nextBtn.style.display = 'none';
    }
    if (counter > 0) {
        prevBtn.style.display = 'flex';
    }
}

// Move carousel to previous image
function moveToPrev() {
    if (counter <= 0) return;
    carousel.style.transition = "transform 0.5s ease-in-out";
    counter--;
    carousel.style.transform = `translateX(${-size * counter}px)`;
    // Hide or show arrows
    if (counter === 0) {
        prevBtn.style.display = 'none';
    }
    if (counter < carouselImages.length - 1) {
        nextBtn.style.display = 'flex';
    }
}

// Move carousel to first image when last image is reached
carousel.addEventListener('transitionend', () => {
    if (carouselImages[counter].id === 'last-clone') {
        carousel.style.transition = "none";
        counter = carouselImages.length - 2;
        carousel.style.transform = `translateX(${-size * counter}px)`;
    }
});

// Move carousel to last image when first image is reached
carousel.addEventListener('transitionstart', () => {
    if (carouselImages[counter].id === 'first-clone') {
        carousel.style.transition = "none";
        counter = carouselImages.length - counter;
        carousel.style.transform = `translateX(${-size * counter}px)`;
    }
});

// Event listeners for buttons
nextBtn.addEventListener('click', moveToNext);
prevBtn.addEventListener('click', moveToPrev);

