<?php
/**
 * Template Name: Front Page Gallery - GBAA
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

<div class="wrapper py-0" id="<?php echo $wrapper_id; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- ok. ?>">

	<div class="<?php echo esc_attr( $container ); ?>-fluid" id="content">

		<div class="row">

			<div class="col-md-12 m-0 p-0" id="primary">

				<main class="site-main" id="main" role="main">

					<?php 
						$images = get_field('front_page_gallery');
						$size = 'full'; // (thumbnail, medium, large, full or custom size)
						if( $images ): ?>
						<div class="row d-flex justify-content-center">
							<?php for ($i = 0; $i < 3; $i++) : ?>
								<div class="col-md-4 p-1">
																	
										<?php if(isset($images[$i])): ?>
											<div class="image-caption-container image-hover-effect">
												<?php $image = wp_get_attachment_image($images[$i], $size); ?>
												<?php $caption = wp_get_attachment_caption($images[$i]); ?>
												<?php $description = get_post_field('post_content', ($images[$i])); ?>
												<?php $image = str_replace('<img', '<img class="img-fluid box" alt="' . $caption . '"', $image); ?>
												<?php echo $image; ?>
												<div class="caption position-absolute top-50 start-50 translate-middle title"><a href="<?php echo $description; ?>"><?php echo $caption; ?></a></div>
											</div>
										<?php endif; ?>
									
								</div>
								
							<?php endfor; ?>
						</div>
						<div class="row">
							<?php for ($i = 3; $i < count($images); $i++) : ?>
								<div class="col-md-4 p-1">

									<?php if(isset($images[$i])): ?>
										<div class="image-caption-container image-hover-effect">
											<?php $image = wp_get_attachment_image($images[$i], $size); ?>
											<?php $caption = wp_get_attachment_caption($images[$i]); ?>
											<?php $description = get_post_field('post_content', ($images[$i])); ?>
											<?php $image = str_replace('<img', '<img class="img-fluid box" alt="' . $caption . '"', $image); ?>
											<?php echo $image; ?>
											<div class="caption position-absolute top-50 start-50 translate-middle title"><a href="<?php echo $description; ?>"><?php echo $caption; ?></a></div>
										</div>
									<?php endif; ?>
								</div>
							<?php endfor; ?>
						</div>
						<?php endif; ?>



				</main>

			</div><!-- #primary -->

		</div><!-- .row -->

	</div><!-- #content -->

</div><!-- #<?php echo $wrapper_id; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- ok. ?> -->

<?php
get_footer();
