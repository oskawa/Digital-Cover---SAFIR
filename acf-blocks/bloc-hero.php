<?php

/**
 * Hero Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during backend preview render.
 * @param   int $post_id The post ID the block is rendering content against.
 *          This is either the post ID currently being displayed inside a query loop,
 *          or the post ID of the post hosting this block.
 * @param   array $context The context provided to the block by the post or it's parent block.
 */

// Support custom "anchor" values.
$anchor = '';
if (!empty($block['anchor'])) {
    $anchor = 'id="' . esc_attr($block['anchor']) . '" ';
}

// Create class attribute allowing for custom "className" and "align" values.
$class_name = 'hero-block';
if (!empty($block['className'])) {
    $class_name .= ' ' . $block['className'];
}
if (!empty($block['align'])) {
    $class_name .= ' align' . $block['align'];
}

// Load values and assign defaults.
$background_image = get_field('background_image');

$text_color = get_field('text_color') ?: '#FFFFF';
$background_color = get_field('background_color') ?: 'black';
$title = get_field('title');
$subtitle = get_field('subtitle');
$align = get_field('align') ?: 'center';





// Build a valid style attribute for background and text colors.
$styles = array('text-align:' . $align, 'background-color:'.$background_color,  'background-image:url(' . $background_image['url'] . ')', 'color: ' . $text_color);
$style  = implode('; ', $styles);


?>
<?php
if ($is_preview  && !empty($block['data']['preview_image_help'])) {

    echo '<img src="' . get_template_directory_uri() . '/acf-blocks/thumbnails/' . $block['data']['preview_image_help'] . '" style="display: block; margin: 0 auto; width:100%;object-fit:contain;">';
    return;
}  
?>


<section class="hero" style="<?php echo esc_attr($style); ?>">
    <div class="container-fluid">
        <div class="row hero-row">
            <div class="col-12 col-lg-6">
                <?php if ($title) : ?>
                    <h1 class="hero-title"><?php echo $title; ?></h1>
                <?php endif; ?>
                <?php if ($subtitle) : ?>
                    <h2 class="hero-subtitle"><?php echo $subtitle; ?></h2>
                <?php endif; ?>
               
            </div>
        </div>
    </div>
</section>