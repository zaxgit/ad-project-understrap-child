<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

function understrap_remove_scripts() {
    wp_dequeue_style( 'understrap-styles' );
    wp_deregister_style( 'understrap-styles' );

    wp_dequeue_script( 'understrap-scripts' );
    wp_deregister_script( 'understrap-scripts' );

    // Removes the parent themes stylesheet and scripts from inc/enqueue.php
}
add_action( 'wp_enqueue_scripts', 'understrap_remove_scripts', 20 );

function theme_enqueue_styles() {

	// Get the theme data
	$the_theme = wp_get_theme();
    wp_enqueue_style( 'child-understrap-styles', get_stylesheet_directory_uri() . '/css/child-theme.min.css', array(), $the_theme->get( 'Version' ) );
    wp_enqueue_style( 'style_style', get_stylesheet_directory_uri() . '/style.css', array(), $the_theme->get( 'Version' ) );
    wp_enqueue_script( 'jquery');
    wp_enqueue_style('fat-frank','https://use.typekit.net/ddi4nrj.css', array(), '2.4.21' );
    wp_enqueue_script('custom_js', get_stylesheet_directory_uri() . '/src/js/custom-javascript.js', array(), $the_theme->get( 'Version' ) , true );
    wp_enqueue_script('GSAP3', 'https://cdnjs.cloudflare.com/ajax/libs/gsap/3.6.1/gsap.min.js', array(), '1.0', true );
    wp_enqueue_script('CSSRulePlugin', 'https://cdnjs.cloudflare.com/ajax/libs/gsap/3.7.1/CSSRulePlugin.min.js', array(), '1.0', true );
    wp_enqueue_script('lottieLight', 'https://cdnjs.cloudflare.com/ajax/libs/lottie-web/5.7.13/lottie.min.js', array(), '1.0', true );
    wp_enqueue_script( 'child-understrap-scripts', get_stylesheet_directory_uri() . '/js/child-theme.min.js', array(), $the_theme->get( 'Version' ), true );
    wp_enqueue_style('splidetheme','https://cdn.jsdelivr.net/npm/@splidejs/splide@3.3.1/dist/css/splide-core.min.css', array(), '3.3.1', false );
    wp_enqueue_script( 'splide', 'https://cdn.jsdelivr.net/npm/@splidejs/splide@3.3.1/dist/js/splide.js', array(), '3.3.1', true );
    wp_enqueue_script( 'main', get_stylesheet_directory_uri() . '/js/main.js', array(), $the_theme->get( 'Version' ), true );
    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }
}

add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );
add_action('wp_enqueue_styles', 'theme_enqueue_styles');

function add_child_theme_textdomain() {
    load_child_theme_textdomain( 'understrap-child', get_stylesheet_directory() . '/languages' );
}
add_action( 'after_setup_theme', 'add_child_theme_textdomain' );

add_action('acf/init', 'my_acf_init_block_types');
function my_acf_init_block_types() {

    // Check function exists.
    if( function_exists('acf_register_block_type') ) {

        // register a testimonial block.
        acf_register_block_type(array(
            'name'              => 'design-card',
            'title'             => __('Design Card'),
            'description'       => __('A card block for to showcase designs and link to project pages. Includes an image, an h3 and some text. '),
            'render_template'   => 'template-parts/blocks/design-card.php',
            'category'          => 'formatting',
            'icon'              => 'admin-comments',
            'keywords'          => array( 'text', 'h3', 'image', 'design', 'card', 'custom'),
        ));
        acf_register_block_type(array(
            'name'              => 'project-content',
            'title'             => __('Project Content'),
            'description'       => __('Roles had in project along with a paragrapgh about the project optional second paragraph.'),
            'render_template'   => 'template-parts/blocks/project-content.php',
            'category'          => 'formatting',
            'icon'              => 'admin-comments',
            'keywords'          => array( 'text', 'content', 'roles', 'p', 'paragraph', 'custom' ),
        ));
        acf_register_block_type(array(
            'name'              => 'full-block',
            'title'             => __('Full Block'),
            'description'       => __('A block for large width Image/Video'),
            'render_template'   => 'template-parts/blocks/full-block.php',
            'category'          => 'formatting',
            'icon'              => 'admin-comments',
            'keywords'          => array('image','video', 'large', 'full', 'custom'),
        ));
        acf_register_block_type(array(
            'name'              => 'half-block',
            'title'             => __('Half Block'),
            'description'       => __('A block for 2 side by side Image/Video eqaul to the full-block'),
            'render_template'   => 'template-parts/blocks/half-block.php',
            'category'          => 'formatting',
            'icon'              => 'admin-comments',
            'keywords'          => array('image','video', 'side-by-side', 'half', 'custom'),
        ));
    }
}


