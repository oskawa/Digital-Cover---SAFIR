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

$title = get_field('title');
$showIdentity = get_field('showIdentity');
$identity_element = get_field('identity_element', 'options');






?>
<?php
if ($is_preview  && !empty($block['data']['preview_image_help'])) {

    echo '<img src="' . get_template_directory_uri() . '/acf-blocks/thumbnails/' . $block['data']['preview_image_help'] . '" style="display: block; margin: 0 auto; width:100%;object-fit:contain;">';
    return;
}
?>

<section class="testimony">
    <div class="container-fluid">
        <?php if ($title || $showIdentity) : ?>
            <div class="row testimony-icon">
                <?php if ($showIdentity && $identity_element) : ?>
                    <div class="col-12">
                        <img src="<?php echo $identity_element['url']; ?>" alt="<?php echo $identity_element['alt']; ?>">
                    <?php endif; ?>
                    <?php if ($title) : ?>
                        <h2 class="testimony-title"><?php echo $title; ?></h2>
                    <?php endif; ?>
                    </div>
            </div>
        <?php endif; ?>
        <div class="row testimony-row">
            <div class="offset-lg-1 col-lg-3 col-12">
                <?php
                // Check rows existexists.
                if (have_rows('repeater_testimony')) :
                    $cpt_testimony = 0;
                ?>
                    <ul class="testimony-list">

                        <?php
                        while (have_rows('repeater_testimony')) : the_row();
                            // Load sub field value.
                            $simple_name = get_sub_field('simple_name');
                            $full_name = get_sub_field('full_name');
                        ?>
                            <li >
                                <button <?php if ($cpt_testimony === 0) : ?>class="active" <?php endif; ?>data-testimony="<?php echo $cpt_testimony; ?>">

                                    <?php if ($simple_name) : ?>
                                        <?php echo $simple_name; ?>
                                    <?php else : ?>
                                        <?php echo $full_name; ?>
                                    <?php endif; ?>
                                </button>
                                <div class="arrow-1"></div>
                            </li>
                        <?php
                            $cpt_testimony++;
                        endwhile;
                        ?>

                    </ul>
                <?php
                endif;
                ?>
            </div>
            <div class="col-lg-6 offset-lg-1 col-12">
                <?php
                // Check rows existexists.
                if (have_rows('repeater_testimony')) :
                    $cpt_testimony = 0;
                ?>


                    <div class="testimony-content">
                        <?php
                        while (have_rows('repeater_testimony')) : the_row();
                            // Load sub field value.
                            $full_name = get_sub_field('full_name');
                            $simple_name = get_sub_field('simple_name');
                            $country = get_sub_field('country');
                            $thumbnail = get_sub_field('thumbnail');
                            $satisfaction = get_sub_field('satisfaction');
                            $detailed_testimony = get_sub_field('detailed_testimony');
                        ?>
                            <?php if ($thumbnail) : ?>
                                <img data-single="<?php echo $cpt_testimony; ?>" class="testimony-content__thumbnail <?php if ($cpt_testimony == 0) : ?>active<?php endif; ?>" src="<?php echo $thumbnail['url']; ?>" alt="<?php echo $thumbnail['alt']; ?>">
                            <?php endif; ?>
                            <div data-single="<?php echo $cpt_testimony; ?>" class="testimony-inner <?php if ($cpt_testimony == 0) : ?>active<?php endif; ?>">
                                <?php if ($satisfaction) : ?>
                                    <h3 class="testimony-inner__title"><?php echo $satisfaction; ?></h3>
                                <?php endif; ?>
                                <?php if ($detailed_testimony) : ?>
                                    <?php echo $detailed_testimony; ?>
                                <?php endif; ?>

                                <h5 class="testimony-inner__name">
                                    <?php echo $full_name; ?>
                                </h5>
                                <?php if ($country) : ?>
                                    <h6 class="testimony-inner__country"><?php echo $country; ?></h6>
                                <?php endif; ?>

                            </div>

                        <?php
                            $cpt_testimony++;
                        endwhile;
                        ?>
                    </div>


                <?php
                endif;
                ?>

            </div>
        </div>
    </div>
</section>