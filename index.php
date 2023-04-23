<?php // Opening PHP tag - nothing should be before this, not even whitespace

// If this file is called directly, abort.
if ( ! defined( 'ABSPATH' ) ) {
    die;
}

/**
 * Default pages template
 *
 * see https://developer.wordpress.org/reference/functions/get_header/
 * see https://developer.wordpress.org/reference/functions/_e/
 * see https://developer.wordpress.org/reference/functions/get_sidebar/
 * see https://developer.wordpress.org/reference/functions/get_footer/
 */

get_header(); ?>

<main id="site-main-content" class="site-main-content" role="main" aria-label="<?php _e( 'Main page content', 'targetweb' ); ?>">
    


   <?php the_content(); ?>
</main><!-- #main-content -->



<?php get_footer(); ?>
