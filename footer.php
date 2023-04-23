<?php // Opening PHP tag - nothing should be before this, not even whitespace

/**
 * Templates footer
 *
 * see https://developer.wordpress.org/reference/functions/is_active_sidebar/
 * see https://developer.wordpress.org/reference/functions/dynamic_sidebar/
 * see https://developer.wordpress.org/reference/functions/current_user_can/
 * see https://developer.wordpress.org/reference/functions/admin_url/
 * see https://developer.wordpress.org/reference/functions/_e/
 * see https://developer.wordpress.org/reference/functions/wp_nav_menu/
 * see https://developer.wordpress.org/reference/functions/apply_filters/
 * see https://developer.wordpress.org/reference/functions/wp_footer/
 */

// If this file is called directly, abort.
if (!defined('ABSPATH')) {
    die;
}

?>
<?php
$logo = get_field('logo', 'options');
$alternative_word = get_field('alternative_word', 'options');
?>


<footer id="site-footer" class="site-footer," role="contentinfo">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 pre-footer">
                <a href="<?php echo get_home_url(); ?>">

                    <?php

                    if ($logo['mime_type'] === "image/svg+xml") {
                        echo file_get_contents($logo['url']);
                    } else { ?>
                        <img src="<?php echo $logo['url']; ?>" alt="<?php echo $logo['alt']; ?>">
                    <?php
                    }
                    ?>

                    <?php if ($alternative_word) : ?>
                        <h4>
                            <?php echo $alternative_word; ?>
                        </h4>
                    <?php endif; ?>

                </a>

            </div>
            <div class="col-12 site-footer__menu">
                <span>
                    Copyright <?php echo get_the_date('Y'); ?>
                </span>
                <?php
                wp_nav_menu(apply_filters('zafir_footer_menu', array(
                    'theme_location'  => 'footer',
                    'container'       => 'nav',
                    'container_id'    => 'footer-menu-wrapper',
                    'container_class' => 'site-footer__menu-wrapper',
                    'menu_id'         => 'site-footer-menu',
                    'menu_class'      => 'site-footer__menu',
                    'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                    // Pas de sous menus dans le pied de page...
                    'depth'           => 1,
                    'fallback_cb'     => false,
                )));
                ?>

            </div>
        </div>
    </div>

</footer><!-- #footer -->

<?php wp_footer(); ?>
</body>

</html>