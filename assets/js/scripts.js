/**
 * Ensemble des scripts Javascript utilisés par le site
 * 
 * @package WordPress
 * @subpackage theme-parent
 **/

/** Definition d'une console minimum pour éviter des erreurs Javascript **/
window.console || (console = { log: function () { }, warn: function () { }, error: function () { } });

/** *************************************************************************************** **/


// Incorporez ici les plugins jQuery dont vous avez besoin


/** *************************************************************************************** **/

(function ($) {
    'use strict';

    /** C'est parti ! **/
    $(function () {
        // Mise en cache de variables utiles :
        var $w = $(window), $d = $(document), $html = $('html'), $body = $('body');

        // Executez vos scripts Javascript ici...


        $('.testimony-list button').on('click', function () {
            $('.testimony-list button').removeClass('active')
            $('.testimony-content img').removeClass('active')

            $(this).addClass('active')
            $('.testimony-inner').removeClass('active')
            $('.testimony-content img[data-single="' + $(this).attr('data-testimony') + '"]').addClass('active')
            $('.testimony-inner[data-single="' + $(this).attr('data-testimony') + '"]').addClass('active')

        })

        $('.site-header__menu-toggle').on('click', function () {
            if ($('.header-menu__fixed').hasClass('active')){
                $(this).removeClass('is-active')
                $('.header-menu__fixed').removeClass('active')
                $('ul#site-main-menu li').removeClass('active')
                $('body').removeClass('menu-active')
            }else {
                $(this).addClass('is-active')
                $('body').addClass('menu-active')
                $('.header-menu__fixed').addClass('active')
                let delay = 0
                console.log($('#site-main-menu li'))
                $('#site-main-menu li').each(function(){
                    setTimeout(() => {
                        $(this).addClass('active')                                                
                    }, delay+=200);
                })
               

            }
        })


    });
}(jQuery));
