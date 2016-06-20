<?php 

function deliver_mail() {
	$headers = 'From: My Name <myname@example.com>' . "\r\n";
 $sent_message = wp_mail( 'tolakdot@gmail.com', 'The subject', 'The message', $headers ); 
}


if ( $sent_message ) {
    // The message was sent.
    echo 'The test message was sent. Check your email inbox.';
} else {
    // The message was not sent.
    echo 'The message was not sent!';
}