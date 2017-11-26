<?php 

use Carbon_Fields\Container;
use Carbon_Fields\Field;

Container::make( 'theme_options', __( 'Theme Options', 'crb' ) )
	->add_fields( array(
		Field::make( 'textarea', 'text', __( 'Text', 'crb' ) ),
	) );

Container::make( 'theme_options', __( 'Custom Creator', 'crb' ) )
	->add_tab( __( 'Posts', 'crb' ), array(
		Field::make( 'complex', 'crb_posts', '' )
			->set_layout( 'tabbed-horizontal' )
			->setup_labels( array(
				'singular_name' => 'Post',
				'plural_name' => 'Posts',
			) )
			->add_fields( array(
				Field::make( 'text', 'name', __( 'Name', 'crb' ) ),
				Field::make( 'text', 'slug', __( 'Slug', 'crb' ) ),
				Field::make( 'set', 'options', __( 'Options', 'crb' ) )
					->add_options( array(
						'public' => __( 'Public', 'crb' ),
						'show_ui' => __( 'Show in UI', 'crb' ),
						'exclude_form_search' => __( 'Exclude From Search', 'crb' ),
						'show_in_menu' => __( 'Show in Admin Menu', 'crb' ),
						'show_in_admin_bar' => __( 'Show in Admin Bar', 'crb' ),
						'show_in_nav_menus' => __( 'Show in Nav Menus', 'crb' ),
						'has_archive' => __( 'Create an Archive', 'crb' ),
						'with_front' => __( 'With Front of Page', 'crb' ),
					) ),
			) ),
	) );


/*
'labels' => array( _x('Posts', 'post type general name'), _x('Pages', 'post type general name') ),
        'singular_name' => array( _x('Post', 'post type singular name'), _x('Page', 'post type singular name') ),
        'add_new' => array( _x('Add New', 'post'), _x('Add New', 'page') ),
        'add_new_item' => array( __('Add New Post'), __('Add New Page') ),
        'edit_item' => array( __('Edit Post'), __('Edit Page') ),
        'new_item' => array( __('New Post'), __('New Page') ),
        'view_item' => array( __('View Post'), __('View Page') ),
        'view_items' => array( __('View Posts'), __('View Pages') ),
        'search_items' => array( __('Search Posts'), __('Search Pages') ),
        'not_found' => array( __('No posts found.'), __('No pages found.') ),
        'not_found_in_trash' => array( __('No posts found in Trash.'), __('No pages found in Trash.') ),
        'parent_item_colon' => array( null, __('Parent Page:') ),
        'all_items' => array( __( 'All Posts' ), __( 'All Pages' ) ),
        'archives' => array( __( 'Post Archives' ), __( 'Page Archives' ) ),
        'attributes' => array( __( 'Post Attributes' ), __( 'Page Attributes' ) ),
        'insert_into_item' => array( __( 'Insert into post' ), __( 'Insert into page' ) ),
        'uploaded_to_this_item' => array( __( 'Uploaded to this post' ), __( 'Uploaded to this page' ) ),
        'featured_image' => array( _x( 'Featured Image', 'post' ), _x( 'Featured Image', 'page' ) ),
        'set_featured_image' => array( _x( 'Set featured image', 'post' ), _x( 'Set featured image', 'page' ) ),
        'remove_featured_image' => array( _x( 'Remove featured image', 'post' ), _x( 'Remove featured image', 'page' ) ),
        'use_featured_image' => array( _x( 'Use as featured image', 'post' ), _x( 'Use as featured image', 'page' ) ),
        'filter_items_list' => array( __( 'Filter posts list' ), __( 'Filter pages list' ) ),
        'items_list_navigation' => array( __( 'Posts list navigation' ), __( 'Pages list navigation' ) ),
        'items_list' => array( __( 'Posts list' ), __( 'Pages list' ) ),
*/