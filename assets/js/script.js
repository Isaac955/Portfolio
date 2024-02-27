/*!
=========================================================
* Copyright: 2024 Isaac Serhane
* Coded by Isaac
=========================================================
*/


$(document).ready(function(){
    $(".navbar .nav-link").on('click', function(event) {
        if (this.hash !== "") {
            event.preventDefault();
            var hash = this.hash;
            var navbarHeight = $('.custom-navbar').outerHeight(); // hauteur de la barre de navigation
            var scrollToPosition = $(hash).offset().top - navbarHeight; // décalage avec la hauteur de la barre de navigation
            $('html, body').animate({
                scrollTop: scrollToPosition
            }, 700, function(){
                window.location.hash = hash;
            });
        } 
    });
});


// navbar toggle
$('#nav-toggle').click(function(){
    $(this).toggleClass('is-active')
    $('ul.nav').toggleClass('show');
});


