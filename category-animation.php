<?php get_header();?>

<!-- category page header template part -->
<div class="section-container section-background page-header"> 
    <div class="section-row">
            <h1 class="page-header-title">
                animation
            </h1>
    </div>
</div>
<div class="section-container mt mb">
    <div class="section-row">
            <div class="page-header-content">
                I am deeply in love with motion graphics and creating visuals that convey strong messages. My motion design and animation varies from illustrative videos, character animation, tradeshow videos, promos, and much more.             </div>
            <div class=" btn section-background" style="margin-top: 15px;"><a href="<?php get_site_url()?>/contact">request motion</a></div>
    </div>
</div>

<div class="section-container">
    <div class="mobile-section-full">
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
    </div>
</div>
<?php get_template_part("section", "footer"); ?>
<?php get_footer();?>