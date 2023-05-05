<?php
/**
 * Template Name: Front Page - GBAA
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();

$container = get_theme_mod( 'understrap_container_type' );

?>

<div class="wrapper py-0" id="page-wrapper">

	<div class="<?php echo esc_attr( $container ); ?>-fluid" id="content" tabindex="-1">

		<div class="row">

			<main class="site-main m-0 p-0" id="main">
				<div class="position-absolute top-50 start-50 translate-middle">logo</div>



				<!-- BS Carousel & ACF -->

					<?php
					$image_ids = get_field('front_page_gallery');
					if ($image_ids) :
					?>
					
					<div id="carouselACF" class="carousel slide carousel-fade" data-bs-ride="carousel" data-bs-touch="false">
						
						<div class="carousel-inner">
							<?php foreach ($image_ids as $key => $image_id) : ?>
								<div class="carousel-item <?php echo ($key == 0) ? 'active' : ''; ?>" data-bs-interval="10000">
									<?php echo wp_get_attachment_image($image_id, 'full', false, array('class' => 'd-block w-100')); ?>
									
								</div>
								

							<?php endforeach; ?>
							
						</div>
						
					</div>
					<?php endif; ?>
					






			</main>

		</div><!-- .row -->

	</div><!-- #content -->

</div><!-- #page-wrapper -->

<?php
get_footer();
