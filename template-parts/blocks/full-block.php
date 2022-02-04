<?php

/**
 * Full Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'full-block-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'full-block';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}

// Load values and assign defaults.
$fullImage = get_field('full_image');
$fullVid = get_field('full_vid');
?>


<div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?> section-container mt">
    <div class="section-row">
        <div class="full-wrapper">
            <?php echo wp_get_attachment_image( $fullImage, 'full' ); ?>
        </div>     
    </div>
</div>