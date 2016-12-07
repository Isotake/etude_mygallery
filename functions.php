<?php

function attachment_extend() {
	register_taxonomy_for_object_type( 'category', 'attachment' );
	register_taxonomy_for_object_type( 'post_tag', 'attachment' );
	add_post_type_support( 'attachment', 'page-attributes' );
}
add_action( 'init' , 'attachment_extend' );

function add_query_vars_filter($vars){
	$vars[] = "my_tag";
	return $vars;
}
add_filter('query_vars', 'add_query_vars_filter');

function enqueue_script_cb(){
	wp_enqueue_style( 'mygallery-style', get_stylesheet_uri() );
	wp_enqueue_script('underscore');
	wp_enqueue_script('minigrid', get_stylesheet_directory_uri().'/js/minigrid.min.js');
	wp_enqueue_script('myscript', get_stylesheet_directory_uri().'/js/myscript.js', array('jquery'));
}
add_action('wp_enqueue_scripts', 'enqueue_script_cb');
?>
