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
<section id="dt_posts" class="dt_posts dt-py-default">
	<div class="dt-container">
		<div class="dt-row dt-g-4">
			<?php if (  !is_active_sidebar( 'softme-sidebar-primary' ) ): ?>
				<div class="dt-col-lg-12 dt-col-md-12 dt-col-12 wow fadeInUp">
			<?php else: ?>	
				<div id="dt-main" class="dt-col-lg-8 dt-col-md-12 dt-col-12 wow fadeInUp">
			<?php endif; ?>	
				<div class="dt-row dt-g-4">
					<div class="dt-col-lg-12 dt-col-sm-12 dt-col-12 single-post">
						<?php if( have_posts() ): 
							// Start the loop.
							while( have_posts() ): the_post();
								get_template_part('template-parts/content','page'); 
							endwhile; // End the loop.
							endif; 
						 comments_template( '', true ); // show comments  ?>
					</div>                            
				</div>
			</div>
			<?php get_sidebar(); ?>
		</div>
	</div>
</section>
<?php get_footer(); ?>
