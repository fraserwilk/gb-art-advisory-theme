<?php
/**
 * Header Navbar (bootstrap5)
 *
 * @package Understrap
 * @since 1.1.0
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$container = get_theme_mod( 'understrap_container_type' );
?>

<nav id="main-nav" class="navbar navbar-expand-md navbar-dark bg-primary" aria-labelledby="main-nav-label">

	<h2 id="main-nav-label" class="screen-reader-text">
		<?php esc_html_e( 'Main Navigation', 'understrap' ); ?>
	</h2>


	<!-- <div class="<?php echo esc_attr( $container ); ?>"> -->
	<div class="container">

		<!-- GBAA site branding in the menu -->
		<?php get_template_part( 'global-templates/navbar-branding' ); ?>

		<button
			class="navbar-toggler"
			type="button"
			data-bs-toggle="collapse"
			data-bs-target="#navbarNavDropdown"
			aria-controls="navbarNavDropdown"
			aria-expanded="false"
			aria-label="<?php esc_attr_e( 'Toggle navigation', 'understrap' ); ?>"
		>
			<!-- <span class="navbar-toggler-icon"></span> -->
			<!-- using an svg as hamburger -->
			<svg viewBox="0 0 100 80" width="40" height="40" fill="#FFFFFF">
				<rect width="100" height="12" rx="4"></rect>
				<rect y="30" width="100" height="12" rx="4"></rect>
				<rect y="60" width="100" height="12" rx="4"></rect>
			</svg>
		</button>

		<!-- The WordPress Menu goes here -->
		<?php
		wp_nav_menu(
			array(
				'theme_location'  => 'primary',
				'container_class' => 'collapse navbar-collapse justify-content-center',
				'container_id'    => 'navbarNavDropdown',
				'menu_class'      => 'navbar-nav text-end text-light',
				'fallback_cb'     => '',
				'menu_id'         => 'main-menu',
				'depth'           => 2,
				'walker'          => new Understrap_WP_Bootstrap_Navwalker(),
			)
		);
		?>

	</div><!-- .container(-fluid) -->

</nav><!-- #main-nav -->
