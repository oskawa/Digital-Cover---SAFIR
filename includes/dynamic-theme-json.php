<?php
/**
 * Génération d'un fichier theme.json
 *
 * Permet d'ajouter des infos générées dynamiquement dans le fichier theme.json.
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
    die;
}

/**
 * Create the theme.json file
 *
 * Used to include any theme.json features
 *
 * @since   1.0
 *
 * @return  void
 */
function dynamic_theme_json() {
    global $wp_query;
    if ( ! empty( $wp_query->query_vars['dynamic_theme_json'] ) ) {
        header( 'Content-Type: application/json;charset=UTF-8' );

        ob_start();
        ?>{
    "version": 1,
    "settings": {
        "color": {
            "link": false,
            "custom": false,
            "customDuotone": false,
            "duotone": [],
            "customGradient": false,
            "gradients": [],
            "defaultPalette": false,
            "palette": [<?php
    $palette = array();
    if ( get_theme_mod( 'primary_color' ) ) {
        $palette[] = '{"name": "' . esc_html__( 'Primary Color','zafir' ) . '", "slug": "' . sanitize_title( esc_html__( 'Primary Color','zafir' ) ) . '", "color": "' . get_theme_mod( 'primary_color' ) . '"}';
    }
    if ( get_theme_mod( 'secondary_color' ) ) {
        $palette[] = '{"name": "' . esc_html__( 'Secondary Color','zafir' ) . '", "slug": "' . sanitize_title( esc_html__( 'Secondary Color','zafir' ) ) . '", "color": "' . get_theme_mod( 'secondary_color' ) . '"}';
    }
    if ( get_theme_mod( 'tertiary_color' ) ) {
        $palette[] = '{"name": "' . esc_html__( 'Tertiary Color','zafir' ) . '", "slug": "' . sanitize_title( esc_html__( 'Tertiary Color','zafir' ) ) . '", "color": "' . get_theme_mod( 'tertiary_color' ) . '"}';
    }
    echo implode( ',', $palette );

            ?>]
        },
        "typography": {
            "//fontSizes": [],
            "customFontSize": true,
            "lineHeight": false,
            "customLineHeight": false,
            "dropCap": false,
            "fontStyle": false,
            "textTransform": true,
            "fontWeight": true,
            "letterSpacing": false,
            "textDecoration": false
        },
        "border": {
            "customColor": false,
            "customRadius": false,
            "customStyle": false,
            "customWidth": false
        },
        "blocks": {
            "core/button": {
                "border": {
                    "customRadius": false
                },
                "width": {
                    "customWidth": false
                },
                "styles": {
                    "customStyles": false
                }
            }
        }
    },
    "styles": {},
    "customTemplates": {},
    "templateParts": {}
}

<?php
        $json = apply_filters( 'dynamic_theme_json', ob_get_contents() );
        ob_end_clean();

        echo $json;

        exit;
    } // endif

    return;
}

/**
 * Filters the query variables whitelist before processing.
 *
 * Allow custom rewrite rules to allow access to theme.json file.
 *
 * @since   1.0
 *
 * @param   array  $vars  Registered query vars
 * @return  array  $vars
 */
function dynamic_theme_json_query_vars( $vars ) {
    $vars[] = 'dynamic_theme_json';
    return $vars;
}

/**
 * Filters the canonical redirect URL for theme.json file.
 *
 * @since   1.0
 *
 * @param   string  $redirect_url   The redirect URL
 * @param   string  $requested_url  The requested URL
 * @return  mixed
 */
function dynamic_theme_json_canonical( $redirect_url, $requested_url ) {
    if ( strpos( $requested_url, 'theme.json' ) ){
        return false;
    }
    else {
        return $redirect_url;
    }
}

/**
 * Create rewrite rule for dynamic theme.json file
 *
 * @since  1.0
 * @return void
 */
add_action( 'init', function( ) {
    global $wp_rewrite;
    add_rewrite_rule( '.*/'.get_option('stylesheet').'/theme\.json$', $wp_rewrite->index . '?dynamic_theme_json=1', 'top' );
} );

// Loading theme.json file
add_action( 'template_redirect', 'dynamic_theme_json' );
add_filter( 'query_vars', 'dynamic_theme_json_query_vars' );
add_filter( 'redirect_canonical', 'dynamic_theme_json_canonical', 10, 2 );

