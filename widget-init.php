<?php
/**
 * Plugin Name: Elementor Swiper Slider
 * Description: This plugin uses Elementors slider script and adds the posibility for a slider with thumbnails
 * Plugin URI:  https://github.com/Christian-Hansen/Elementor-Swiper-Slider
 * Version:     1.0.0
 * Author:      Christian Hansen
 * Author URI:  https://github.com/Christian-Hansen/Elementor-Swiper-Slider
 * Text Domain: elementor-swiper-slider
 */

define( 'ELEMENTOR_SWIPER_SLIDER', __FILE__ );

/**
 * Include the Elementor_Swiper_Slider class.
 */
require plugin_dir_path( ELEMENTOR_SWIPER_SLIDER ) . 'activate-widget.php';
