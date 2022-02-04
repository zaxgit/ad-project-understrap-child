<?php get_header();?>

<!-- category page header template part -->
<div class="section-container section-background page-header"> 
    <div class="section-row">
            <h1 class="page-header-title">
                DESIGN
            </h1>
    </div>
</div>

<div class="section-container mb mt">
    <div class="section-row">
            <div class="page-header-content">
                As an interactive designer I also dabble in web/mobile design, UX/UI design, branding and everything else in between. I’m a problem solver at heart and I use my design thinking skills to create visual strong messages for any type of brand. I also try to incorporate micro animations through out my designs.            </div>
            <div class="btn section-background" style="margin-top: 15px;"><a href="<?php get_site_url()?>/contact">request design</a></div>
    </div>
</div>


    <div class="section-container">
        <div class="section-row card-layout">
<?php 

if ( have_posts() ) {
	while ( have_posts() ) {
		the_post(); ?>
        
<div class="card-col">
        <?php the_content();?>
</div>
<?php
		//
	} // end while
} // end if
?>
        </div>
    </div>
<?php get_template_part("section", "footer"); ?>
<?php get_footer();?>