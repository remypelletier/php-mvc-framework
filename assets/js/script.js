document.addEventListener("DOMContentLoaded", function() {

    /* menu */
    document.querySelector('.header .header__menu-icon').addEventListener('click', (e) => {
        document.querySelector('.header .navicon').classList.toggle('navicon__active');
        document.querySelector('.header .header__menu').classList.toggle('header__active');
    })

});