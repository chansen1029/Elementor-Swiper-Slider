<?php

namespace ElementorSwiperSlider;

// Security Note: Blocks direct access to the plugin PHP files.
defined( 'ABSPATH' ) || die();

class Register_Widget {

	private static $instance = null;

	public static function instance() {
		if ( is_null( self::$instance ) ) {
			self::$instance = new self();
		}

		return self::$instance;
	}

	private function include_widgets_files() {
		require_once 'widgets/renderer.php';
		require_once 'widgets/widget-category.php';
	}


	public function register_frontend_scripts() {
		if (!wp_script_is( 'swiper.min.js', 'enqueued' )) {
			wp_register_script( 'slider-swiper-script', plugins_url( '/assets/js/swiper.min.js', ELEMENTOR_SWIPER_SLIDER ), array(), '5.3.6' );
		}

		wp_register_script( 'slider-upgrade-script', plugins_url( '/assets/js/slider.js', ELEMENTOR_SWIPER_SLIDER ), array(), '1.0.0' );
	}
	
	public function register_frontend_styles() {
		wp_register_style( 'slider-upgrade-style', plugins_url( '/assets/css/slider.css', ELEMENTOR_SWIPER_SLIDER ), array(), '1.0.0' );
	}

	public function register_widgets() {
		// It's now safe to include Widgets files.
		$this->include_widgets_files();

		// Register the plugin widget classes.
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\SliderControls() );
	}

	public function __construct() {
		// Register the widgets.
		add_action( 'elementor/widgets/widgets_registered', array( $this, 'register_widgets' ) );

		add_action( 'elementor/frontend/after_register_scripts', array( $this, 'register_frontend_scripts' ), 10 );

		add_action( 'elementor/frontend/after_register_styles', array( $this, 'register_frontend_styles' ), 10 );
	}
}

// Instantiate the Widgets class.
Register_Widget::instance();
