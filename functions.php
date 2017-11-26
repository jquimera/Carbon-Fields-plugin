<?php

if ( ! function_exists( 'crb_initilize_carbon_fields' ) ) {

	$template_dir = get_template_directory_uri();

	function crb_get_custom_post_name_array( $post_name ) {
		$plural_name = $post_name . 's';

		$labels = array( 
	        'singular_name' => __( $post_name, 'crb' ),
	        'add_new' => __( 'Add New ', 'crb' ),
	        'add_new_item' => __( 'Add New ' . $post_name, 'crb' ),
	        'edit_item' => __( 'Edit ' . $post_name, 'crb' ),
	        'new_item' => __( 'New ' . $post_name, 'crb' ),
	        'view_item' => __( 'View ' . $post_name, 'crb' ),
	        'view_items' => __( 'View ' . $plural_name, 'crb' ),
	        'search_items' => __( 'Search ' . $plural_name, 'crb' ),
	        'not_found' => __( 'No ' . $plural_name . 'found', 'crb' ),
	        'not_found_in_trash' => __( 'No ' . $plural_name . ' found in trash.' ),
	        'parent_item_colon' => array( null, __('Parent Page:') ),
	        'all_items' => __( 'All ' . $plural_name, 'crb' ),
	        'archives' => __( $plural_name . ' Archives', 'crb' ),
	        'attributes' => __( $post_name . ' Attributes', 'crb' ),
	        'insert_into_item' => __( 'Insert into ' . $post_name, 'crb' ),
	        'uploaded_to_this_item' => __( 'Uploaded to this ' . $post_name, 'crb' ),
	        'featured_image' => array( _x( 'Featured Image', 'post' ), _x( 'Featured Image', 'page' ) ),
	        'set_featured_image' => array( _x( 'Set featured image', 'post' ), _x( 'Set featured image', 'page' ) ),
	        'remove_featured_image' => array( _x( 'Remove featured image', 'post' ), _x( 'Remove featured image', 'page' ) ),
	        'use_featured_image' => array( _x( 'Use as featured image', 'post' ), _x( 'Use as featured image', 'page' ) ),
	        'filter_items_list' => __( 'Filter ' . $plural_name . 'list', 'crb' ),
	        'items_list_navigation' => __( $plural_name . ' navigation list', 'crb' ),
	        'items_list' => __( $plural_name . ' list', 'crb' ) );

		return $labels;
	}

	function crb_initilize_carbon_fields() {
		include_once( 'vendor/autoload.php' );

		\Carbon_Fields\Carbon_Fields::boot();
	}

	add_action( 'after_setup_theme', 'crb_initilize_carbon_fields' );

	function crb_initialize_options() {
		include_once( 'options/theme-options.php' );
		include_once( 'options/post-meta.php' );
	}

	add_action( 'carbon_fields_register_fields', 'crb_initialize_options' );

	wp_enqueue_script( 'jquery' );
	wp_enqueue_script( 'theme-custom-script', get_template_directory_uri() . '/functions.js', array( 'jquery' ) );

	function crb_init_scripts_and_styles() {
		wp_deregister_script( 'theme-custom-script' );
	}

	add_action( 'wp_enqueue_scripts', 'crb_init_scripts_and_styles' );

	function crb_init_post_types() {
		$posts = carbon_get_theme_option( 'crb_posts' );

		if ( empty( $posts ) ) {
			return;
		}


		foreach ( $posts as $post ) {
			foreach ( $post['options'] as $p ) {
				var_dump( $p );
			}
			$custom_post = $post[ 'options' ];
			$labels = crb_get_custom_post_name_array( esc_attr( $post['name'] ) );

			$custom_post[] = $labels;
			$custom_post['rewrite'] = array(
				'slug' => $post['slug']
			);

			register_post_type( 'crb_' . strtolower( $post['name'] ), $custom_post );
		}

		flush_rewrite_rules();
	}

	add_action( 'carbon_fields_register_fields', 'crb_init_post_types' );
}
