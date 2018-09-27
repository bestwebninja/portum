<?php
/**
 * Portum Theme Customizer repeatable section
 *
 * @package Portum
 * @since   1.0
 */

if ( ! defined( 'WPINC' ) ) {
	die;
}

require_once dirname( __FILE__ ) . '/repeatable-section.php';

/**
 * Class Repeatable_Section_Blog
 */
class Repeatable_Section_Blog extends Repeatable_Section {
	/**
	 * Sets the section id
	 */
	public function set_id() {
		$this->id = 'blog';
	}

	/**
	 * Sets section title
	 */
	public function set_title() {
		$this->title = esc_html__( 'Blog Posts', 'portum' );
	}

	/**
	 * Description
	 */
	public function set_description() {
		$this->description = esc_html__( 'Blog Posts Section', 'portum' );
	}

	/**
	 * Sets section image
	 */
	public function set_image() {
		$this->image = esc_url( get_template_directory_uri() . '/assets/images/sections/ewf-icon-section-blog-pt.png' );
	}

	/**
	 * Creates groups
	 */
	public function create_groups() {
		$this->groups = array(
			'regular'    => array(
				'icon'  => 'dashicons dashicons-welcome-write-blog',
				'label' => esc_html__( 'Content', 'epsilon-framework' ),
			),
			'background' => array(
				'icon'  => 'dashicons dashicons-admin-customizer',
				'label' => esc_html__( 'Background', 'epsilon-framework' ),
			),
			'layout'     => array(
				'icon'  => 'dashicons dashicons-layout',
				'label' => esc_html__( 'Layout', 'epsilon-framework' ),
			),
			'colors'     => array(
				'icon'  => 'dashicons dashicons-admin-appearance',
				'label' => esc_html__( 'Style', 'epsilon-framework' ),
			),
		);
	}

	/**
	 * Creates the section fields
	 */
	public function create_fields() {
		$this->fields = array_merge(
			$this->layout_fields(),
			$this->background_fields(),
			$this->color_fields(),
			$this->normal_fields()
		);
	}

	/**
	 * Layout fields
	 *
	 * @return array
	 */
	public function layout_fields() {
		return array(
			'blog_row_title_align'           => array(
				'id'          => 'blog_row_title_align',
				'type'        => 'select',
				'label'       => esc_html__( 'Section Layout', 'epsilon-framework' ),
				'description' => esc_html__( 'All sections support an alternating layout. The layout changes based on a section\'s title position. Currently available options are: title left / content right -- title center / content center -- title right / content left ', 'epsilon-framework' ),
				'group'       => 'layout',
				'choices'     => array(
					'top'    => esc_html__( 'Top', 'epsilon-framework' ),
					'bottom' => esc_html__( 'Bottom', 'epsilon-framework' ),
					'left'   => esc_html__( 'Left', 'epsilon-framework' ),
					'right'  => esc_html__( 'Right', 'epsilon-framework' ),
				),
				'default'     => ''
			),
			'blog_column_stretch'            => array(
				'id'          => 'blog_column_stretch',
				'type'        => 'select',
				'label'       => esc_html__( 'Section Width', 'epsilon-framework' ),
				'description' => esc_html__( 'Make the section stretch to full-width. Contained is default. There\'s also the option of boxed center. ', 'epsilon-framework' ),
				'group'       => 'layout',
				'choices'     => array(
					'fullwidth' => esc_html__( 'Fullwidth (100% width)', 'epsilon-framework' ),
					'boxedin'   => esc_html__( 'Contained (1170px width)', 'epsilon-framework' ),
				),
				'default'     => 'boxedin',
			),
			'blog_column_spacing'           => array(
				'id'          => 'blog_column_spacing',
				'type'        => 'select',
				'label'       => esc_html__( 'Item Spacing', 'epsilon-framework' ),
				// 'description' => esc_html__( 'Adds padding top. ', 'epsilon-framework' ),
				'group'       => 'layout',
				'choices'     => array(
					'lg'   => esc_html__( 'Large (105px)', 'epsilon-framework' ),
					'md'   => esc_html__( 'Medium (75px)', 'epsilon-framework' ),
					'sm'   => esc_html__( 'Small (35px)', 'epsilon-framework' ),
					'none' => esc_html__( 'None (0px)', 'epsilon-framework' ),
				),
				'default'     => 'lg',
			),
			'blog_row_spacing_top'           => array(
				'id'          => 'blog_row_spacing_top',
				'type'        => 'select',
				'label'       => esc_html__( 'Padding Top', 'epsilon-framework' ),
				'description' => esc_html__( 'Adds padding top. ', 'epsilon-framework' ),
				'group'       => 'layout',
				'choices'     => array(
					'lg'   => esc_html__( 'Large (105px)', 'epsilon-framework' ),
					'md'   => esc_html__( 'Medium (75px)', 'epsilon-framework' ),
					'sm'   => esc_html__( 'Small (35px)', 'epsilon-framework' ),
					'none' => esc_html__( 'None (0px)', 'epsilon-framework' ),
				),
				'default'     => '',
			),
			'blog_row_spacing_bottom'        => array(
				'id'          => 'blog_row_spacing_bottom',
				'type'        => 'select',
				'label'       => esc_html__( 'Padding Bottom', 'epsilon-framework' ),
				'description' => esc_html__( 'Adds padding bottom.', 'epsilon-framework' ),
				'group'       => 'layout',
				'choices'     => array(
					'lg'   => esc_html__( 'Large (105px)', 'epsilon-framework' ),
					'md'   => esc_html__( 'Medium (75px)', 'epsilon-framework' ),
					'sm'   => esc_html__( 'Small (35px)', 'epsilon-framework' ),
					'none' => esc_html__( 'None (0px)', 'epsilon-framework' ),
				),
				'default'     => ''
			),

		);
	}

	/**
	 * Styling fields
	 *
	 * @return array
	 */
	public function background_fields() {
		$sizes = Epsilon_Helper::get_image_sizes();

		return array(
			'blog_background_color'    => array(
				'id'         => 'blog_background_color',
				'label'      => esc_html__( 'Background Color', 'epsilon-framework' ),
				//'description' => esc_html__( 'Setting a value for this field will create a color overlay on top of background image/videos.', 'epsilon-framework' ),
				'default'    => '',
				'type'       => 'epsilon-color-picker',
				'mode'       => 'rgba',
				'defaultVal' => '',
				'group'      => 'background',
			),
			'blog_background_image'    => array(
				'id'          => 'blog_background_image',
				'label'       => esc_html__( 'Background Image', 'epsilon-framework' ),
				'description' => esc_html__( 'Use this field to set a background image. Content will overlay on top of the image.', 'epsilon-framework' ),
				'type'        => 'epsilon-image',
				'default'     => '',
				'group'       => 'background',
				'size'        => 'full',
				'sizeArray'   => $sizes,
				'mode'        => 'url',
			),
			'blog_background_position' => array(
				'id'          => 'blog_background_position',
				'label'       => esc_html__( 'Background Position', 'epsilon-framework' ),
				'description' => esc_html__( 'We recommend using Center. Experiment with the options to see what works best for you.', 'epsilon-framwework' ),
				'default'     => '',
				'type'        => 'select',
				'group'       => 'background',
				'choices'     => array(
					'topleft'     => __( 'Top Left', 'epsilon-framework' ),
					'top'         => __( 'Top', 'epsilon-framework' ),
					'topright'    => __( 'Top Right', 'epsilon-framework' ),
					'left'        => __( 'Left', 'epsilon-framework' ),
					'center'      => __( 'Center', 'epsilon-framework' ),
					'right'       => __( 'Right', 'epsilon-framework' ),
					'bottomleft'  => __( 'Bottom Left', 'epsilon-framework' ),
					'bottom'      => __( 'Bottom', 'epsilon-framework' ),
					'bottomright' => __( 'Bottom Right', 'epsilon-framework' ),
				),
			),
			'blog_background_size'     => array(
				'id'          => 'blog_background_size',
				'label'       => esc_html__( 'Background Stretch', 'epsilon-framework' ),
				'description' => esc_html__( 'We usually recommend using cover as a default option.', 'epsilon-framework' ),
				'default'     => '',
				'type'        => 'select',
				'group'       => 'background',
				'choices'     => array(
					'cover'   => __( 'Cover', 'epsilon-framework' ),
					'contain' => __( 'Contain', 'epsilon-framework' ),
					'initial' => __( 'Initial', 'epsilon-framework' ),
				),
			),
			'blog_background_repeat'   => array(
				'id'          => 'blog_background_repeat',
				'label'       => esc_html__( 'Background Repeat', 'epsilon-framework' ),
				'description' => esc_html__( 'Set to background-repeat if you are using patterns. For parallax, we recommend setting to no-repeat.', 'epsilon-framework' ),
				'default'     => '',
				'type'        => 'select',
				'group'       => 'background',
				'choices'     => array(
					'no-repeat' => __( 'No Repeat', 'epsilon-framework' ),
					'repeat'    => __( 'Repeat', 'epsilon-framework' ),
					'repeat-y'  => __( 'Repeat Y', 'epsilon-framework' ),
					'repeat-x'  => __( 'Repeat X', 'epsilon-framework' ),
				),
			),
			'blog_background_parallax' => array(
				'id'          => 'blog_background_parallax',
				'label'       => esc_html__( 'Background Parallax', 'epsilon-framework' ),
				'description' => esc_html__( 'Toggling this to ON will enable the parallax effect. Make sure you have a  background image set before enabling it.', 'epsilon-framework' ),
				'default'     => false,
				'type'        => 'epsilon-toggle',
				'group'       => 'background',
			),
		);
	}

	/**
	 * Colors fields
	 *
	 * @return array
	 */
	public function color_fields() {
		return array(
			'blog_heading_color' => array(
				'selectors'     => array( 'h1', 'h2', 'h3', 'h4', 'h5', 'h6' ),
				'css-attribute' => 'color',
				'default'       => '',
				'label'         => __( 'Section Title Color', 'epsilon-framework' ),
				'description'   => '',
				'type'          => 'epsilon-color-picker',
				'mode'          => 'hex',
				'defaultVal'    => '',
				'group'         => 'colors',
			),
			'blog_text_color'    => array(
				'selectors'     => array( 'p' ),
				'css-attribute' => 'color',
				'default'       => '',
				'label'         => __( 'Section Paragraph Color', 'epsilon-framework' ),
				'description'   => '',
				'type'          => 'epsilon-color-picker',
				'mode'          => 'hex',
				'defaultVal'    => '',
				'group'         => 'colors',
			),
		);
	}

	/**
	 * Normal fields
	 *
	 * @return array
	 */
	public function normal_fields() {
		return array(
			'item_style'                   => array(
				'label'   => esc_html__( 'Style', 'portum' ),
				'type'    => 'select',
				'default' => 'ewf-item__no-effect',
				'choices' => array(
					'ewf-item__no-effect'            => esc_html__( 'No effect', 'portum' ),
					'ewf-item__border-dashed-effect' => esc_html__( 'Border Dashed Effect', 'portum' ),
					'ewf-item__shadow-effect'        => esc_html__( 'Bottom Shadow Effect', 'portum' ),
					'ewf-item__simple-border-effect' => esc_html__( 'Simple Border Effect', 'portum' ),
				),
			),
			'item_style_color_picker'      => array(
				'label'     => esc_html__( 'Item Style Color Picker', 'portum' ),
				'type'      => 'epsilon-color-picker',
				'default'   => '',
				'mode'      => 'hex',
				'condition' => array(
					'item_style',
					'ewf-item__border-dashed-effect',
				),
			),
			'blog_title'                   => array(
				'label'             => esc_html__( 'Title', 'portum' ),
				'type'              => 'text',
				'default'           => esc_html__( 'Find out the latest news?', 'portum' ),
				'sanitize_callback' => 'wp_kses_post',
			),
			'blog_subtitle'                => array(
				'label'             => esc_html__( 'Subtitle', 'portum' ),
				'type'              => 'text',
				'default'           => esc_html__( 'BLOG', 'portum' ),
				'sanitize_callback' => 'wp_kses_post',
			),
			'blog_post_count'              => array(
				'label'       => esc_html__( 'Post Count', 'portum' ),
				'description' => esc_html__( 'Only posts with featured image are loaded', 'portum' ),
				'type'        => 'epsilon-slider',
				'default'     => 3,
				'choices'     => array(
					'min' => 1,
					'max' => 10,
				),
			),
			'blog_post_word_count'         => array(
				'label'       => esc_html__( 'Post Excerpt Word Count', 'portum' ),
				'description' => esc_html__( 'You can control the word count of the post excerpt from here. ', 'portum' ),
				'type'        => 'epsilon-slider',
				'default'     => 30,
				'choices'     => array(
					'min'  => 0,
					'max'  => 150,
					'step' => 5,
				),
			),
			'blog_show_date'               => array(
				'label'   => esc_html__( 'Show Post Date Meta', 'portum' ),
				'type'    => 'epsilon-toggle',
				'default' => true,
			),
			'blog_show_author'             => array(
				'label'   => esc_html__( 'Show Post Author Meta', 'portum' ),
				'type'    => 'epsilon-toggle',
				'default' => true,
			),
			'blog_show_comments'           => array(
				'label'   => esc_html__( 'Show Post Comments Meta', 'portum' ),
				'type'    => 'epsilon-toggle',
				'default' => true,
			),
			'blog_show_thumbnail'          => array(
				'label'   => esc_html__( 'Show Post Thumbnail Meta', 'portum' ),
				'type'    => 'epsilon-toggle',
				'default' => true,
			),
			'blog_show_read_more'          => array(
				'label'   => esc_html__( 'Show Read More Button', 'portum' ),
				'type'    => 'epsilon-toggle',
				'default' => true,
			),
			'blog_button_label'            => array(
				'label'             => esc_html__( 'Read More Label', 'portum' ),
				'type'              => 'text',
				'default'           => '',
				'sanitize_callback' => 'wp_kses_post',
				'condition'         => array( 'blog_show_read_more', true ),
			),
			'blog_button_size'             => array(
				'label'     => esc_html__( 'Primary Button Size', 'portum' ),
				'type'      => 'select',
				'default'   => 'ewf-btn--huge',
				'choices'   => array(
					'ewf-btn--huge'   => __( 'Huge', 'portum' ),
					'ewf-btn--medium' => __( 'Medium', 'portum' ),
					'ewf-btn--small'  => __( 'Small', 'portum' ),
				),
				'condition' => array( 'blog_show_read_more', true ),
			),
			'blog_button_radius'           => array(
				'label'     => esc_html__( 'Read More Button Radius', 'portum' ),
				'type'      => 'epsilon-slider',
				'default'   => 0,
				'choices'   => array(
					'min'  => 0,
					'max'  => 50,
					'step' => 5,
				),
				'condition' => array( 'blog_show_read_more', true ),
			),
			'blog_button_background_color' => array(
				'label'             => esc_html__( 'Read More Button Bg. Color', 'portum' ),
				'type'              => 'epsilon-color-picker',
				'default'           => '#000',
				'sanitize_callback' => 'wp_kses_post',
				'condition'         => array( 'blog_show_read_more', true ),
			),
			'blog_button_text_color'       => array(
				'label'             => esc_html__( 'Read More Button Text Color', 'portum' ),
				'type'              => 'epsilon-color-picker',
				'default'           => '#FFF',
				'sanitize_callback' => 'wp_kses_post',
				'condition'         => array( 'blog_show_read_more', true ),
			),
			'blog_button_border_color'     => array(
				'label'             => esc_html__( 'Read More Button Border Color', 'portum' ),
				'type'              => 'epsilon-color-picker',
				'default'           => '#EEE',
				'sanitize_callback' => 'wp_kses_post',
				'condition'         => array( 'blog_show_read_more', true ),
			),
			'blog_section_unique_id'       => array(
				'label'             => esc_html__( 'Section ID', 'portum' ),
				'type'              => 'text',
				'sanitize_callback' => 'sanitize_key',
				'condition'         => array( 'blog_show_read_more', true ),
			),
		);
	}
}