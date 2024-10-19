<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package SoftMe
 */
get_header();
?>
<section id="dt_not_found" class="dt_not_found dt-py-default">
	<div class="dt-container">
		<div class="dt-row">
			<div class="dt-col-xl-7 dt-col-lg-8 dt-col-md-9 dt-col-12 dt-mx-auto dt-mb-6">
				<div class="dt_siteheading dt-text-center">	
					<span class="subtitle">
						<span class="dt_heading dt_heading_8">
							<span class="dt_heading_inner">
								<b class="is_on"><?php esc_html_e('Page Not Found','softme'); ?></b><b><?php esc_html_e('Page Not Found<','softme'); ?></b><b><?php esc_html_e('Page Not Found<','softme'); ?></b>
							</span>
						</span>
					</span>
					<div class="dt_siteheading_box">	
						<h2 class="title">
							<i class="fas fa-4" aria-hidden="true"></i> <i class="fas fa-question" aria-hidden="true"></i> <i class="fas fa-4" aria-hidden="true"></i>
						</h2>
						
						<h3 class="dt-mt-4"><?php esc_html_e("Oops! That page can't be found.",'softme'); ?></h3>
						
						<div class="text dt-mt-3 wow fadeInUp" data-wow-duration="1500ms">
							<p><?php esc_html_e('Unfortunately, something went wrong and this page does not exist. Try using click the button and return to the previous page.','softme'); ?></p>
						</div>
						
						<a href="<?php echo esc_url(home_url( '/' )); ?>" class="dt-btn dt-btn-primary dt-mt-5">
							<span class="dt-btn-text" data-text="<?php esc_attr_e('Return To Home','softme'); ?>"><?php esc_html_e('Return To Home','softme'); ?></span>
						</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<?php get_footer(); ?>
