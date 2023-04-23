<?php /* force UTF-8 : éàè */
/**
 * Support pour des fichiers externes propres au thème enfant.
 **/

/**
 * Determines, whether the specific theme feature is actually supported.
 * 
 * @link https://developer.wordpress.org/reference/hooks/current_theme_supports-feature/
 * @link https://joshuadnelson.com/creating-custom-theme-feature-support/
 * @link https://github.com/zamoose/themehookalliance/blob/master/tha-theme-hooks.php
 * 
 * @param bool  $supports  true
 * @param array $args      The hook type being checked
 * @param array $feature   All registered hook types
 * 
 * @return bool
 */
add_filter( 'current_theme_supports-theme-external-files', 'zafir_theme_external_files' );
if( ! function_exists( 'zafir_theme_external_files' ) ) {
    function zafir_theme_external_files( $supports ) {
        if ( $supports ) {
            return true;
        }
        else {
            return false;
        }
    }
}

