<?php // Opening PHP tag - nothing should be before this, not even whitespace

// If this file is called directly, abort.
if (!defined('ABSPATH')) {
    die;
}

function theme_enqueue_styles()
{
    wp_enqueue_style('bootstrap', 'https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.1/css/bootstrap-grid.min.css');
    wp_enqueue_style('hamburger', 'https://cdnjs.cloudflare.com/ajax/libs/hamburgers/1.2.1/hamburgers.min.css');
    wp_enqueue_style('slickCarousel', 'https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css');
    wp_enqueue_script('slickCarousel', 'https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js', '', null, true);
    // wp_enqueue_style('lightGallery', 'https://cdnjs.cloudflare.com/ajax/libs/lightgallery/2.5.0-beta.3/css/lightgallery-bundle.min.css');
    // wp_enqueue_script('lightGallery', 'https://cdnjs.cloudflare.com/ajax/libs/lightgallery/2.5.0-beta.3/lightgallery.umd.min.js', '', null, true);
    wp_enqueue_style('front',  get_stylesheet_directory_uri() . '/assets/css/common.css');
    wp_enqueue_style('front-responsive',  get_stylesheet_directory_uri() . '/assets/css/responsive.css');
    wp_enqueue_script(
        'theme-script',
        get_stylesheet_directory_uri() . '/assets/js/scripts.js',
        array('jquery'),
        '1.0',
        'true',
    );
}
// @see https://developer.wordpress.org/reference/hooks/wp_enqueue_scripts/
add_action('wp_enqueue_scripts', 'theme_enqueue_styles');


function theme_image_setup()
{
    add_theme_support('post-thumbnails', array('post'));


    // Ajout d'autres tailles si besoin
    add_image_size('petite-vignette-carre', 140, 140, true);
    add_image_size('moyenne-vignette-carre', 350, 350, true);
    add_image_size('grande-vignette-carre', 670, 670, true);
    add_image_size('petite-vignette-rectangle', 180, 120, true);
    add_image_size('moyenne-vignette-rectangle', 675, 420, true);
    add_image_size('img-max', 1200, 1200, true);
    add_theme_support('yoast-seo-breadcrumbs');


       /**
     * Editor styles.
     *
     * @see https://developer.wordpress.org/block-editor/how-to-guides/themes/theme-support/#editor-styles
     */
    add_theme_support('editor-styles');
    add_editor_style(get_stylesheet_directory_uri() . '/assets/css/common.css');
   
}

add_action('after_setup_theme', 'theme_image_setup');


function admin_css()
{
    $admin_handle = 'admin_css';
    $admin_stylesheet = get_stylesheet_directory_uri() . '/assets/css/common.css';

    wp_enqueue_style($admin_handle, $admin_stylesheet);
}
add_action('admin_print_styles', 'admin_css', 11);

/**
 * Theme setup.
 *
 * @see https://developer.wordpress.org/reference/functions/add_action/
 *
 * @return void
 */
function zafir_theme_setup()
{
    /**
     * Setup zafir Theme's textdomain.
     *
     * @see https://developer.wordpress.org/reference/functions/load_theme_textdomain/
     * @see https://developer.wordpress.org/reference/functions/get_template_directory/
     *
     * Declare textdomain for this child theme.
     * Translations can be filed in the /languages/ directory.
     */
    load_theme_textdomain('zafir', get_template_directory() . '/languages');

    /**
     * Utilisation de code HTML5 valide.
     *
     * @see https://developer.wordpress.org/reference/functions/add_theme_support/#html5
     * @see https://developer.wordpress.org/reference/functions/apply_filters/
     */
    add_theme_support('html5', apply_filters('zafir_html5_support_args', array(
        'search-form',
        'comment-list',
        'comment-form',
        'gallery',
        'caption',
        'script',
        'style',
    )));

    /**
     * Title tag theme support
     *
     * @see https://developer.wordpress.org/reference/functions/add_theme_support/
     * @see https://codex.wordpress.org/Title_Tag
     */
    add_theme_support('title-tag');

    



    register_nav_menus(array(
        'header' => __('Header menu', 'zafir'),
        'footer' => __('Footer menu', 'zafir'),
    ));
}
// see https://developer.wordpress.org/reference/hooks/after_setup_theme/
add_action('after_setup_theme', 'zafir_theme_setup');


/**
 * Render the site description for the selective refresh partial.
 *
 * @see zafir_customizer_settings()
 * @see https://developer.wordpress.org/reference/functions/bloginfo/
 *
 * @return void
 */
function zafir_customize_partial_blogdescription()
{
    bloginfo('description');
}

/**
 * Register our sidebars and widgetized areas.
 *
 * @see https://developer.wordpress.org/reference/functions/register_sidebar/
 *
 * @return void
 */

// see https://developer.wordpress.org/reference/hooks/widgets_init/





/**
 * Ajoute les information WAI ARIA aux menu de l'entête (header) et du pied de page (footer).
 *
 * @link http://www.lesintegristes.net/2008/12/09/introduction-a-wai-aria-traduction/
 * @see https://developer.wordpress.org/reference/functions/__/
 * @see https://developer.wordpress.org/reference/functions/apply_filters/
 * @see https://developer.wordpress.org/reference/functions/add_filter/
 *
 * @param string $nav_menu Le contenu HTML du menu de navigation.
 * @param object $args Arguments de {@see wp_nav_menu()}.
 * @return string $nav_menu Contenu HTML du menu mis à jour.
 **/
function zafir_wp_nav_menu($nav_menu, $args)
{
    $nav_menu = preg_replace('/<nav/', '<nav role="navigation"', $nav_menu);
    if ('header' === $args->theme_location) {
        $nav_menu = preg_replace('/<nav/', '<nav aria-label="' . __('Primary navigation', 'zafir') . '"', $nav_menu);
    } elseif ('footer' === $args->theme_location) {
        $nav_menu = preg_replace('/<nav/', '<nav aria-label="' . __('Secondary navigation', 'zafir') . '"', $nav_menu);
    }

    /**
     * Filtre appliqué au contenu HTML des menus de navigation.
     *
     * @param string $nav_menu Le contenu HTML du menu de navigation.
     * @param object $args Arguments de {@see wp_nav_menu()}.
     **/
    $nav_menu = apply_filters('zafir_wp_nav_menu', $nav_menu, $args);

    return $nav_menu;
}
// @see https://developer.wordpress.org/reference/hooks/wp_nav_menu/
add_filter('wp_nav_menu', 'zafir_wp_nav_menu', 10, 2);

/**
 * Pluggable function : display a comment (see in comments.php template file)
 *
 * @see https://developer.wordpress.org/reference/functions/comment_class/
 * @see https://developer.wordpress.org/reference/functions/comment_ID/
 * @see https://developer.wordpress.org/reference/functions/_e/
 * @see https://developer.wordpress.org/reference/functions/comment_author_link/
 * @see https://developer.wordpress.org/reference/functions/edit_comment_link/
 * @see https://developer.wordpress.org/reference/functions/get_avatar/
 * @see https://developer.wordpress.org/reference/functions/get_comment_author_link/
 * @see https://developer.wordpress.org/reference/functions/esc_url/
 * @see https://developer.wordpress.org/reference/functions/get_comment_link/
 * @see https://developer.wordpress.org/reference/functions/get_comment_time/
 * @see https://developer.wordpress.org/reference/functions/get_comment_date/
 * @see https://developer.wordpress.org/reference/functions/comment_text/
 * @see https://developer.wordpress.org/reference/functions/comment_reply_link/
 *
 * @param [object] $comment
 * @param [array] $args
 * @param [int] $depth
 * @return void
 */


/**
 * Ajouter des classes au body.
 *
 * @see https://developer.wordpress.org/reference/functions/get_theme_mod/
 * @see https://developer.wordpress.org/reference/functions/apply_filters/
 * @see https://developer.wordpress.org/reference/functions/add_filter/
 *
 * @param   array  $classes  Les classes qui apparaissent dans la balise body.
 * @return  array  $classes
 */
function zafir_body_classes($classes)
{
    global $post;

    $classes[] = 'start-zafir-classes';



    // Ajoute une classe en fonction de shortcodes présent dans la page
    if (is_a($post, 'WP_Post') && has_shortcode($post->post_content, 'contact-form-7')) {
        $classes[] = 'has-contact-form';
    }

    $classes[] = 'end-zafir-classes';

    /**
     * Filtre appliqué à la liste des classes appliquées au tag body.
     *
     * @param array $classes Liste des classes appliquées au tag body.
     **/
    $classes = apply_filters('zafir_body_classes', $classes);

    return $classes;
}
// @see https://developer.wordpress.org/reference/hooks/body_class/
add_filter('body_class', 'zafir_body_classes');


/**
 * Ajoute le logo à la page de login.
 * A REVOIR
 *
 * @return void
 */
function zafir_login_style()
{
    if (get_theme_mod('custom_logo')) {
?><?php
        // TO DO
    }
}
// @see https://developer.wordpress.org/reference/hooks/login_enqueue_scripts/
add_action('login_enqueue_scripts', 'zafir_login_style');

/**
 * Ajoute une page d'option paramétrable avec ACF
 */
if (function_exists('acf_add_options_page')) {
    acf_add_options_page();
}





function safir_gutemberg_css()
{
    add_theme_support('editor-styles'); // if you don't add this line, your stylesheet won't be added
    add_editor_style('https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css');
}
add_action('after_setup_theme', 'safir_gutemberg_css');


/**
 * Include theme functionalities
 */
require('acf-blocks/acf.php');
include_once('includes/optimisation.php');
include_once('includes/dynamic-external-css.php');
include_once('includes/dynamic-theme-json.php');
include_once('includes/google-fonts.php');
include_once('features/theme-external-files.php');
