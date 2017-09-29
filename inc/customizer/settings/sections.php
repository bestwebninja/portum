<?php
/**
 * Portum Theme Customizer Panels & Sections
 *
 * @package Portum
 * @since   1.0
 */

if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Register customizer panels
 */
$panels = array(
	/**
	 * General panel
	 */
	array(
		'id'   => 'portum_panel_general',
		'args' => array(
			'priority'       => 24,
			'capability'     => 'edit_theme_options',
			'theme_supports' => '',
			'title'          => esc_html__( 'General options', 'portum' ),
		),
	),
	/**
	 * Content Panel
	 */
	array(
		'id'   => 'portum_panel_content',
		'args' => array(
			'priority'       => 27,
			'capability'     => 'edit_theme_options',
			'theme_supports' => '',
			'type'           => 'epsilon-panel-regular',
			'title'          => esc_html__( 'Front page', 'portum' ),
		),
	),
	/**
	 * Color panel
	 */
	array(
		'id'   => 'portum_panel_colors',
		'args' => array(
			'priority'       => 29,
			'capability'     => 'edit_theme_options',
			'theme_supports' => '',
			'title'          => esc_html__( 'Colors', 'portum' ),
		),
	),
	/**
	 * Content panel
	 */
	array(
		'id'   => 'portum_panel_section_content',
		'args' => array(
			'priority'       => 9999,
			'capability'     => 'edit_theme_options',
			'theme_supports' => '',
			'type'           => 'epsilon-panel-regular',
			'title'          => esc_html__( 'Front Page Content', 'portum' ),
			'panel'          => 'portum_panel_content',
			'hidden'         => true,
		),
	),
);

/**
 * Register sections
 */
$sections = array(
	/**
	 * General section
	 */
	array(
		'id'   => 'portum_header_section',
		'args' => array(
			'title'    => esc_html__( 'Header', 'portum' ),
			'panel'    => 'portum_panel_general',
			'priority' => 1,
		),
	),
	array(
		'id'   => 'portum_layout_section',
		'args' => array(
			'title'    => esc_html__( 'Layout & Typography', 'portum' ),
			'panel'    => 'portum_panel_general',
			'priority' => 3,
		),
	),
	array(
		'id'   => 'portum_footer_section',
		'args' => array(
			'title'    => esc_html__( 'Footer', 'portum' ),
			'panel'    => 'portum_panel_general',
			'priority' => 50,
		),
	),
	/**
	 * Repeatable sections container
	 */
	array(
		'id'   => 'portum_repeatable_section',
		'args' => array(
			'title'       => esc_html__( 'Front Page Sections', 'portum' ),
			'description' => esc_html__( 'Portum theme frontpage is rendered through the use of these sections.', 'portum' ),
			'priority'    => 0,
			'panel'       => 'portum_panel_content',
		),
	),

	/**
	 * Theme Content Sections
	 */
	array(
		'id'   => 'portum_testimonials_section',
		'args' => array(
			'title'    => esc_html__( 'Testimonials', 'portum' ),
			'panel'    => 'portum_panel_section_content',
			'priority' => 1,
			'type'     => 'epsilon-section-doubled',
		),
	),
	array(
		'id'   => 'portum_slides_section',
		'args' => array(
			'title'    => esc_html__( 'Slides', 'portum' ),
			'panel'    => 'portum_panel_section_content',
			'priority' => 2,
			'type'     => 'epsilon-section-doubled',
		),
	),
	array(
		'id'   => 'portum_services_section',
		'args' => array(
			'title'    => esc_html__( 'Services', 'portum' ),
			'panel'    => 'portum_panel_section_content',
			'priority' => 3,
			'type'     => 'epsilon-section-doubled',
		),
	),
	array(
		'id'   => 'portum_portfolio_section',
		'args' => array(
			'title'    => esc_html__( 'Portfolio', 'portum' ),
			'panel'    => 'portum_panel_section_content',
			'priority' => 4,
			'type'     => 'epsilon-section-doubled',
		),
	),
	array(
		'id'   => 'portum_expertise_section',
		'args' => array(
			'title'    => esc_html__( 'Expertise', 'portum' ),
			'panel'    => 'portum_panel_section_content',
			'priority' => 5,
			'type'     => 'epsilon-section-doubled',
		),
	),
	array(
		'id'   => 'portum_team_members_section',
		'args' => array(
			'title'    => esc_html__( 'Team Members', 'portum' ),
			'panel'    => 'portum_panel_section_content',
			'priority' => 5,
			'type'     => 'epsilon-section-doubled',
		),
	),
	array(
		'id'   => 'portum_pricing_section',
		'args' => array(
			'title'    => esc_html__( 'Price Boxes', 'portum' ),
			'panel'    => 'portum_panel_section_content',
			'priority' => 6,
			'type'     => 'epsilon-section-doubled',
		),
	),
);

$collection = array(
	'panel'   => $panels,
	'section' => $sections,
);

Epsilon_Customizer::add_multiple( $collection );

