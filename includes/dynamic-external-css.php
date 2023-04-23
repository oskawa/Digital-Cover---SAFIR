<?php
/**
 * Génération d'un fichier css externe dynamique
 *
 * Permet d'ajouter des css générées dynamiquement dans un fichier externe plutôt qu'en ligne.
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
    die;
}

/**
 * Create a dynamic external css file
 *
 * This external js file may be used to include any dynamicaly generated css snippets
 * instead of including them inline
 *
 * @since   1.0
 *
 * @return  void
 */
function dynamic_external_css() {
    global $wp_query;
    if ( ! empty( $wp_query->query_vars['dynamic_external_css'] ) ) {
        header( 'Content-Type: text/css;charset=UTF-8' );
        ?>/** Fichier css dynamique **/

<?php
        /**
         * Use this hook to insert css at the very top of this style sheet
         */
        do_action( 'dynamic_external_css_snippet_before_styles' );

        $primary_font = 'Arial,Helvetica Neue,Helvetica,sans-serif';
        if( get_theme_mod( 'primary_font' ) ){
            $primary_font = '"' . get_theme_mod( 'primary_font' ) . '"';
        }
        elseif( get_theme_mod( 'primary_custom_font_name' ) && get_theme_mod( 'primary_custom_font_css' ) ){
            $primary_font = '"' . get_theme_mod( 'primary_custom_font_name' ) . '"';
            echo get_theme_mod( 'primary_custom_font_css' ) . PHP_EOL;
        }
        $secondary_font = 'Arial,Helvetica Neue,Helvetica,sans-serif';
        if( get_theme_mod( 'secondary_font' ) ){
            $secondary_font = '"' . get_theme_mod( 'secondary_font' ) . '"';
        }
        elseif( get_theme_mod( 'secondary_custom_font_name' ) && get_theme_mod( 'secondary_custom_font_css' ) ){
            $secondary_font = '"' . get_theme_mod( 'secondary_custom_font_name' ) . '"';
            echo get_theme_mod( 'secondary_custom_font_css' ) . PHP_EOL;
        }
        $tertiary_font = 'Arial,Helvetica Neue,Helvetica,sans-serif';
        if( get_theme_mod( 'tertiary_font' ) ){
            $tertiary_font = '"' . get_theme_mod( 'tertiary_font' ) . '"';
        }
        elseif( get_theme_mod( 'tertiary_custom_font_name' ) && get_theme_mod( 'tertiary_custom_font_css' ) ){
            $tertiary_font = '"' . get_theme_mod( 'tertiary_custom_font_name' ) . '"';
            echo get_theme_mod( 'tertiary_custom_font_css' ) . PHP_EOL;
        }
        $quaternary_font = 'Arial,Helvetica Neue,Helvetica,sans-serif';
        if( get_theme_mod( 'quaternary_custom_font_name' ) && get_theme_mod( 'quaternary_custom_font_css' ) ){
            $quaternary_font = '"' . get_theme_mod( 'quaternary_custom_font_name' ) . '"';
            echo get_theme_mod( 'quaternary_custom_font_css' ) . PHP_EOL;
        }
        $quinary_font = 'Arial,Helvetica Neue,Helvetica,sans-serif';
        if( get_theme_mod( 'quinary_custom_font_name' ) && get_theme_mod( 'quinary_custom_font_css' ) ){
            $quinary_font = '"' . get_theme_mod( 'quinary_custom_font_name' ) . '"';
            echo get_theme_mod( 'quinary_custom_font_css' ) . PHP_EOL;
        }

?>

:root {
    font-size: 10px;
<?php
    if( 'boxed' === get_theme_mod( 'layout_type') || 'fluid' === get_theme_mod( 'layout_type') ){
?>
    /* Layout */
    --tw-max-width: <?php echo get_theme_mod( 'layout_max_width', '800' );?><?php echo get_theme_mod( 'layout_max_width_unit', 'px' );?>;
    --tw-side-padding: <?php echo get_theme_mod( 'layout_side_padding', '20' );?><?php echo get_theme_mod( 'layout_side_padding_unit', 'px' );?>;

<?php
    }
?>
    /* Colors */
    --tw-primary-color: <?php echo get_theme_mod( 'primary_color', '#000' ); ?>;
    --tw-secondary-color: <?php echo get_theme_mod( 'secondary_color', '#000' ); ?>;
    --tw-tertiary-color: <?php echo get_theme_mod( 'tertiary_color', '#000' ); ?>;
    --tw-body-background: #<?php echo get_theme_mod( 'background_color', 'fff' ); ?>;
    --tw-body-color: <?php echo get_theme_mod( 'font_color', '#000' ); ?>;
    --tw-link-color: <?php echo get_theme_mod( 'link_color', '#1a0dab' ); ?>;
    --tw-alink-color: <?php echo get_theme_mod( 'alink_color', '#f00' ); ?>;
    --tw-vlink-color: <?php echo get_theme_mod( 'vlink_color', '#800080' ); ?>;
    --tw-hlink-color: <?php echo get_theme_mod( 'hlink_color', '#800080' ); ?>;

    /* Fonts */
    --tw-primary-font: <?php echo $primary_font ?>;
    --tw-secondary-font: <?php echo $secondary_font ?>;
    --tw-tertiary-font: <?php echo $tertiary_font ?>;
    --tw-quaternary-font: <?php echo $quaternary_font ?>;
    --tw-quinary-font: <?php echo $quinary_font ?>;
}

<?php
        if ( 'boxed' === get_theme_mod( 'layout_type' ) ) {
?>@media screen and (max-width: <?php echo get_theme_mod( 'layout_max_width', '800' ) ?>) {
    :root {
        /* Layout */
        --tw-max-width: 100%;
    }
}

<?php
        } // endif

        /**
         * Use this hook to insert css between variables déclarations and media queries
         */
        do_action( 'dynamic_external_css_snippet' );

        if ( $layout_breakpoint_xl = get_theme_mod( 'layout_breakpoint_xl', 1200 ) ) {
            ?>/* Extra large screens breakpoint */
@media screen and (max-width: <?php echo $layout_breakpoint_xl ?>px) {<?php
            /**
             * Use this hook to insert css in medium screens media query
             */
            do_action( 'dynamic_external_css_snippet_breakpoint_xl' ); 
?>
}

<?php
        } // endif

        if ( $layout_breakpoint_lg = get_theme_mod( 'layout_breakpoint_lg', 992 ) ) {
            ?>/* Large screens breakpoint */
@media screen and (max-width: <?php echo $layout_breakpoint_lg ?>px) {<?php
            /**
             * Use this hook to insert css in medium screens media query
             */
            do_action( 'dynamic_external_css_snippet_breakpoint_md' ); 
?>
}

<?php
        } // endif

        if ( $layout_breakpoint_md = get_theme_mod( 'layout_breakpoint_md', 768 ) ) {
            ?>/* Medium screens breakpoint */
@media screen and (max-width: <?php echo $layout_breakpoint_md ?>px) {<?php
            /**
             * Use this hook to insert css in medium screens media query
             */
            do_action( 'dynamic_external_css_snippet_breakpoint_md' ); 
?>
}

<?php
        } // endif
                                                                        
        if ( $layout_breakpoint_sm = get_theme_mod( 'layout_breakpoint_sm', 576 ) ) {
            ?>/* Small screens breakpoint */
@media screen and (max-width: <?php echo $layout_breakpoint_sm ?>px) {<?php
            /**
             * Use this hook to insert css in small screens media query
             */
            do_action( 'dynamic_external_css_snippet_breakpoint_sm' );
?>
}

<?php
        } // endif

        ?>/* Very small screens breakpoint */
@media screen and (max-width: <?php echo $layout_breakpoint_sm - 1 ?>px) {<?php
            /**
             * Use this hook to insert css in small screens media query
             */
            do_action( 'dynamic_external_css_snippet_breakpoint_xs' );
?>
}

<?php
        /**
         * Use this hook to insert css at the end of style sheet
         */
        do_action( 'dynamic_external_css_snippet_last_styles' );

        exit;
    } // endif

    return;
}

/**
 * Register, enqueue and localize the dynamicly created external css file
 *
 * @since   1.0
 *
 * @return  void
 */
function dynamic_external_css_enqueue() {
    $css_url = get_option( 'permalink_structure' ) ? 'dynamic-css.css' : '?dynamic_external_css=1';

    wp_register_style(
        'dynamic-external-css',
        '/' . $css_url
    );
    wp_enqueue_style( 'dynamic-external-css' );
}

/**
 * Filters the query variables whitelist before processing.
 *
 * Allow custom rewrite rules to allow access to external css file.
 *
 * @since   1.0
 *
 * @param   array  $vars  Registered query vars
 * @return  array  $vars
 */
function dynamic_external_css_query_vars( $vars ) {
    $vars[] = 'dynamic_external_css';
    return $vars;
}

/**
 * Filters the canonical redirect URL for external css file.
 *
 * @since   1.0
 *
 * @param   string  $redirect_url   The redirect URL
 * @param   string  $requested_url  The requested URL
 * @return  mixed
 */
function dynamic_external_css_canonical( $redirect_url, $requested_url ) {
    if ( strpos( $requested_url,'dynamic-css.css' ) ){
        return false;
    }
    else {
        return $redirect_url;
    }
}

/**
 * Create rewrite rule for dynamic external css file
 *
 * @since  1.0
 * @return void
 */
add_action( 'init', function( ) {
    global $wp_rewrite;
    add_rewrite_rule( 'dynamic-css\.css$', $wp_rewrite->index . '?dynamic_external_css=1', 'top' );
} );

// Loading dynamic external css file
add_action( 'wp_enqueue_scripts', 'dynamic_external_css_enqueue' );
add_action( 'enqueue_block_editor_assets', 'dynamic_external_css_enqueue');
add_action( 'template_redirect', 'dynamic_external_css' );
add_filter( 'query_vars', 'dynamic_external_css_query_vars' );
add_filter( 'redirect_canonical', 'dynamic_external_css_canonical', 10, 2 );
