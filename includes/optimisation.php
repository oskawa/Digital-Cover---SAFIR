<?php
/**
 * Divers optimisations
 **/

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
    die;
}

// Suppression des emoji
remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
remove_action( 'wp_print_styles', 'print_emoji_styles' );
remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
remove_action( 'admin_print_styles', 'print_emoji_styles' );

// Suppression de oEmbed
// @see https://kinsta.com/knowledgebase/disable-embeds-wordpress/
function zafir_disable_embed() {
    wp_dequeue_script( 'wp-embed' );
}
add_action( 'wp_footer', 'zafir_disable_embed' );

// Désactivation des pingbacks
function zafir_disable_pingback( &$links ) {
  foreach ( $links as $l => $link )
      if ( 0 === strpos( $link, get_option( 'home' ) ) )
          unset( $links[$l] );
}
add_action( 'pre_ping', 'zafir_disable_pingback' );

// Suppression des dashicons
function zafir_dequeue_dashicon() {
    if ( current_user_can( 'update_core' ) )
        return;

    wp_deregister_style( 'dashicons' );
}
add_action( 'wp_enqueue_scripts', 'zafir_dequeue_dashicon' );

// Supprime les tags p autour des images
function zafir_filter_ptags_on_images( $content ) {
    return preg_replace( '/<p>\s*(<a .*>)?\s*(<img .* \/>)\s*(<\/a>)?\s*<\/p>/iU', '\1\2\3', $content );
}
add_filter( 'the_content', 'zafir_filter_ptags_on_images' );

// Qualité de jpg par défaut
add_filter( 'jpeg_quality', function ( $arg ) {
    return 80;
});

function wpc_mime_types($mimes)
{
    $mimes['svg'] = 'image/svg+xml';
    $mimes['svgz'] = 'image/svg+xml';
    return $mimes;
}
add_filter('upload_mimes', 'wpc_mime_types', 99);

function tw_svgs_upload_check($checked, $file, $filename, $mimes)
{

    if (!$checked['type']) {

        $check_filetype        = wp_check_filetype($filename, $mimes);
        $ext                = $check_filetype['ext'];
        $type                = $check_filetype['type'];
        $proper_filename    = $filename;

        if ($type && 0 === strpos($type, 'image/') && $ext !== 'svg') {
            $ext = $type = false;
        }

        $checked = compact('ext', 'type', 'proper_filename');
    }

    return $checked;
}
add_filter('wp_check_filetype_and_ext', 'tw_svgs_upload_check', 10, 4);

/**
 * Remove customizer options.
 *
 * @since 1.0.0
 * @param object $wp_customize
 */
function ja_remove_customizer_options( $wp_customize ) {
    $wp_customize->remove_section( 'static_front_page' );
    $wp_customize->remove_section( 'title_tagline'     );
    $wp_customize->remove_section( 'nav'               );
    $wp_customize->remove_section( 'themes'              );
 }
 add_action( 'customize_register', 'ja_remove_customizer_options', 30 );