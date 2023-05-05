<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$container = get_theme_mod( 'understrap_container_type' );
?>

<?php get_template_part( 'sidebar-templates/sidebar', 'footerfull' ); ?>

<div class="wrapper mx-auto text-light bg-primary" id="wrapper-footer">

	<div class="<?php echo esc_attr( $container ); ?>">

		<div class="row">

			<div class="col-md-12">

				<footer class="site-footer" id="colophon">
					<div class="site-info mx-auto text-center"><a href="tel:+61 (0)419 199 361">+61 (0)419 199 361</a>  •  <a href="mailto:georgie@gbartadvisory.com.au">georgie@gbartadvisory.com.au</a></div>
					<div class="site-info mx-auto" style="width: 33ch;">

						© 2023 <a href="https://gbartadvisory.com.au/">GB Art Advisory</a> • site by <a href="https://truweb.com.au/" target="_blank">truweb</a>

					</div><!-- .site-info -->

				</footer><!-- #colophon -->

			</div><!-- col -->

		</div><!-- .row -->

	</div><!-- .container(-fluid) -->

</div><!-- #wrapper-footer -->

<?php // Closing div#page from header.php. ?>
</div><!-- #page -->

<?php wp_footer(); ?>
		
		

</body>

</html>

