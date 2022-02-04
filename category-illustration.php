<?php get_header();?>

<!-- category page header template part -->
<div class="section-container section-background page-header"> 
    <div class="section-row">
            <h1 class="page-header-title">
                illustration
            </h1>
    </div>
</div>

<div class="section-container mb mt">
    <div class="section-row">
            <div class="page-header-content">
                I’ve been drawing all my life, and I love everything that’s imaginative and creative. A lot of my illustrative work consist of character illustrations, album art, and personal commissions. 
            </div>
            <div class=" btn section-background" style="margin-top: 15px; "><a href="<?php get_site_url()?>/contact">request commission</a></div>
    </div>
</div>

<?php 

if ( have_posts() ) {
	while ( have_posts() ) {
		the_post(); ?>
    
    <?php the_content();?>
    
<?php
		//
	} // end while
} // end if
?>
<?php get_template_part("section", "footer"); ?>
<?php get_footer();?>