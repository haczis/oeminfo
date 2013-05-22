<?php 

/* sets predefined Post Thumbnail dimensions */
if ( function_exists( 'add_theme_support' ) ) {
	add_theme_support( 'post-thumbnails' );
		
	//featured image size
	add_image_size( 'featured-thumb', 943, 345, true );
	add_image_size( 'featured-small', 48, 48, true );
		
	add_image_size( 'entry-thumb', 184, 184, true );
	
};
/* --------------------------------------------- */

?>