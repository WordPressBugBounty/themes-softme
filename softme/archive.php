<?php
/**
 * The template for displaying archive pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package SoftMe
 */

get_header(); 
?>
<section class="dt_posts dt-py-default">
	<div class="dt-container">
		<div class="dt-row dt-g-5">
			<?php if (  !is_active_sidebar( 'softme-sidebar-primary' ) ): ?>
				<div class="dt-col-lg-12 dt-col-md-12 dt-col-12 wow fadeInUp">
			<?php else: ?>	
				<div id="dt-main" class="dt-col-lg-8 dt-col-md-12 dt-col-12 wow fadeInUp">
			<?php endif; ?>	
				<?php if( have_posts() ): ?>
					<?php 
					// Start the loop.
					while( have_posts() ) : the_post(); ?>
						<div class="dt_post_block wow fadeInUp animated" data-wow-delay="100ms" data-wow-duration="1500ms">
							<?php get_template_part('template-parts/content','page'); ?>
						</div>
					<?php endwhile; 
					// End the loop.
					
					 // Pagination.
						the_posts_pagination( array(
							'prev_text'          => '<i class="fa fa-angle-double-left"></i>',
							'next_text'          => '<i class="fa fa-angle-double-right"></i>'
						) );
						
						// If no content, include the "No posts found" template.
					else: 
						get_template_part('template-parts/content','none'); 
					endif; ?>
			</div>
			<?php get_sidebar(); ?>
		</div>
	</div>
</section>
<?php get_footer(); ?>
