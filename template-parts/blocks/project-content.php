<?php

/**
 * Project Content.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'project-content-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'project-content';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}

// Load values and assign defaults.
$roles = get_field('roles');
$content = get_field('content');
$contentTwo = get_field('content-two');
$btn = get_field('btn');
$link = get_field('link');
?>

            <div id="<?php echo esc_attr($id); ?>" class=" <?php echo esc_attr($className); ?> page-header-content">
                <p><?php echo $roles ?></p>
                <p><?php echo $content ?></p>

                <?php if ($contentTwo): ?>
                <p><?php echo $contentTwo ?></p>
                <?php else: ?>

                <?php endif; ?>

            </div>
            <?php if ($btn): ?>
                <div class="btn mb" style="background-color:<?php the_field('color'); ?>"><a href="<?php echo $link?>"><?php echo $btn ?></a></div>
            <?php else: ?>
                
            <?php endif; ?>
