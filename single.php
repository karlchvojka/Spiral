<?php
$post = $wp_query->post;

if ( in_category( 'planningstage' ) ) {
  include( TEMPLATEPATH.'/single-inquiry.php' );
}
else if (in_category('inquiryrounds')) {
  include( TEMPLATEPATH.'/single-rounds.php' );
}
?>
