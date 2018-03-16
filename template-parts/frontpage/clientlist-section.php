<?php
/**
 * Template part for displaying a frontpage section
 *
 * @link    https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Portum
 */

$frontpage = Epsilon_Page_Generator::get_instance( 'portum_frontpage_sections_' . get_the_ID(), get_the_ID() );
$fields    = $frontpage->sections[ $section_id ];
$grouping  = array(
	'values'   => $fields['clientlist_grouping'],
	'group_by' => 'client_title',
);

$fields['clients'] = $frontpage->get_repeater_field( $fields['clientlist_repeater_field'], array(), $grouping );
$attr_helper       = new Epsilon_Section_Attr_Helper( $fields, 'clientlist', Portum_Repeatable_Sections::get_instance() );
$parent_attr       = array(
	'class' => array( 'section-clientlist', 'section', 'ewf-section' ),
	'style' => array( 'background-image', 'background-position', 'background-size', 'background-repeat' ),
);

?>
<section data-customizer-section-id="portum_repeatable_section" data-section="<?php echo esc_attr( $section_id ); ?>">
	<div <?php $attr_helper->generate_attributes( $parent_attr ); ?>>
		<?php
		$attr_helper->generate_video_overlay();
		$attr_helper->generate_color_overlay();
		?>
		<div class="container">
			<?php echo wp_kses( Portum_Helper::generate_pencil( 'Portum_Repeatable_Sections', 'clientlist' ), Epsilon_Helper::allowed_kses_pencil() ); ?>
		</div>

		<?php echo wp_kses_post( Portum_Helper::generate_section_title( $fields['clientlist_subtitle'], $fields['clientlist_title'] ) ); ?>

		<div class="<?php echo esc_attr( Portum_Helper::container_class( 'clientlist', $fields ) ); ?>">
			<div class="row">
				<div class="col-sm-12">
					<?php if ( $fields['clientlist_slider'] ) { ?>
					<div class="ewf-partner-slider ewf-partner-slider--spacing-small">
						<ul class="ewf-partner-slider__slides" data-slick='{ "slidesToShow": 6, "slidesToScroll": 2, "autoplay": true, "infinite": true, "speed": 500, "dots": true }'>
							<?php } else { ?>
							<ul class="ewf-partners-list ewf-partners-list--spacing-medium ewf-partners-list--columns-6">
								<?php } ?>

								<?php foreach ( $fields['clients'] as $client ) { ?>
									<li>
										<div class="ewf-partner">
											<a href="<?php echo ! empty( $client['client_url'] ) ? esc_url( $client['client_url'] ) : '#' ?>">
												<img src="<?php echo esc_url( $client['client_logo'] ); ?>" alt="<?php esc_attr( $client['client_title'] ); ?>">
											</a>
										</div><!-- end .ewf-partner -->
									</li>
								<?php } ?>

								<?php if ( $fields['clientlist_slider'] ) { ?>
							</ul>
							<div class="ewf-partner-slider__pager">
								<!-- dots will be added here -->
							</div>
					</div>
					<?php } else { ?>
					</ul>
					<?php } ?>
				</div>
			</div>
		</div>
	</div>
</section>
