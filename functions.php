<?php
//* Start the engine
include_once( get_template_directory() . '/lib/init.php' );

//* Child theme (do not remove)
define( 'CHILD_THEME_NAME', 'Dodder' );
define( 'CHILD_THEME_URL', 'http://tolkadot.com/' );
define( 'CHILD_THEME_VERSION', '1.0' );

//* Enqueue scripts and styles
add_action( 'wp_enqueue_scripts', 'mobile_first_scripts_styles' );
function mobile_first_scripts_styles() {

	wp_enqueue_script( 'mobile-first-responsive-menu', get_bloginfo( 'stylesheet_directory' ) . '/js/responsive-menu.js', array( 'jquery' ), '1.0.0' );
	wp_enqueue_script( 'mobile-first-sticky-message', get_bloginfo( 'stylesheet_directory' ) . '/js/sticky-message.js', array( 'jquery' ), '1.0.0' );

	wp_enqueue_style( 'dashicons' );
	wp_enqueue_style( 'google-fonts', '//fonts.googleapis.com/css?family=Lato:400,400italic,700', array(), CHILD_THEME_VERSION );

}

//* Add HTML5 markup structure
add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption', ) );

//* Add viewport meta tag for mobile browsers
add_theme_support( 'genesis-responsive-viewport' );

//* Add support for custom header
add_theme_support( 'custom-header', array(
	'width'           => 600,
	'height'          => 114,
	'header-selector' => '.site-title a',
	'header-text'     => false,
	'flex-height'     => true,
) );

//* Add support for custom background
add_theme_support( 'custom-background' );

//* Remove header right widget area
unregister_sidebar( 'header-right' );

//* Reposition primary navigation menu
remove_action( 'genesis_after_header', 'genesis_do_nav' );
add_action( 'genesis_header', 'genesis_do_nav', 12 );

//* Remove sidebars
// unregister_sidebar( 'sidebar' );
// unregister_sidebar( 'sidebar-alt' );

// //* Force full-width-content layout setting
// add_filter( 'genesis_site_layout', '__genesis_return_full_width_content' );

// //* Remove site layouts
// genesis_unregister_layout( 'content-sidebar' );
// genesis_unregister_layout( 'sidebar-content' );
// genesis_unregister_layout( 'content-sidebar-sidebar' );
// genesis_unregister_layout( 'sidebar-content-sidebar' );
// genesis_unregister_layout( 'sidebar-sidebar-content' );

//* Hook sticky message before site header
// add_action( 'genesis_before', 'mobile_first_sticky_message' );
// function mobile_first_sticky_message() {

// 	genesis_widget_area( 'sticky-message', array(
// 		'before' => '<div class="sticky-message">',
// 		'after'  => '</div>',
// 	) );

// }



//* Modify size of the Gravatar in the author box
add_filter( 'genesis_author_box_gravatar_size', 'mobile_first_author_box_gravatar' );
function mobile_first_author_box_gravatar( $size ) {

	return 160;

}

//* Modify size of the Gravatar in the entry comments
add_filter( 'genesis_comment_list_args', 'mobile_first_comments_gravatar' );
function mobile_first_comments_gravatar( $args ) {

	$args['avatar_size'] = 100;
	return $args;

}

//* Add support for 3-column footer widgets
add_theme_support( 'genesis-footer-widgets', 3 );

//* Register widget areas
genesis_register_sidebar( array(
	'id'          => 'sticky-message',
	'name'        => __( 'Sticky Message', 'bg-mobile-first' ),
	'description' => __( 'This is the sticky message widget area.', 'bg-mobile-first' ),
) );


/*******************************************************************************/
/*****Remove the credits from the footer @ tolkadot ****************************/
/*******************************************************************************/

remove_action( 'genesis_footer', 'genesis_do_footer' );

function dodder_do_footer() {

	//* Build the text strings. Includes shortcodes
	$backtotop_text = '[footer_backtotop]';
	$creds_text     = sprintf( '[footer_copyright before="%s "] &#x000B7; [footer_childtheme_link before="" after=" %s"] [footer_genesis_link url="http://www.studiopress.com/" before=""] &#x000B7; [footer_wordpress_link] &#x000B7; [footer_loginout]', __( 'Copyright', 'genesis' ), __( 'on', 'genesis' ) );

	//* Filter the text strings
	$backtotop_text = apply_filters( 'genesis_footer_backtotop_text', $backtotop_text );
	$creds_text     = apply_filters( 'genesis_footer_creds_text', $creds_text );

	$backtotop = $backtotop_text ? sprintf( '<div class="gototop"><p>%s</p></div>', $backtotop_text ) : '';
	$creds     = $creds_text ? sprintf( '<div class="creds"><p>%s</p></div>', $creds_text ) : '';

	$output = $backtotop . $creds;

	//* Only use credits if HTML5
	if ( genesis_html5() )
		$output = '<p> tolkadot webdesign </p>';

	echo apply_filters( 'genesis_footer_output', $output, $backtotop_text, $creds_text );

}
add_action( 'genesis_footer', 'dodder_do_footer' );

/**
 * Use h1 for site title
 *
 */
function SiteTitleToH1( $wrap ) {
	return 'h1';
}
add_filter( 'genesis_site_title_wrap', 'SiteTitleToH1' );



/**
 * Add Buttons to all pages except the front page
 *
 */
function addButtonsToOtherPages() {

  if ( !is_front_page() ) {
  
  	?>
 <div class="buttonDiv">
 	<button class="actionButtonRegularPage"> <a href='https://janine-live-tolkadot.c9users.io/make-an-appointment/'>Make an Appointment</a></button>
 </div>

  <div class="buttonDiv">
 	<button class="actionButtonRegularPage"> <a href='https://janine-live-tolkadot.c9users.io/book-a-training-session/'>Book a Training Session</button>
 </div>
<?php	
}
}
add_filter( 'genesis_after_header', 'addButtonsToOtherPages' );




// Add google fonts 
add_action( 'wp_enqueue_scripts', 'addGoogleFonts' );
function addGoogleFonts() {

	wp_enqueue_style( 'minimum-google-fonts', '//fonts.googleapis.com/css?family=Raleway:400,700', array(), CHILD_THEME_VERSION );
}


?>



