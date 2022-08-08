<?php

namespace ElementorSwiperSlider\Widgets;

// Security Note: Blocks direct access to the plugin PHP files.
defined( 'ABSPATH' ) || die();

class SliderControls extends \Elementor\Widget_Base {

	public function __construct( $data = array(), $args = null ) {
		parent::__construct( $data, $args );
	}

	// Widget name
	public function get_name() {
		return 'Swiper Slider';
	}

	// Widget title
	public function get_title() {
		return __( 'Swiper Slider', 'elementor-swiper-slider' );
	}

	// Widget icon
	public function get_icon() {
		return 'eicon-thumbnails-down';
	}

	// Category the widget belongs to
	public function get_categories() {
		return array( 'custom widget' );
	}
	
	// Enqueue styles
	public function get_style_depends() {
		return array( 'slider-upgrade-style' );
	}

	// Enqueue scripts
	public function get_script_depends() {
		return array( 'slider-upgrade-script', 'slider-swiper-script' );
	}

	// Widget Controls
	protected function register_controls() {

		/**
		 * Image Section Start
		 */
		$this->start_controls_section(
			'image_section',
			[
				'label' => esc_html__( 'Images', 'elementor-swiper-slider' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'gallery',
			[
				'label' => esc_html__( 'Add Images', 'elementor-swiper-slider' ),
				'type' => \Elementor\Controls_Manager::GALLERY,
				'default' => [],
				'description' => esc_html__( 'Adding more than 1 image, will active the slider functionality', 'elementor-swiper-slider' ),
				'dynamic' => [
					'active' => true,
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Image_Size::get_type(),
			[
				'name' => 'thumbnail',
				'exclude' => [],
				'include' => [],
				'default' => 'full',
			]
		);

		$this->end_controls_section();
		/**
		 * Image Section End
		 */

		/**
		 * Style Section Start
		 */
		$this->start_controls_section(
			'style_section',
			[
				'label' => esc_html__( 'Style', 'elementor-swiper-slider' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_responsive_control(
			'item_border_radius',
			[
				'type'       => \Elementor\Controls_Manager::DIMENSIONS,
				'label'      => esc_html__( 'Border Radius', 'elementor-swiper-slider' ),
				'size_units' => [ 'px', 'em', '%' ],
				'selectors'  => [
					'{{WRAPPER}} .swiper-slide img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();
		/**
		 * Style Section End
		 */

	}

	// Frontend output
	protected function render() {
		$settings = $this->get_settings_for_display();

		echo '<div class="swiper-body">';
		echo '<div class="swiper featured-swiper">';
		echo '<div class="swiper-wrapper">';
		foreach ( $settings['gallery'] as $image ) {
			echo '<div class="swiper-slide">';
			echo wp_get_attachment_image($image['id'], $settings['thumbnail_size']);
			echo '</div>';
		}
		echo '</div>';
		echo '<div class="swiper-button-next swiper-button-white"></div>';
		echo '<div class="swiper-button-prev swiper-button-white"></div>';
		echo '</div>';

		echo '<div class="swiper thumbnail-swiper">';
		echo '<div class="swiper-wrapper">';
		foreach ( $settings['gallery'] as $image ) {
			echo '<div class="swiper-slide">';
			echo wp_get_attachment_image($image['id'], $settings['thumbnail_size']);
			echo '</div>';
		}
		echo '</div>';
		echo '</div>';
		echo '</div>';
	}

	protected function content_template() {
		?>
		<#
		var image = {
			id: settings.image.id,
			url: settings.image.url,
			size: settings.thumbnail_size,
			dimension: settings.thumbnail_custom_dimension,
			model: view.getEditModel()
		};
		var image_url = elementor.imagesManager.getImageUrl( image );
		#>

		<img src="{{{ image_url }}}" />
		
		<?php
	}
}
