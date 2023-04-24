/**
 * Ensemble des scripts Javascript utilisés par le site
 * 
 * @package WordPress
 * @subpackage theme-parent
 **/

/** Definition d'une console minimum pour éviter des erreurs Javascript **/
window.console || (console = { log: function () { }, warn: function () { }, error: function () { } });



window.addEventListener("DOMContentLoaded", (event) => {
    console.log("DOM fully loaded and parsed");

    const testimonyButtons = document.querySelectorAll('.testimony-list button');

    testimonyButtons.forEach(button => {
        button.addEventListener('click', () => {

            // Bouton de sélection à gauche
            const testimonyListButtons = document.querySelectorAll('.testimony-list button');
            testimonyListButtons.forEach(btn => btn.classList.remove('active'));

            // Image associée
            const testimonyContentImages = document.querySelectorAll('.testimony-content img');
            testimonyContentImages.forEach(img => img.classList.remove('active'));

            // Contenu intégrale
            const allTestimonyInner = document.querySelectorAll('.testimony-inner');
            allTestimonyInner.forEach(testimony => testimony.classList.remove('active'));

            // Afficher contenu correspondant au bouton cliqué
            const selectedTestimony = button.dataset.testimony;
            const testimonyInner = document.querySelector(`.testimony-inner[data-single="${selectedTestimony}"]`);
            const testimonyContentImage = document.querySelector(`.testimony-content img[data-single="${selectedTestimony}"]`);

            button.classList.add('active');
            testimonyInner.classList.add('active');
            testimonyContentImage.classList.add('active');
        });
    });

    // $('.site-header__menu-toggle').on('click', function () {
    //     if ($('.header-menu__fixed').hasClass('active')) {
    //         $(this).removeClass('is-active')
    //         $('.header-menu__fixed').removeClass('active')
    //         $('ul#site-main-menu li').removeClass('active')
    //         $('body').removeClass('menu-active')
    //     } else {
    //         $(this).addClass('is-active')
    //         $('body').addClass('menu-active')
    //         $('.header-menu__fixed').addClass('active')
    //         let delay = 0
    //         console.log($('#site-main-menu li'))
    //         $('#site-main-menu li').each(function () {
    //             setTimeout(() => {
    //                 $(this).addClass('active')
    //             }, delay += 200);
    //         })


    //     }
    // })


    // Selecteurs du menu

    const menuToggle = document.querySelector('.site-header__menu-toggle');
    const headerMenuFixed = document.querySelector('.header-menu__fixed');
    const siteMainMenu = document.querySelectorAll('ul#site-main-menu li');

    menuToggle.addEventListener('click', () => {

        // On refait le même principe qu'avec JQUERY : 
        //  Si la classe est visible, on la retire. Et inversement
        if (headerMenuFixed.classList.contains('active')) {
            menuToggle.classList.remove('is-active');
            headerMenuFixed.classList.remove('active');
            siteMainMenu.forEach(li => li.classList.remove('active'));
            document.body.classList.remove('menu-active');
        } else {
            menuToggle.classList.add('is-active');
            document.body.classList.add('menu-active');
            headerMenuFixed.classList.add('active');
            let delay = 0;
            siteMainMenu.forEach(li => {
                setTimeout(() => {
                    li.classList.add('active');
                }, delay += 200);
            });
        }
    });

});