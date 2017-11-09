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
?>

<section data-customizer-section-id="portum_repeatable_section" data-section="<?php echo esc_attr( $section_id ); ?>">
	<div class="section-about section">
		<div class="container">
			<?php echo wp_kses_post( Portum_Helper::generate_pencil() ); ?>

			<div class="row">
				<?php if ( ! empty( $fields['about_image'] ) ) { ?>
					<div class="col-md-5">
						<img src="<?php echo esc_url( $fields['about_image'] ); ?>" alt="" class="about-image"/>
					</div>
				<?php } ?>

				<div class="col-md-7">
					<?php
					echo wp_kses_post(
						Portum_Helper::generate_section_title(
							$fields['about_subtitle'],
							$fields['about_title'],
							array(
								'doubled' => true,
								'center'  => false,
							)
						)
					);
					?>

					<?php echo wpautop( wp_kses_post( $fields['about_text'] ) ); ?>
				</div>
			</div>
		</div>
	</div>
</section>
