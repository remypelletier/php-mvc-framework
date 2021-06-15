document.addEventListener("DOMContentLoaded", function() {

    /* menu */
    if (document.querySelector('.header__menu-icon')) {
        document.querySelector('.header .header__menu-icon').addEventListener('click', (e) => {
            document.querySelector('.header .navicon').classList.toggle('navicon__active');
            document.querySelector('.header .header__menu').classList.toggle('header__active');
        })
    }

});