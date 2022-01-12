<?php
/* Adds page name to classes for page */
add_filter('body_class','page_class');
function page_class($classes) {
   global $wp_query;
   $page = '';
   $page = $wp_query->query_vars['pagename'];
   // add 'pagename' to the $classes array
   $classes[] = $page;
   // return the $classes array
   return $classes;
}
/* grant_super_admin(14); */
// Add Toolbar Menus
function custom_toolbar($admin_bar) {
	$args = array(
		'id'     => 'IT4Causes-sandbox',
		'title'  => 'You are on IT4Causes PRODUCTION'
	);
	$admin_bar->add_node( $args );
}
add_action( 'admin_bar_menu', 'custom_toolbar', 999 );

// customize admin bar css
function override_admin_bar_css() { 
   if ( is_admin_bar_showing() ) {
	  ?>
      <style type="text/css">
         #wp-admin-bar-IT4Causes-sandbox .ab-item.ab-empty-item {
			 font-weight: 800;
			 background: red;
		 }
      </style>
   <?php }
	}
// on backend area
add_action( 'admin_head', 'override_admin_bar_css' );
// on frontend area
add_action( 'wp_head', 'override_admin_bar_css' );
/* Color palette */
function color_palette() {
    add_theme_support( 'editor-color-palette', array(
        array(
            'name' => esc_attr__( 'it4 blue', 'it4hosting-gp-child' ),
            'slug' => 'blue',
            'color' => '#4066c8',
        ),
        array(
            'name' => esc_attr__( 'it4 dark blue', 'it4hosting-gp-child' ),
            'slug' => 'darkblue',
            'color' => '#20124c',
        ),
        array(
            'name' => esc_attr__( 'it4 gold', 'it4hosting-gp-child' ),
            'slug' => 'gold',
            'color' => '#f3b71c',
        ),
        array(
            'name' => esc_attr__( 'it4 light gold', 'it4hosting-gp-child' ),
            'slug' => 'lightgold',
            'color' => '#e9cf3a',
        ),
		array(
            'name' => esc_attr__( 'it4 gray', 'it4hosting-gp-child' ),
            'slug' => 'gray',
            'color' => '#efefef',
        ),
		array(
            'name' => esc_attr__( 'it4 light gray', 'it4hosting-gp-child' ),
            'slug' => 'lightgray',
            'color' => '#f2f2f2',
        ),
		array(
            'name' => esc_attr__( 'black', 'it4hosting-gp-child' ),
            'slug' => 'black',
            'color' => '#000000',
        ),
		array(
            'name' => esc_attr__( 'white', 'it4hosting-gp-child' ),
            'slug' => 'white',
            'color' => '#ffffff',
        ),
    ) );
}
add_action( 'after_setup_theme', 'color_palette' );
?>