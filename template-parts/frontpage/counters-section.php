<?php
/**
 * Template part for displaying a frontpage section
 *
 * @link    https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Portum
 */

$frontpage          = Epsilon_Page_Generator::get_instance( 'portum_frontpage_sections_' . get_the_ID(), get_the_ID() );
$fields             = $frontpage->sections[ $section_id ];
$grouping           = array(
	'values'   => $fields['counters_grouping'],
	'group_by' => 'counter_title',
);
$fields['counters'] = $frontpage->get_repeater_field( $fields['counters_repeater_field'], array(), $grouping );

$attr_helper = new Epsilon_Section_Attr_Helper( $fields, 'counters', Portum_Repeatable_Sections::get_instance() );
if ( empty( $fields['counters_section_unique_id'] ) ) {
	$fields['counters_section_unique_id'] = Portum_Helper::generate_section_id( 'counters' );
}

$parent_attr = array(
	'id'    => array( $fields['counters_section_unique_id'] ),
	'class' => array(
		'section-counters',
		'section',
		'ewf-section',
		'ewf-section-' . $fields['counters_section_visibility'],
	),
	'style' => array( 'background-image', 'background-position', 'background-size', 'background-repeat' ),
);

/**
 * Layout stuff
 */
$content_class = '';
$header_class  = '';
$row_class     = '';
$item_spacing  = 'ewf-item__spacing-' . ( isset( $fields['counters_column_spacing'] ) ? $fields['counters_column_spacing'] : '' );

if ( 'left' == $fields['counters_row_title_align'] || 'right' == $fields['counters_row_title_align'] ) {
	$content_class = 'col-sm-8 ewf-content__wrap';
	$header_class  = 'col-sm-4';
	if ( 'right' == $fields['counters_row_title_align'] ) {
		$row_class = 'row-flow-reverse';
	}
} else {
	$content_class = 'col-sm-12 ewf-content__wrap';
	$header_class  = 'col-sm-12';
	if ( 'bottom' == $fields['counters_row_title_align'] ) {
		$row_class = 'row-column-reverse';
	}
}
$item_class        = 'col-sm-' . ( 12 / absint( $fields['counters_column_group'] ) );
$item_effect_style = ( ! empty( $fields['counters_item_style'] ) ? esc_attr( $fields['counters_item_style'] ) : 'ewf-item__no-effect' );

/**
 * Item Style
 */
$item_element_class = '';
$item_style         = array();

if ( 'ewf-item__border' != $fields['item_style'] ) {
	$item_element_class = $fields['item_style'];
}else{
	$item_element_class = $fields['item_border_style'];

	if ( ! empty( $fields['item_border_color'] ) ) {
		$item_style[] = 'border-color: ' . esc_attr( $fields['item_border_color'] ) . ';';
	}
	
	if ( ! empty( $fields['item_border_width'] ) ) {
		$item_style[] = 'border-width: ' . esc_attr( $fields['item_border_width'] ) . 'px;';
	}
}
// end layout stuff

wp_enqueue_script( 'odometer' );
?>

<section data-customizer-section-id="portum_repeatable_section" data-section="<?php echo esc_attr( $section_id ); ?>">
	<?php Portum_Helper::generate_inline_css( $fields['counters_section_unique_id'], 'counters', $fields ); ?>
	<?php echo wp_kses( Epsilon_Helper::generate_pencil( 'Portum_Repeatable_Sections', 'counters' ), Epsilon_Helper::allowed_kses_pencil() ); ?>
	<div <?php $attr_helper->generate_attributes( $parent_attr ); ?>>
		<?php $attr_helper->generate_color_overlay(); ?>
		<div class="ewf-section__content">
			<div class="<?php echo esc_attr( Portum_Helper::container_class( 'counters', $fields ) ); ?>">
				<div class="row <?php echo esc_attr( $row_class ); ?>">
					<?php if ( ! empty( $fields['counters_title'] ) || ! empty( $fields['counters_subtitle'] ) ) { ?>
						<div class="<?php echo esc_attr( $header_class ); ?>">
							<div class="ewf-section-text">
								<?php echo wp_kses_post( Portum_Helper::generate_section_title( $fields['counters_subtitle'], $fields['counters_title'] ) ); ?>
							</div><!--ewf-section-text-->
						</div><!-- header class-->
					<?php }//endif ?>

					<div class="<?php echo esc_attr( $content_class ); ?>">

						<?php foreach ( $fields['counters'] as $key => $counter ) { ?>

							<?php
							$class = 'ewf-counter__standard';
							if ( 'odometer' === $counter['counter_type'] ) {
								$class = 'ewf-counter__odometer odometer';
							}

							$style = 'color: ' . ( ! empty( $counter['counter_icon_color'] ) ? esc_attr( $counter['counter_icon_color'] ) : 'inherit' ) . ';';
							$style .= 'font-size: ' . ( ! empty( $counter['counter_icon_size'] ) ? esc_attr( $counter['counter_icon_size'] ) : '56' ) . 'px;';

							?>

							<div class="<?php echo esc_attr( $item_class . ' ' . $item_spacing ); ?>">
								<div class="ewf-counter <?php echo esc_attr( $item_element_class ); ?>" style="<?php echo esc_attr( implode( ';', $item_style ) ); ?>">
									<?php
									echo wp_kses( Epsilon_Helper::generate_field_repeater_pencil( $key, 'portum_counters_section', 'portum_counter_boxes' ), Epsilon_Helper::allowed_kses_pencil() );
									?>
									<?php if ( ! empty( $counter['counter_icon'] ) && $counter['counter_icon_display'] ) { ?>
										<div class="ewf-counter__icon">
											<i style="<?php echo $style; ?>" class="<?php echo esc_attr( $counter['counter_icon'] ); ?>"></i>
										</div>
									<?php } ?>

									<div class="ewf-counter__content">
										<span class="<?php echo esc_attr( $class ); ?>" data-value="<?php echo ! empty( $counter['counter_number'] ) ? esc_attr( $counter['counter_number'] ) : 720; ?>" data-speed="2000"></span>
										<?php if ( ! empty( $counter['counter_symbol'] ) ) { ?>
											<span class="ewf-counter__symbol">
											<?php echo wp_kses_post( $counter['counter_symbol'] ); ?>
										</span><!--/.ewf-counter__symbol-->
										<?php } ?>
										<?php if ( ! empty( $counter['counter_title'] ) ) { ?>
											<p class="ewf-counter__title">
												<?php echo wp_kses_post( $counter['counter_title'] ); ?>
											</p><!--/.ewf-counter__title-->
										<?php } ?>
									</div><!--/.ewf-counter__content-->
								</div><!-- end .ewf-counter -->
							</div><!-- item_class item_spacing-->
						<?php }//end foreach ?>
					</div><!-- content_class-->
				</div><!-- container_class-->
			</div><!--/.ewf-section__content-->
		</div><!--/.row-->
	</div><!-- attr generator-->
</section>
