<?php

// Registering a custom category
function add_elementor_widget_categories( $elements_manager ) {

	$elements_manager->add_category(
		'custom widget',
		[
			'title' => esc_html__( 'Custom widget', 'elementor-swiper-slider' ),
			'icon' => 'fa fa-plug',
		]
	);

}
add_action( 'elementor/elements/categories_registered', 'add_elementor_widget_categories' );