slideIndex = 0;
showSlide(slideIndex);

function showSlide(idx) {
    console.log(idx);

    slides = document.getElementsByClassName("slide");
    dots = document.getElementsByClassName("dot");

    if(idx > slides.length - 1) {
        slideIndex = 0;
    }

    if(idx < 0) {
        slideIndex = slides.length - 1;
    }

    for(let i = 0; i < slides.length; i++) {
        slides[i].classList.remove('active');
        dots[i].classList.remove('active');
    }

    slides[slideIndex].classList.add('active');
    dots[slideIndex].classList.add('active');
}

function plusSlides(idx) {
    slideIndex += idx;
    showSlide(slideIndex);
}

function currentSlide(n) {
    slideIndex = n;
    showSlide(slideIndex);
}

autoSlide();

function autoSlide() {
    console.log(slideIndex);

    slides = document.getElementsByClassName("slide");
    dots = document.getElementsByClassName("dot");

    if(slideIndex > slides.length - 1) {
        slideIndex = 0;
    }

    if(slideIndex < 0) {
        slideIndex = slides.length - 1;
    }

    for(let i = 0; i < slides.length; i++) {
        slides[i].classList.remove('active');
        dots[i].classList.remove('active');
    }

    slides[slideIndex].classList.add('active');
    dots[slideIndex].classList.add('active');
    slideIndex++;

    setTimeout(autoSlide, 3000);
}
