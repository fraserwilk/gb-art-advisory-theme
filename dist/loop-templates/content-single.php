<?php
/**
 * Single post partial template
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>





<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">

	<header class="entry-header mt-5">

		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
		
			 
			<?php
				$architect = get_field('architect');
				$designer = get_field('designer');
				$photographer = get_field('photographer');
			
				if (!empty($architect) || !empty($designer) || !empty($photographer)) {

					// insert the Card div if it's needed
					echo '<div class="d-flex artist border rounded-2 border-secondary p-2 bg-secondary text-dark text-break bg-opacity-25">';
					
					// Test if there is an Architect listed & display if exists
					 if (get_field('architect')):
						echo '<div class="artist-title">Architect: </div>';
						echo '<div class="card-text ps-1">';
						echo the_field('architect');
						echo '</div>&nbsp';
				 	endif;


					// Test if there is a Designer listed & display if exists
					if (get_field('designer')):
						echo '<div class="artist-title">Designer: </div>';
						echo '<div class="card-text ps-1">';
						echo the_field('designer') , '</div>&nbsp;';
					endif;


					// Test if there is a Photographer listed & display if exists
					if (get_field('photographer')):
						echo '<div class="artist-title">Photographer: </div>';
						echo '<div class="card-text ps-1">';
						echo the_field('photographer') , '</div>';
						echo '</div>';
					endif;
					}
				?>
					
					
	
		

	</header><!-- .entry-header -->



	<div class="entry-content">
		<?php 
		the_content();
		?>

		<?php 
		$images = get_field('post_gallery');
		$size = 'full'; // (thumbnail, medium, large, full or custom size)
		if( $images ): ?>
			<div class="mosaic mt-4">
				<?php for ($i = 0; $i < count($images); $i++) : ?>
									
						<?php if(isset($images[$i])): ?>
							<div class="mosaic-item image-caption-container image-hover-effect border border-dark">
								<?php $image = wp_get_attachment_image($images[$i], $size); ?>
								<?php $imageurl = wp_get_attachment_image_url($images[$i], $size); ?>
								<?php $caption = wp_get_attachment_caption($images[$i]); ?>
								<?php $description = get_post_field('post_content', ($images[$i])); ?>
								<?php $image = str_replace('<img', '<img class="img-fluid" alt="' . $caption . '"', $image); ?>
								
								<?php echo '<a href="' . $imageurl . '"' . 'data-toggle="lightbox">'; ?>
								<?php echo $image; ?>
								<div class="mosaic-caption position-absolute bottom-0 start-50 translate-middle bg-dark bg-opacity-50"><?php echo $caption; ?></div>
								</a>
							</div>
						<?php endif; ?>
				<?php endfor; ?>
					
			</div>
		<?php endif; ?>
		

			
			<!-- .masonary-content -->

	</div><!-- .entry-content -->



</article><!-- #post-<?php the_ID(); ?> -->
