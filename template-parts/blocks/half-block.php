<?php

/**
 * Half Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'half-block-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'half-block';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}

// Load values and assign defaults.
$leftImage = get_field('left_image');
$leftImage2 = get_field('left_image2');
$rightImage = get_field('right_image');
$rightImage2 = get_field('right_image2');
// $leftVid = get_field('left_vid');
// $righVid = get_field('right_vid');
?>
<div id="<?php echo esc_attr($id); ?>" class=" <?php echo esc_attr($className); ?> section-container mt">
    <div class="section-row">
        <div class="section-col">

            <?php if($leftImage2): ?>

            <div class="half-wrapper">
                <div class="stack-image-top">
                <?php echo wp_get_attachment_image( $leftImage, 'full' ); ?>
                </div>
                <div class="stack-image-bottom">
                <?php echo wp_get_attachment_image( $leftImage2, 'full' ); ?>
                </div>
            </div>

            <?php else: ?>

                <div class="half-wrapper">
                <?php echo wp_get_attachment_image( $leftImage, 'full' ); ?>
                </div>

            <?php endif; ?>


            <?php if($rightImage2): ?>

            <div class="half-wrapper ">
                <div class="stack-image-top">
                    <?php echo wp_get_attachment_image( $rightImage, 'full' ); ?>
                </div>
                <div class="stack-image-bottom">
                    <?php echo wp_get_attachment_image( $rightImage2, 'full' ); ?>
                </div>
            </div>

            <?php else: ?>

            <div class="half-wrapper">
                <?php echo wp_get_attachment_image( $rightImage, 'full' ); ?>
            </div>
                
            <?php endif; ?>
            
        </div>
    </div>
</div>