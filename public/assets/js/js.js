const menuBtn = document.getElementById("menu-btn");
const navLinks = document.getElementById("nav-links");
const menuBtnIcon = menuBtn.querySelector("i");

menuBtn.addEventListener("click", (e) => {
    navLinks.classList.toggle("open");

    const isOpen = navLinks.classList.contains("open");
    menuBtnIcon.setAttribute("class", isOpen ? "ri-close-line" : "ri-menu-line");
});

document.addEventListener('click', function (event) {
    const dropdown = document.querySelector('.nav-item.dropdown');
    const navLinks = document.querySelector('.nav__links');

    // Agar dropdown yoki uning ichidagi elementlardan biri bosilsa, nav__links ni yopma
    if (dropdown.contains(event.target)) {
        navLinks.classList.add('open');
        menuBtnIcon.setAttribute("class", "ri-close-line");
    }
});
navLinks.addEventListener("click", (e) => {
    navLinks.classList.remove("open");
    menuBtnIcon.setAttribute("class", "ri-menu-line");
});
document.addEventListener("DOMContentLoaded", function () {
    // URL oxirida `#form` bo'lganda sahifani pastga siljitish uchun
    if (window.location.hash === "#form") {
        const element = document.querySelector(window.location.hash);
        if (element) {
            window.scrollTo({
                top: element.getBoundingClientRect().top + window.pageYOffset - 20, // 30px pastga tushish
                behavior: "smooth"
            });
        }
    }
});



const scrollRevealOption = {
    distance: "50px",
    origin: "bottom",
    duration: 1000,
};

ScrollReveal().reveal(".header__image img", {
    ...scrollRevealOption,
    origin: "right",
});
ScrollReveal().reveal(".header__tag", {
    ...scrollRevealOption,
    delay: 500,
});
ScrollReveal().reveal(".header__content h1", {
    ...scrollRevealOption,
    delay: 1000,
});
ScrollReveal().reveal(".header__content .section__description", {
    ...scrollRevealOption,
    delay: 1500,
});
ScrollReveal().reveal(".header__btns", {
    ...scrollRevealOption,
    delay: 2000,
});

ScrollReveal().reveal(".service__card", {
    ...scrollRevealOption,
    interval: 500,
});

const swiper = new Swiper(".swiper", {
    slidesPerView: "auto",
    spaceBetween: 30,
    loop: true, // Enables looping of slides
    autoplay: {
        delay: 1000, // Time delay between slides in milliseconds
        disableOnInteraction: false, // Autoplay continues after user interactions
    },
});


ScrollReveal().reveal(".client__image img", {
    ...scrollRevealOption,
    origin: "left",
});
ScrollReveal().reveal(".client__content .section__subheader", {
    ...scrollRevealOption,
    delay: 500,
});
ScrollReveal().reveal(".client__content .section__header", {
    ...scrollRevealOption,
    delay: 1000,
});
ScrollReveal().reveal(".client__content .section__description", {
    ...scrollRevealOption,
    delay: 1500,
});
ScrollReveal().reveal(".client__details", {
    ...scrollRevealOption,
    delay: 2000,
});
ScrollReveal().reveal(".client__rating", {
    ...scrollRevealOption,
    delay: 2500,
});

ScrollReveal().reveal(".download__image img", {
    ...scrollRevealOption,
    origin: "right",
});
ScrollReveal().reveal(".download__content .section__subheader", {
    ...scrollRevealOption,
    delay: 500,
});
ScrollReveal().reveal(".download__content .section__header", {
    ...scrollRevealOption,
    delay: 1000,
});
ScrollReveal().reveal(".download__content .section__description", {
    ...scrollRevealOption,
    delay: 1500,
});
ScrollReveal().reveal(".download__btn", {
    ...scrollRevealOption,
    delay: 2000,
});

