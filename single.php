<?php 



/* Add a class to the blog page body */
add_filter( 'body_class', 'dodder_body_class' );
function dodder_body_class( $classes ) {
	
	$classes[] = 'blogPageBody';
	return $classes;
}

// /* Add a class to the blog page site inner body */
// /*this is a function to add classes */
// function dodder_add_class( $attr, $class ) {
//     $attr['class'] .= ' ' . sanitize_html_class( $class );
//     return $attr;
// }

add_filter( 'genesis_attr_site-inner', 'dodder_site_inner_class' );
function dodder_site_inner_class( $attr ) {
    return dodder_add_class( $attr, 'blogPageSiteInnerClass' );
}

/* add a sidebar to the blog */
add_filter( 'genesis_pre_get_option_site_layout', 'dodder_sidebar_blog' );

function dodder_sidebar_blog ( $opt ) {
if ( is_home() ) {
$opt = 'content-sidebar';
return $opt;
}
}

/* add a class to the content area */
add_filter( 'genesis_attr_content', 'dodder_content_class' );
function dodder_content_class( $attr ) {
    return dodder_add_class( $attr, 'blogContentClass' );
}
/* add a class to the content-sidebar wrap area */
add_filter( 'genesis_attr_content-sidebar-wrap', 'dodder_content_sidebar_wrap' );
function dodder_content_sidebar_wrap( $attr ) {
    return dodder_add_class( $attr, 'blogContentSidebarWrapClass' );
}
add_filter( 'genesis_attr_nav-secondary', 'dodder_secondary_nav_class' );
function dodder_secondary_nav_class( $attr ) {
    return dodder_add_class( $attr, 'regularPageSecondaryNavClass' );
}

genesis();



?>