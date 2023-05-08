<?php
/**
 * Template Name: Full Width Page Tours
 *
 * Template for displaying a page without sidebar even if a sidebar widget is published.
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();
$container = get_theme_mod( 'understrap_container_type' );

if ( is_front_page() ) {
	get_template_part( 'global-templates/hero' );
}

$wrapper_id = 'full-width-page-wrapper';
if ( is_page_template( 'page-templates/no-title.php' ) ) {
	$wrapper_id = 'no-title-page-wrapper';
}
?>

<div class="wrapper" id="<?php echo $wrapper_id; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- ok. ?>">

	<div class="<?php echo esc_attr( $container ); ?>" id="content">

		<div class="row">

			<div class="col-md-8 offset-md-2 content-area" id="primary">

				<main class="site-main" id="main" role="main">

					<?php
					while ( have_posts() ) {
						the_post();
						get_template_part( 'loop-templates/content', 'page' );

						// If comments are open or we have at least one comment, load up the comment template.
						if ( comments_open() || get_comments_number() ) {
							comments_template();
						}
					}
					?>
				
				<!-- add Testimonials from ACF repeater -->
			
				<?php
					
					// Check rows exist.
					if( have_rows('testimonial') ):
						echo '<h3 class="border-top border-2 border-secondary p-2 mt-5">Testimonials</h3>';

						// Loop through rows.
						while( have_rows('testimonial') ) : the_row();

							// Load sub field value.
							$image = get_sub_field('testimonial_image');
							$text = get_sub_field('testimonial_text');
							$person = get_sub_field('testimonial_person');
							$size = 'thumbnail'; // (thumbnail, medium, large, full or custom size)

							
							// Output HTML for each testimonial
							echo 	'<div class="entry-content testimonials d-flex flex-row">';

							if( $image ) {
									echo '<div class="flex-shrink-0 p-3">';
									echo wp_get_attachment_image( $image, $size, ["class" => "img-fluid","alt"=>"some"] );
									echo '</div>';
							}
																	
							echo '<div class="flex-grow-1 ms-3 p-3 border-start border-2">';
							echo '<div class="">' . $text . '</div>';
							echo '<div class="fs-6 fst-italic mt-3">' . $person . '</div>';
							echo '</div></div>';
									
						// End loop.
						endwhile;

					// No value.
					else :
						// No need to display anything :-)
					endif;
				?>

				</main>

			</div><!-- #primary -->

		</div><!-- .row -->

	</div><!-- #content -->

</div><!-- #<?php echo $wrapper_id; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- ok. ?> -->

<?php
get_footer();
