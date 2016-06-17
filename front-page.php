<?php /* Template Name: Front Page Template */ 


// Force full width 
add_filter( 'genesis_pre_get_option_site_layout', '__genesis_return_full_width_content' ); 
// Remove Page Title 
remove_action( 'genesis_entry_header', 'genesis_do_post_title'                 );
remove_action( 'genesis_entry_header', 'genesis_entry_header_markup_open',  5  );
remove_action( 'genesis_entry_header', 'genesis_entry_header_markup_close', 15 );
remove_action( 'genesis_header', 'genesis_do_header' );

/*****************Adding a custom class to the front-page body for styling******************/

add_filter( 'body_class', 'dodder_body_class' );
function dodder_body_class( $classes ) {
	
	$classes[] = 'frontPageBody';
	return $classes;
	
}


remove_action( 'genesis_after_header', 'genesis_do_subnav' );
add_action( 'genesis_header', 'dodder_do_subnav' );
/**
 * Echo the "Secondary Navigation" menu.
 *
 * Applies the `genesis_secondary_nav` and legacy `genesis_do_subnav` filters.
 *
 * @since 1.0.0
 *
 * @uses genesis_nav_menu() Display a navigation menu.
 * @uses genesis_nav_menu_supported() Checks for support of specific nav menu.
 */
function dodder_do_subnav() {

	//* Do nothing if menu not supported
	if ( ! genesis_nav_menu_supported( 'secondary' ) )
		return;

	$class = 'menu genesis-nav-menu menu-secondary dodderFrontPageSubNav';
	if ( genesis_superfish_enabled() ) {
		$class .= ' js-superfish';
	}

	genesis_nav_menu( array(
		'theme_location' => 'secondary',
		'menu_class'     => $class,
	) );

}


/**
 * Add a DIV to the front page for the Heading
 *
 */

function frontPageHeading() {
?>
 
    <div class="frontPageHeading">
       <h1>ortho-bionomy melbourne</h1>
       <h3>// the path to pain relief //</h3>
       
    </div>
    <div class="buttonArea"> <div class="colFull">
 <div class="buttonDivFrontPage">
 	<a href='https://janine-live-tolkadot.c9users.io/make-an-appointment/'class=" button actionButton"> Make an Appointment</a>
 
 </div></div>
<div class="colFull">	
  <div class="buttonDivFrontPage">

 	 <a href='https://janine-live-tolkadot.c9users.io/book-a-training-session/' class=" button actionButton">Book a Training Session</a>
 </div>
		</div>	
	</div>
</div>
<?php
}
add_action( 'genesis_after_header', 'frontPageHeading' );


/* add a class to the secondary navigation for styling on the front page only */

add_filter( 'genesis_attr_nav-secondary', 'dodder_secondary_nav_class' );
function dodder_secondary_nav_class( $attr ) {
    return dodder_add_class( $attr, 'frontPageSecondaryNavClass' );
}




genesis();



?>