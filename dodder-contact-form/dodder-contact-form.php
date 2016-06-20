<?php
/*
Plugin Name: My Plugin Name
Plugin URI: http://www.tolakdot.com
Description:  WordPress Plugin
Version: 1.0
Author: Dee Bryant
Author URI: http://www.tolakdot.com
*/
    //
    // the plugin code will go here..
    //


function dodder_form() {
	
	$foo = esc_url( $_SERVER['REQUEST_URI'] );
echo $foo;

echo ' <br><form action=' . esc_url( $_SERVER['REQUEST_URI'] ) . ' method="post">
  First name:<br>
  <input type="text" name="firstname" value=""><br>
  Last name:<br>
  <input type="text" name="lastname" value=""><br><br>
  <input type="submit" name="dodder_submit" value="Submit">
</form> ';
}

function deliver_mail() {
	$headers = 'From: My Name <myname@example.com>' . "\r\n";
 wp_mail( 'tolakdot@gmail.com', 'The subject', 'The message', $headers ); 
}

// 	// if the submit button is clicked, send the email
// 	if ( isset( $_POST['dodder_submit'] ) ) {

// 		// sanitize form values
// 		$firstname    = sanitize_text_field( $_POST["firstname"] );
// 		// get the blog administrator's email address
		
// 		$to = 'tolkadot@gmail.com';
// 		$subject = 'The subject';
// 		$headers = "From: $firstname " . "\r\n";
//         wp_mail( $to, $subject, $firstname, $headers );
// 		// If email has been process for sending, display a success message
// 		if ( wp_mail( $to, $subject, $firstname, $headers ) ) {
// 			echo '<div>';
// 			echo '<p>Thanks for contacting me, expect a response soon.</p>';
// 			echo '</div>';
// 		} else {
// 			echo 'An unexpected error occurred';
// 		}
// 	}

// }

function cf_shortcode() {
	ob_start();
	dodder_form();
	deliver_mail();
	

	return ob_get_clean();
}

add_shortcode( 'dodder_contact_form', 'cf_shortcode' );

?>