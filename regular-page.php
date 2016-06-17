<?php /* Template Name: Regular Page Template */ 


// Force full width 
add_filter( 'genesis_pre_get_option_site_layout', '__genesis_return_full_width_content' ); 
// Remove Page Title 
// remove_action( 'genesis_entry_header', 'genesis_do_post_title'                 );
// remove_action( 'genesis_entry_header', 'genesis_entry_header_markup_open',  5  );
// remove_action( 'genesis_entry_header', 'genesis_entry_header_markup_close', 15 );
// remove_action( 'genesis_header', 'genesis_do_header' );

/*****************Adding a custom class to the front-page body for styling******************/

// add_filter( 'body_class', 'dodder_body_class' );
// function dodder_body_class( $classes ) {
	
// 	$classes[] = 'regularPageBody';
// 	return $classes;
// }



add_filter( 'genesis_attr_site-inner', 'dodder_site_inner_class' );
function dodder_site_inner_class( $attr ) {
    return dodder_add_class( $attr, 'regularPageSiteInnerClass' );
}

add_filter ( 'body_class', 'dodder_regular_page_body_class');
function dodder_regular_page_body_class( $attr ) {
return dodder_add_class( $attr, 'regularPageBody' );
}

add_filter( 'genesis_attr_nav-secondary', 'dodder_secondary_nav_class' );
function dodder_secondary_nav_class( $attr ) {
    return dodder_add_class( $attr, 'regularPageSecondaryNavClass' );
}


if ( is_page( 'janine-mccarthy' ) ) :
 ?> <div class="placedImage"> <img src =https://janine-live-tolkadot.c9users.io/wp-content/uploads/2013/06/P1030911.jpg> </div>
 <?php
elseif ( is_page( 'testimonials' ) ) :
 ?> <div class="placedImage"> <img src =https://janine-live-tolkadot.c9users.io/wp-content/uploads/2016/06/Janine1Comp.jpg> </div>
 <?php
elseif  ( is_page( 'about' ) ) :
 ?> <div class="placedImage"> <img src =https://janine-live-tolkadot.c9users.io/wp-content/uploads/2016/06/Janine2Comp.jpg> </div>
<?php
elseif  ( is_page( 'do-terra' ) ) :
 ?> <div class="placedImage"> <img src =https://janine-live-tolkadot.c9users.io/wp-content/uploads/2016/06/Janine3.jpg> </div>
 
<?php endif;

genesis();



?>

