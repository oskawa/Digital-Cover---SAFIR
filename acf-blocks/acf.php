<?php // Opening PHP tag - nothing should be before this, not even whitespace

// If this file is called directly, abort.
if (!defined('ABSPATH')) {
    die;
}

function theme_un_allowed_block_types_all($allowed_blocks, $context)
{
    $blocksList = file_get_contents(get_stylesheet_directory() . '/acf-blocks/blocks.json');
    $blocksList = json_decode($blocksList, true);

    

    switch ($context) {
            // widgets
        case (!$context->post):
            $blocks = array(
                'core/paragraph',
                //'acf/header-contact',
                //'acf/header-panier',
            );
            break;
            // posts, pages et CPT
        default:
            $blocks = array(
                'core/image',
                'core/paragraph',
                'core/heading',
                'core/list',
                'core/spacer',
                'core/columns',
               
                    );
            foreach ($blocksList as $block) {
                array_push($blocks, 'acf/'.str_replace('_','-',$block['name']));
            }
    }

    //print_r($context);
    //die();

    return $blocks;
}
add_filter('allowed_block_types_all', 'theme_un_allowed_block_types_all', 10, 2);


// Catégorie de blocs : theme_un dans laquelle sont rangés tous les blocs acf spécifiques
function theme_un_acf_categories($block_categories, $editor_context)
{

    if (!empty($editor_context->post)) {
        array_push(
            $block_categories,
            array(
                'slug'  => 'theme_un',
                'title' => 'SAFIR',
                'icon'  => 'marker',
            )
        );
    }
    return $block_categories;
}
// see https://developer.wordpress.org/block-editor/reference-guides/filters/block-filters/#managing-block-categories
add_filter('block_categories_all', 'theme_un_acf_categories', 9, 2);

function theme_un_acf_blocks_init()
{
    if (function_exists('acf_register_block_type')) {

        // Lire le contenu du fichier blocks.json - Ce fichier est créé par l'application Maion et contient les informations principales sur les blocs qui seront disponibles sur le site
        // Le décoder avec json_decode pour en tirer un tableau
        $blocksList = file_get_contents(get_stylesheet_directory() . '/acf-blocks/blocks.json');
        $blocksList = json_decode($blocksList, true);

        

        // Boucler dessus et exectuer la fonction acf_register_block_type
        foreach ($blocksList as $block) {


            $image = $block['render_template'];
            $image = str_replace('.php', '.png', $image);          
           

            acf_register_block_type(array(
                'name'              => $block['name'],
                'title'             => __($block['title'], 'theme_un'),
                'description'       => __($block['description'], 'theme_un'),
                'render_template'   => get_stylesheet_directory() . "/acf-blocks/" . $block['render_template'],
                'category'          => 'theme_un',
                'icon'              => $block['icon'],
                'keywords'          => $block['keywords'],
                'mode'              => 'edit',
                'example'         => array(
                    'attributes' => array(
                        'mode' => 'preview', // Important!
                        'data' => array(
                            'preview_image_help' => $image,
                        ),
                    ),
                ),
            ));
        }
    }
}
add_action('acf/init', 'theme_un_acf_blocks_init');

