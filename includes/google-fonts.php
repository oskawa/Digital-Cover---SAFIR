<?php
/**
 * Google fonts
 **/

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
    die;
}

// Returns the google fonts url based on customizer choices
function zafir_get_google_fonts_url() {

    $fonts = array();
    // Primary font
    if ( $font = get_theme_mod( 'primary_font' ) ){
        // L'italic
        $has_ital = get_theme_mod( 'primary_font_style_weight' );
        if ( is_array( $has_ital ) && $has_ital[0] === '' ) {
            $has_ital = '';
        }
        $only_regular_ital = $has_ital && sizeof( $has_ital ) === 1 && in_array( '400', $has_ital );

        // Les graisses normales
        $has_wght = get_theme_mod( 'primary_font_weight' );
        if ( is_array( $has_wght ) && $has_wght[0] === '' ) {
            //$has_wght = array( '400' );
            $has_wght = '';
        }
        $only_regular_wght = $has_wght && sizeof( $has_wght ) === 1 && in_array( '400', $has_wght );

        // Si on demande une police
        if ( $has_ital || $has_wght ) {
            $family = 'family=' . $font;
            // On ne demande pas uniquement la police en regular
            if ( ! ( $only_regular_wght && ! $has_ital ) ) {
                // Que regular italic
                if ( $only_regular_ital && ! $has_wght ) {
                    $family .= ':ital@1';
                }
                // Que regular italic & regular
                elseif ( $only_regular_ital && $only_regular_wght ) {
                    $family .= ':ital@0;1';
                }
                // Dans les autres cas
                else {
                    // Que des graisses mais pas d'italic
                    if ( $has_wght && ! $has_ital ){
                        $family .= ':wght@' . implode( ';', $has_wght );
                    }
                    // Que de l'italic
                    elseif ( ! $has_wght && $has_ital ){
                        $family .= ':ital,wght@1,' . implode( ';1,', $has_ital );
                    }
                    // Un mélange des 2
                    else {
                        $family .= ':ital,wght@';
                        // On traite les graisses
                        $family .= '0,' . implode( ';0,', $has_wght );
                        // puis l'italic
                        $family .= ';1,' . implode( ';1,', $has_ital );
                    }
                }
            }
            $fonts[] = $family;
        }
    }
    // Secondary font
    if ( $font = get_theme_mod( 'secondary_font' ) ){
        // L'italic
        $has_ital = get_theme_mod( 'secondary_font_style_weight' );
        if ( is_array( $has_ital ) && $has_ital[0] === '' ) {
            $has_ital = '';
        }
        $only_regular_ital = $has_ital && sizeof( $has_ital ) === 1 && in_array( '400', $has_ital );

        // Les graisses normales
        $has_wght = get_theme_mod( 'secondary_font_weight' );
        if ( is_array( $has_wght ) && $has_wght[0] === '' ) {
            //$has_wght = array( '400' );
            $has_wght = '';
        }
        $only_regular_wght = $has_wght && sizeof( $has_wght ) === 1 && in_array( '400', $has_wght );

        // Si on demande une police
        if ( $has_ital || $has_wght ) {
            $family = 'family=' . $font;
            // On ne demande pas uniquement la police en regular
            if ( ! ( $only_regular_wght && ! $has_ital ) ) {
                // Que regular italic
                if ( $only_regular_ital && ! $has_wght ) {
                    $family .= ':ital@1';
                }
                // Que regular italic & regular
                elseif ( $only_regular_ital && $only_regular_wght ) {
                    $family .= ':ital@0;1';
                }
                // Dans les autres cas
                else {
                    // Que des graisses mais pas d'italic
                    if ( $has_wght && ! $has_ital ){
                        $family .= ':wght@' . implode( ';', $has_wght );
                    }
                    // Que de l'italic
                    elseif ( ! $has_wght && $has_ital ){
                        $family .= ':ital,wght@1,' . implode( ';1,', $has_ital );
                    }
                    // Un mélange des 2
                    else {
                        $family .= ':ital,wght@';
                        // On traite les graisses
                        $family .= '0,' . implode( ';0,', $has_wght );
                        // puis l'italic
                        $family .= ';1,' . implode( ';1,', $has_ital );
                    }
                }
            }
            $fonts[] = $family;
        }
    }
    // Tertiary font
    if ( $font = get_theme_mod( 'tertiary_font' ) ){
        // L'italic
        $has_ital = get_theme_mod( 'tertiary_font_style_weight' );
        if ( is_array( $has_ital ) && $has_ital[0] === '' ) {
            $has_ital = '';
        }
        $only_regular_ital = $has_ital && sizeof( $has_ital ) === 1 && in_array( '400', $has_ital );

        // Les graisses normales
        $has_wght = get_theme_mod( 'tertiary_font_weight' );
        if ( is_array( $has_wght ) && $has_wght[0] === '' ) {
            //$has_wght = array( '400' );
            $has_wght = '';
        }
        $only_regular_wght = $has_wght && sizeof( $has_wght ) === 1 && in_array( '400', $has_wght );

        // Si on demande une police
        if ( $has_ital || $has_wght ) {
            $family = 'family=' . $font;
            // On ne demande pas uniquement la police en regular
            if ( ! ( $only_regular_wght && ! $has_ital ) ) {
                // Que regular italic
                if ( $only_regular_ital && ! $has_wght ) {
                    $family .= ':ital@1';
                }
                // Que regular italic & regular
                elseif ( $only_regular_ital && $only_regular_wght ) {
                    $family .= ':ital@0;1';
                }
                // Dans les autres cas
                else {
                    // Que des graisses mais pas d'italic
                    if ( $has_wght && ! $has_ital ){
                        $family .= ':wght@' . implode( ';', $has_wght );
                    }
                    // Que de l'italic
                    elseif ( ! $has_wght && $has_ital ){
                        $family .= ':ital,wght@1,' . implode( ';1,', $has_ital );
                    }
                    // Un mélange des 2
                    else {
                        $family .= ':ital,wght@';
                        // On traite les graisses
                        $family .= '0,' . implode( ';0,', $has_wght );
                        // puis l'italic
                        $family .= ';1,' . implode( ';1,', $has_ital );
                    }
                }
            }
            $fonts[] = $family;
        }
    }

    if ( ! empty( $fonts ) ) {
        $return = 'https://fonts.googleapis.com/css2?'.implode('&',$fonts).'&subset=latin-ext&display=swap';
    }
    else {
        $return = false;
    }

    return $return;
}

// Are there google fonts in use ?
function zafir_has_google_fonts() {
    return get_theme_mod( 'primary_font' ) || get_theme_mod( 'secondary_font' ) || get_theme_mod( 'tertiary_font' );
}


