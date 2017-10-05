<?php
$post = $wp_query->post;

if ( in_category( 'planningstage' ) ) {
  include( TEMPLATEPATH.'/single-inquiry.php' );
} elseif (in_category('inquiryrounds')) {
  include( TEMPLATEPATH.'/single-rounds.php' );
} elseif (in_category('logentries')) {
  include( TEMPLATEPATH.'/single-logentries.php');
}
?>
