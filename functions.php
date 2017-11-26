<?php


if ( ! function_exists( 'crb_initilize_carbon_fields' ) ) {
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
}
