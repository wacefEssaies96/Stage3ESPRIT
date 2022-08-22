function beginSlide() {
  var slideIndex = 1;
  showSlides(slideIndex);
}

function currentSlide(n) {
  showSlides(slideIndex = n);
}

function switchButton(n) {
  if (n == 1) {
    currentSlide(1);
  }
  if (n == 2) {
    currentSlide(2);
  }
}

function showSlides(n) {
  var i;
  var slides = document.getElementsByClassName("slides");
  var dots = document.getElementsByClassName("dot");
  if (n > slides.length) { slideIndex = 1 }
  if (n < 1) { slideIndex = slides.length }
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";
  }
  for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex - 1].style.display = "block";
  dots[slideIndex - 1].className += " active";
}