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
			) ),
	) );