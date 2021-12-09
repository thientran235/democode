<?php
function demo_cpts_news() {

	/**
	 * Post Type: News.
	 */

	$labels = [
		"name" => __( "News", "storefront" ),
		"singular_name" => __( "News", "storefront" ),
	];

	$args = [
		"label" => __( "News", "storefront" ),
		"labels" => $labels,
		"description" => "",
		"public" => true,
		"publicly_queryable" => true,
		"show_ui" => true,
		"show_in_rest" => true,
		"rest_base" => "",
		"rest_controller_class" => "WP_REST_Posts_Controller",
		"has_archive" => "news",
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"delete_with_user" => false,
		"exclude_from_search" => false,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => false,
		"rewrite" => [ "slug" => "news", "with_front" => true ],
		"query_var" => true,
		"menu_icon" => "dashicons-welcome-widgets-menus",
		"supports" => [ "title", "editor", "thumbnail", "excerpt", "comments", "author" ],
		"show_in_graphql" => false,
	];

	register_post_type( "news", $args );

    /**
	 * Taxonomy: Topics.
	 */

	$labels = [
		"name" => __( "Topics", "storefront" ),
		"singular_name" => __( "Topic", "storefront" ),
	];

	$args = [
		"label" => __( "Topics", "storefront" ),
		"labels" => $labels,
		"public" => true,
		"publicly_queryable" => true,
		"hierarchical" => true,
		"show_ui" => true,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"query_var" => true,
		"rewrite" => [ 'slug' => 'topic', 'with_front' => true, ],
		"show_admin_column" => false,
		"show_in_rest" => true,
		"show_tagcloud" => false,
		"rest_base" => "topic",
		"rest_controller_class" => "WP_REST_Terms_Controller",
		"show_in_quick_edit" => true,
		"show_in_graphql" => false,
	];
	register_taxonomy( "topic", [ "news" ], $args );
}

add_action( 'init', 'demo_cpts_news' );
