<?php
/**
 * Plugin Name: Elementor delivery
 * Version:     1.0.0
 * Author:      Elementor developer
 * Text Domain: elementor-delivery
 *
 * Requires Plugins: elementor
 * Elementor tested up to: 3.25.0
 * Elementor Pro tested up to: 3.25.0
 */

function register_delivery_widget( $widgets_manager ) {

	require_once( __DIR__ . '/widgets/main-widget.php' );
	require_once( __DIR__ . '/widgets/advantages-widget.php' );
	require_once( __DIR__ . '/widgets/quality-widget.php' );
	require_once( __DIR__ . '/widgets/reviews-widget.php' );
	require_once( __DIR__ . '/widgets/questions-widget.php' );

	$widgets_manager->register( new \Elementor_Main_Widget() );
	$widgets_manager->register( new \Elementor_Advantages_Widget() );
	$widgets_manager->register( new \Elementor_Quality_Widget() );
	$widgets_manager->register( new \Elementor_Reviews_Widget() );
	$widgets_manager->register( new \Elementor_Questions_Widget() );

}
add_action( 'elementor/widgets/register', 'register_delivery_widget' );

// Add New Category
add_action( 'elementor/elements/categories_registered', function( $elements_manager ) {
	$elements_manager->add_category(
		'delivery',
		[
			'title' => __('delivery Widgets', 'elementor-delivery'),
			'icon' => 'fa fa-plug',
		]
		);
} );