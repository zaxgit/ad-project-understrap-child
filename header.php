<?php
/**
 * The header for our theme
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package UnderStrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="stylesheet" href="https://use.typekit.net/sod2hli.css">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?> <?php understrap_body_attributes(); ?>>
<?php do_action( 'wp_body_open' ); ?>
<div class="site" id="page">

	<!-- ******************* The Navbar Area ******************* -->
    <div id="navbar-wrapper">

    <a class="skip-link sr-only sr-only-focusable" href="#content"><?php esc_html_e( 'Skip to content', 'understrap' ); ?></a>

    <nav id="main-nav" class="navbar navbar-dark"  aria-labelledby="main-nav-label">

    <h2 id="main-nav-label" class="sr-only">
        <?php esc_html_e( 'Main Navigation', 'understrap' ); ?>
    </h2>

<?php if ( 'container' === $container ) : ?>
    <div class="container">
<?php endif; ?>
        <!-- Your site title as branding in the menu -->
    <h1 class="navbar-brand mb-0"><a id="navbrand" rel="home" href="<?php echo esc_url( home_url( '/' ) ); ?>" itemprop="url"><?php bloginfo( 'name' ); ?></a></h1>
        <!-- end custom logo -->
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-nav-dropdown" aria-controls="navbar-nav-dropdown" aria-expanded="false" aria-label="<?php esc_attr_e( 'Toggle navigation', 'understrap' ); ?>">
    <span id="lottie"></span>
    </button>

    <!-- The WordPress Menu goes here -->
    <?php
    wp_nav_menu(
        array(
            'theme_location'  => 'primary',
            'container_class' => 'navbar-collapse collapse',
            'container_id'    => 'navbar-nav-dropdown',
            'menu_class'      => 'navbar-nav ml-auto',
            'fallback_cb'     => '',
            'menu_id'         => 'main-menu',
            'depth'           => 2,
            'walker'          => new Understrap_WP_Bootstrap_Navwalker(),
        )
    );
    ?>
<?php if ( 'container' === $container ) : ?>
</div><!-- .container -->
<?php endif; ?>

</nav><!-- .site-navigation -->

</div><!-- #wrapper-navbar end -->
