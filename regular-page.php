<?php /* Template Name: Regular Page Template */ 


// Force full width 
add_filter( 'genesis_pre_get_option_site_layout', '__genesis_return_full_width_content' ); 
// Remove Page Title 
// remove_action( 'genesis_entry_header', 'genesis_do_post_title'                 );
// remove_action( 'genesis_entry_header', 'genesis_entry_header_markup_open',  5  );
// remove_action( 'genesis_entry_header', 'genesis_entry_header_markup_close', 15 );
// remove_action( 'genesis_header', 'genesis_do_header' );

/*****************Adding a custom class to the front-page body for styling******************/

add_filter( 'body_class', 'dodder_body_class' );
function dodder_body_class( $classes ) {
	
	$classes[] = 'regularPageBody';
	return $classes;
	

    
}

function dodder_add_class( $attr, $class ) {
    $attr['class'] .= ' ' . sanitize_html_class( $class );
    return $attr;
}

add_filter( 'genesis_attr_site-inner', 'dodder_site_inner_class' );
function dodder_site_inner_class( $attr ) {
    return dodder_add_class( $attr, 'regularPageSiteInnerClass' );
}


if ( is_page( 'janine-mccarthy' ) ) :
 ?> <div class="placedImage"> <img src =https://janine-live-tolkadot.c9users.io/wp-content/uploads/2013/06/P1030911.jpg> </div>
<?php endif;

genesis();



?>

