
<?php 
    get_header();
?>

<div class="hero navbar-offset">
  <svg  class="circle" xmlns="http://www.w3.org/2000/svg" width="678" height="678" viewBox="0 0 678 678">
    <circle id="Ellipse_20" data-name="Ellipse 20" cx="339" cy="339" r="339" fill="#FF7F00"/>
  </svg>
  <div class="splide">
    <div class="splide__arrows">
      <button class="splide__arrow splide__arrow--prev">PREV</button>
      <button class="splide__arrow splide__arrow--next">NEXT</button>
    </div>
    <?php
    wp_nav_menu(
        array(
            'theme_location'  => 'primary',
            'container_class' => 'splide__track',
            'container_id'    => '',
            'menu_class'      => 'splide__list',
            'fallback_cb'     => '',
            'menu_id'         => 'nav',
            'depth'           => 0,
            'walker'          => new Understrap_WP_Bootstrap_Navwalker(),
        )
    );
    ?>
  </div>
</div>


<?php 
  get_footer();
?>