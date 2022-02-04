<?php

/**
 * Design Card Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'design-card-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'design-card';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}

// Load values and assign defaults.
$cardImage = get_field('card_image');
$cardText = get_field('card_text');
$projectLink = get_field('project-link');
?>
<div id="<?php echo esc_attr($id); ?>" class=" <?php echo esc_attr($className); ?> card-container">
    <div class="design-card-img">
        <a href="<?php echo $projectLink?>"><?php echo wp_get_attachment_image( $cardImage, 'full' ); ?></a>
    </div>      
    <div class="design-card-text">
        <h3 class=design-card-header>
            <a href="<?php echo $projectLink?>"><?php the_title(); ?></a>
        </h3>
        <p class="design-card-p">
            <?php echo $cardText ?>
        </p>
    </div>
</div>