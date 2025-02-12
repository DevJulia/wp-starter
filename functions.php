<?php 

//Load includes
require_once get_template_directory() . '/includes/styles.php';
require_once get_template_directory() . '/includes/scripts.php';

//ACF Option page
if( function_exists('acf_add_options_page') ) {
	acf_add_options_page('Options du thème');
}

// Shortcut to get_template_directory_uri
function add_img_html($file) {
    $path = get_template_directory_uri() . '/assets/img/' . $file;
    echo $path;
}

//Custom post type
/*  $labels = array(
	'name'              => 'User stories',
	'singular_name'     => 'User story',
	'all_items'         => 'All stories',
	'view_item'         => 'View story',
);
$args = array(
	'labels'        => $labels,
	'public'        => true,
	'has_archive'   => true,
	'menu_position' => 5,
	'supports'			=> ['title', 'editor', 'thumbnail'],
);

register_post_type('user-stories', $args); */

//Post thumbnail
// add_theme_support( 'post-thumbnails' );


//Get WP Menu
function my_get_menu($location){
	$menu_locations = get_nav_menu_locations();
	$hero_menu = $menu_locations[$location];
	$menu_items = wp_get_nav_menu_items( $hero_menu );
	
	$menu_ordered = array();
	
	foreach ($menu_items as $item){
		if ($item->menu_item_parent == 0){
			$menu_ordered[$item->ID] = $item;
			$menu_ordered[$item->ID]->children = array();
		}
		else {
			$menu_ordered[$item->menu_item_parent]->children[] = $item;
		}
	}
	
	return $menu_ordered;
}

//Init WP site
function init_site() {
	register_nav_menus(
		array(
      'main-nav' => "Main menu",
		)
	);
}

add_action('init', 'init_site');

?>