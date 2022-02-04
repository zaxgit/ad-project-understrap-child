<?php
/**
* Template Name: Basic Structure
*
* @package WordPress
* @subpackage Amber Derousse
* @since Version 1.0
*/
?>

<?php get_header();?>
<?php get_template_part("section", "header");?>
<div class="section-container">
    <div class="basic-structure-row">
    <?php the_content()?>
</div>
</div>


<?php get_template_part("section", "footer"); ?>
<?php get_footer();?>