const container = document.querySelector(".container");
const menuIcon = document.querySelector(".menu-icon");
const headingRight = document.querySelector(".main-heading-right");
const headingLeft = document.querySelector(".main-heading-left");

menuIcon.addEventListener("click", () => {
  container.classList.toggle("navigate");
});

const responsiveDesign = () => {
  if (window.innerWidth <= 700) {
    headingRight.style.display = "none";
    headingLeft.textContent = "University of Botwsana";
    
  } else {
    headingRight.style.display = "block";
    headingLeft.textContent = "u";

  }
};

window.addEventListener("resize", () => {
  responsiveDesign();
});

responsiveDesign();



const scrollRevealOption = {
  distance: "50px",
  origin: "bottom",
  duration: 1000,
};

ScrollReveal().reveal(".header__image img", {
  ...scrollRevealOption,
  origin: "right",
});
ScrollReveal().reveal(".header__content h2", {
  ...scrollRevealOption,
  delay: 500,
});
ScrollReveal().reveal(".header__content h1", {
  ...scrollRevealOption,
  delay: 1000,
});
ScrollReveal().reveal(".header__content p", {
  ...scrollRevealOption,
  delay: 1100,
});
ScrollReveal().reveal(".header__btns", {
  ...scrollRevealOption,
  delay: 2000,
});
const button = document.getElementById('myButton');

button.addEventListener('click', function() {
    // Change the current URL to navigate to a new page
    window.location.href = '../../login-signup/signup-page.html';
});