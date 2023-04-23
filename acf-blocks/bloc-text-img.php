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
$class_name = 'testimonial-block';
if (!empty($block['className'])) {
    $class_name .= ' ' . $block['className'];
}
if (!empty($block['align'])) {
    $class_name .= ' align' . $block['align'];
}

// Load values and assign defaults.
$background_image = get_field('background_image');

$hero_text = get_field('hero_text');
$link = get_field('link');
$isFullwidth = get_field('isFullwidth');
$text_color = get_field('text_color') ?: '#FFFFF';
$imageHeight = get_field('imageHeight');

$height = "";

if ($imageHeight == "large") {
    $height = '600px';
} else if ($imageHeight == "medium") {
    $height = '300px';
}





?>
<?php
if ($is_preview  && !empty($block['data']['preview_image_help'])) {

    echo '<img src="' . get_template_directory_uri() . '/acf-blocks/thumbnails/' . $block['data']['preview_image_help'] . '" style="display: block; margin: 0 auto; width:100%;object-fit:contain;">';
    return;
}
?>
<section class="text-img">
    <div class="container-fluid text-img__container">
        <?php
        // Check rows existexists.
        if (have_rows('repeater_text_image')) :
        ?>

            <?php
            while (have_rows('repeater_text_image')) : the_row();
                // Load sub field value.
                $image = get_sub_field('image');
                $text_group = get_sub_field('text_group');
                $is_left_image = get_sub_field('is_left_image');
            ?>
                <div class="row text-img__row">
                    <div class="<?php if ($is_left_image) : ?>isImageLeft col-md-6<?php else : ?>isImageRight offset-md-1 col-md-5<?php endif; ?>  col-12">
                        <?php if ($is_left_image) : ?>
                            <?php if ($image) : ?>
                                <img class="text-img__left" src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>">
                            <?php endif; ?>
                        <?php else : ?>
                            <?php if ($text_group) : ?>
                                <?php if ($text_group['title']) : ?>
                                    <h3 class="text-img__title"><?php echo $text_group['title']; ?></h3>
                                <?php endif; ?>
                                <?php if ($text_group['paragraph']) : ?>
                                    <?php echo $text_group['paragraph']; ?>
                                <?php endif; ?>
                                <?php if ($text_group['link']) : ?>



                                    <?php

                                    get_template_part(
                                        'partials/content-link',
                                        null,
                                        array(
                                            'data' => array(
                                                'url' => $text_group['link']['url'],
                                                'title' => $text_group['link']['title'],
                                            )
                                        )
                                    );
                                    ?>
                                <?php endif; ?>


                            <?php endif; ?>

                        <?php endif; ?>
                    </div>
                    <?php if (!$is_left_image) : ?>
                        <div class="col-md-6 col-12">
                            <?php if ($image) : ?>
                                <img class="text-img__right" src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>">
                            <?php endif; ?>
                        </div>
                    <?php else : ?>
                        <div class="col-md-5">

                            <?php if ($text_group) : ?>
                                <?php if ($text_group['title']) : ?>
                                    <h3 class="text-img__title"><?php echo $text_group['title']; ?></h3>
                                <?php endif; ?>
                                <?php if ($text_group['paragraph']) : ?>
                                    <?php echo $text_group['paragraph']; ?>
                                <?php endif; ?>
                                <?php if ($text_group['link']) : ?>
                                    <?php

                                    get_template_part(
                                        'partials/content-link',
                                        null,
                                        array(
                                            'data' => array(
                                                'url' => $text_group['link']['url'],
                                                'title' => $text_group['link']['title'],
                                            )
                                        )
                                    );
                                    ?>
                                <?php endif; ?>
                            <?php endif; ?>
                        </div>

                    <?php endif; ?>

                </div>

            <?php

            endwhile;
            ?>


        <?php
        endif;
        ?>


    </div>
</section>