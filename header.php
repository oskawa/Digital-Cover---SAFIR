<?php // Opening PHP tag - nothing should be before this, not even whitespace

/**
 * Templates header
 *
 * see https://developer.wordpress.org/reference/functions/language_attributes/
 * see https://developer.wordpress.org/reference/functions/bloginfo/
 * see https://developer.wordpress.org/reference/functions/wp_head/
 * see https://developer.wordpress.org/reference/functions/body_class/
 * see https://developer.wordpress.org/reference/functions/wp_body_open/
 * see https://developer.wordpress.org/reference/functions/has_custom_logo/
 * see https://developer.wordpress.org/reference/functions/the_custom_logo/
 * see https://developer.wordpress.org/reference/functions/get_bloginfo/
 * see https://developer.wordpress.org/reference/functions/is_front_page/
 * see https://developer.wordpress.org/reference/functions/is_paged/
 * see https://developer.wordpress.org/reference/functions/is_home/
 * see https://developer.wordpress.org/reference/functions/esc_url/
 * see https://developer.wordpress.org/reference/functions/home_url/
 * see https://developer.wordpress.org/reference/functions/is_active_sidebar/
 * see https://developer.wordpress.org/reference/functions/dynamic_sidebar/
 * see https://developer.wordpress.org/reference/functions/current_user_can/
 * see https://developer.wordpress.org/reference/functions/admin_url/
 * see https://developer.wordpress.org/reference/functions/_e/
 * see https://developer.wordpress.org/reference/functions/wp_nav_menu/
 * see https://developer.wordpress.org/reference/functions/apply_filters/
 */

// If this file is called directly, abort.
if (!defined('ABSPATH')) {
    die;
}

?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <?php wp_head(); ?>
</head>

<?php
$logo = get_field('logo', 'options');
?>

<body <?php body_class(); ?>>
    <?php wp_body_open(); ?>
    <header id="site-header" class="site-header" role="contentinfo">
        <div class="site-header__container container-fluid">
            <div class="site-branding row">
                <div class="col-6">
                    <a href="<?php echo get_home_url(); ?>">

                        <?php

                        if ($logo['mime_type'] === "image/svg+xml") {
                            echo file_get_contents($logo['url']);
                        } else { ?>
                            <img src="<?php echo $logo['url']; ?>" alt="<?php echo $logo['alt']; ?>">
                        <?php
                        }
                        ?>

                    </a>
                </div>
                <div class="col-6 site-branding__menu">
                    <button class="site-header__menu-toggle hamburger hamburger--<?php echo get_theme_mod('hamburger_animation', 'collapse'); ?>" type="button" aria-label="<?php esc_html__('Menu', 'zafir') ?>" aria-controls="navigation"><span class="hamburger-box"><span class="hamburger-inner"></span></span></button>
                </div>
            </div>
        </div>
    </header><!-- #header -->
    <div class="header-menu__fixed">
        <?php


        wp_nav_menu(apply_filters('zafir_header_menu', array(
            'theme_location'  => 'header',
            'container'       => 'nav',
            'container_id'    => 'main-menu-wrapper',
            'container_class' => 'site-header__main-menu-wrapper',
            'menu_id'         => 'site-main-menu',
            'menu_class'      => 'site-header__main-menu',
            'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
            // Un seul niveau de sous menus dans l'entête...
            'depth'           => 2,
            'fallback_cb'     => false,
        )));
        ?>
    </div>