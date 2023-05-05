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
		

		
		<div class="d-flex artist col-sm-10 offset-md-1 border rounded-2 border-secondary p-2 fs-6 bg-secondary text-dark text-break bg-opacity-25">
				<!-- Test if there is a Architect listed & display if exists -->
		<?php if (get_field('architect')): ?>
				<div class="artist-title">Architect: </div>
				<div class="card-text">&nbsp;<?php the_field('architect'); ?></div>&nbsp;
		<?php endif; ?>


			<!-- Test if there is a Designer listed & display if exists -->
		<?php
			if (get_field('designer')): ?>
				<div class="artist-title">Designer: </div>
				<div class="card-text">&nbsp;<?php the_field('designer'); ?></div>&nbsp;
		<?php endif; ?>

			<!-- Test if there is a Photographer listed & display if exists -->
		<?php
			if (get_field('photography')): ?>
				<div class="artist-title">Photographer: </div>
				<div class="card-text">&nbsp;<?php the_field('photography'); ?></div>
			<?php endif; ?>
			</div>
		

	</header><!-- .entry-header -->


	<div class="entry-content">

						<?php 
						$images = get_field('post_gallery');
						$size = 'full'; // (thumbnail, medium, large, full or custom size)
						if( $images ): ?>
							<div class="mosaic mt-5 col-md-10 offset-md-1">
								<?php for ($i = 0; $i < count($images); $i++) : ?>
													
										<?php if(isset($images[$i])): ?>
											<div class="mosaic-item image-caption-container image-hover-effect border border-dark">
												<?php $image = wp_get_attachment_image($images[$i], $size); ?>
												<?php $caption = wp_get_attachment_caption($images[$i]); ?>
												<?php $description = get_post_field('post_content', ($images[$i])); ?>
												<?php $image = str_replace('<img', '<img class="img" alt="' . $caption . '"', $image); ?>
												<?php echo $image; ?>
												<div class="mosaic-caption position-absolute bottom-0 start-50 translate-middle bg-dark bg-opacity-50"><?php echo $caption; ?></div>
											</div>
										<?php endif; ?>
								<?php endfor; ?>
									
							</div>
						<?php endif; ?>
		

			
			<!-- .masonary-content -->

	</div><!-- .entry-content -->



</article><!-- #post-<?php the_ID(); ?> -->
