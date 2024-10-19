<?php
/**
 * Custom template tags for this theme.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package SoftMe
 */

/**
 * Theme Page Header Title
*/
function softme_theme_page_header_title(){
	if( is_archive() )
	{
		echo '<h1>';
		if ( is_day() ) :
		/* translators: %1$s %2$s: date */	
		  printf( esc_html__( '%1$s %2$s', 'softme' ), esc_html__('Archives','softme'), get_the_date() );  
        elseif ( is_month() ) :
		/* translators: %1$s %2$s: month */	
		  printf( esc_html__( '%1$s %2$s', 'softme' ), esc_html__('Archives','softme'), get_the_date( 'F Y' ) );
        elseif ( is_year() ) :
		/* translators: %1$s %2$s: year */	
		  printf( esc_html__( '%1$s %2$s', 'softme' ), esc_html__('Archives','softme'), get_the_date( 'Y' ) );
		elseif( is_author() ):
		/* translators: %1$s %2$s: author */	
			printf( esc_html__( '%1$s %2$s', 'softme' ), esc_html__('All posts by','softme'), get_the_author() );
        elseif( is_category() ):
		/* translators: %1$s %2$s: category */	
			printf( esc_html__( '%1$s %2$s', 'softme' ), esc_html__('Category','softme'), single_cat_title( '', false ) );
		elseif( is_tag() ):
		/* translators: %1$s %2$s: tag */	
			printf( esc_html__( '%1$s %2$s', 'softme' ), esc_html__('Tag','softme'), single_tag_title( '', false ) );
		elseif( class_exists( 'WooCommerce' ) && is_shop() ):
		/* translators: %1$s %2$s: WooCommerce */	
			printf( esc_html__( '%1$s %2$s', 'softme' ), esc_html__('Shop','softme'), single_tag_title( '', false ));
        elseif( is_archive() ): 
		the_archive_title( '<h1>', '</h1>' ); 
		endif;
		echo '</h1>';
	}
	elseif( is_404() )
	{
		echo '<h1>';
		/* translators: %1$s: 404 */	
		printf( esc_html__( '%1$s ', 'softme' ) , esc_html__('404','softme') );
		echo '</h1>';
	}
	elseif( is_search() )
	{
		echo '<h1>';
		/* translators: %1$s %2$s: search */
		printf( esc_html__( '%1$s %2$s', 'softme' ), esc_html__('Search results for','softme'), get_search_query() );
		echo '</h1>';
	}
	else
	{
		echo '<h1>'.esc_html( get_the_title() ).'</h1>';
	}
}


/**
 * Theme Breadcrumbs Url
*/
function softme_page_url() {
	$page_url = 'http';
	if ( key_exists("HTTPS", $_SERVER) && ( $_SERVER["HTTPS"] == "on" ) ){
		$page_url .= "s";
	}
	$page_url .= "://";
	if ($_SERVER["SERVER_PORT"] != "80") {
		$page_url .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
	} else {
		$page_url .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
 }
 return $page_url;
}


/**
 * Theme Breadcrumbs
*/
if( !function_exists('softme_page_header_breadcrumbs') ):
	function softme_page_header_breadcrumbs() { 	
		global $post;
		$homeLink = home_url();
								
			if (is_home() || is_front_page()) :
				echo '<li class="breadcrumb-item"><a href="'.$homeLink.'">'.__('Home','softme').'</a></li>';
	            echo '<li class="breadcrumb-item active">'; echo single_post_title(); echo '</li>';
			else:
				echo '<li class="breadcrumb-item"><a href="'.$homeLink.'">'.__('Home','softme').'</a></li>';
				if ( is_category() ) {
				    echo '<li class="breadcrumb-item active"><a href="'. softme_page_url() .'">' . __('Archive by category','softme').' "' . single_cat_title('', false) . '"</a></li>';
				} elseif ( is_day() ) {
					echo '<li class="breadcrumb-item active"><a href="'. get_year_link(get_the_time('Y')) . '">'. get_the_time('Y') .'</a>';
					echo '<li class="breadcrumb-item active"><a href="'. get_month_link(get_the_time('Y'),get_the_time('m')) .'">'. get_the_time('F') .'</a>';
					echo '<li class="breadcrumb-item active"><a href="'. softme_page_url() .'">'. get_the_time('d') .'</a></li>';
				} elseif ( is_month() ) {
					echo '<li class="breadcrumb-item active"><a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a>';
					echo '<li class="breadcrumb-item active"><a href="'. softme_page_url() .'">'. get_the_time('F') .'</a></li>';
				} elseif ( is_year() ) {
				    echo '<li class="breadcrumb-item active"><a href="'. softme_page_url() .'">'. get_the_time('Y') .'</a></li>';
				} elseif ( is_single() && !is_attachment() && is_page('single-product') ) {					
				if ( get_post_type() != 'post' ) {
					$cat = get_the_category(); 
					$cat = $cat[0];
					echo '<li class="breadcrumb-item">';
					echo get_category_parents($cat, TRUE, '');
					echo '</li>';
					echo '<li class="breadcrumb-item active"><a href="' . softme_page_url() . '">'. get_the_title() .'</a></li>';
				} }  
					elseif ( is_page() && $post->post_parent ) {
				    $parent_id  = $post->post_parent;
					$breadcrumbs = array();
					while ($parent_id) {
						$page = get_page($parent_id);
						$breadcrumbs[] = '<li class="breadcrumb-item active"><a href="' . get_permalink($page->ID) . '">' . get_the_title($page->ID) . '</a>';
					$parent_id  = $page->post_parent;
					}
					$breadcrumbs = array_reverse($breadcrumbs);
					foreach ($breadcrumbs as $crumb) echo $crumb;
					    echo '<li class="breadcrumb-item active"><a href="' . softme_page_url() . '">'. get_the_title() .'</a></li>';
                    }
					elseif( is_search() )
					{
					    echo '<li class="breadcrumb-item active"><a href="' . softme_page_url() . '">'. get_search_query() .'</a></li>';
					}
					elseif( is_404() )
					{
						echo '<li class="breadcrumb-item active"><a href="' . softme_page_url() . '">'.__('Error 404','softme').'</a></li>';
					}
					else { 
					    echo '<li class="breadcrumb-item active"><a href="' . softme_page_url() . '">'. get_the_title() .'</a></li>';
					}
				endif;
        }
endif;

/*=========================================
Register Google fonts for SoftMe.
=========================================*/
function softme_google_fonts_url() {
	
    $font_families = array('Catamaran:wght@400;500;600;700;800;900');

	$fonts_url = add_query_arg( array(
		'family' => implode( '&family=', $font_families ),
		'display' => 'swap',
	), 'https://fonts.googleapis.com/css2' );

	require_once get_theme_file_path( 'inc/wptt-webfont-loader.php' );

	return wptt_get_webfont_url( esc_url_raw( $fonts_url ) );
}

function softme_google_fonts_scripts_styles() {
    wp_enqueue_style( 'softme-google-fonts', softme_google_fonts_url(), array(), null );
}
add_action( 'wp_enqueue_scripts', 'softme_google_fonts_scripts_styles' );


/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function softme_body_classes( $classes ) {
	// Adds a class of group-blog to blogs with more than 1 published author.
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}

	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	return $classes;
}
add_filter( 'body_class', 'softme_body_classes' );

function softme_post_classes( $classes ) {
	if ( is_single() ) : 
	$classes[]='single-post'; 
	endif;
	return $classes;
}
add_filter( 'post_class', 'softme_post_classes' );


if ( ! function_exists( 'wp_body_open' ) ) {
	/**
	 * Backward compatibility for wp_body_open hook.
	 *
	 * @since 1.0
	 */
	function wp_body_open() {
		do_action( 'wp_body_open' );
	}
}

if (!function_exists('softme_str_replace_assoc')) {

    /**
     * softme_str_replace_assoc
     * @param  array $replace
     * @param  array $subject
     * @return array
     */
    function softme_str_replace_assoc(array $replace, $subject) {
        return str_replace(array_keys($replace), array_values($replace), $subject);
    }
}

/*=========================================
SoftMe Site Preloader
=========================================*/
if ( ! function_exists( 'softme_site_preloader' ) ) :
function softme_site_preloader() {
	$softme_hs_preloader_option 	= get_theme_mod( 'softme_hs_preloader_option','1'); 
	if($softme_hs_preloader_option == '1') { 
	?>
		 <div id="dt_preloader" class="dt_preloader">
			<div class="dt_preloader-inner">
				<div class="dt_preloader-handle">
				<button type="button" class="dt_preloader-close site--close"></button>
					<div class="dt_preloader-animation">
						<div class="dt_preloader-spinner"></div>
						<div class="dt_preloader-text">
							<?php 
								$softme_preloader_string = get_bloginfo('name');
								//Using the explode method
								$softme_preloader_arr_string = str_split($softme_preloader_string);

								//foreach loop to display the returned array
								foreach($softme_preloader_arr_string as $str){
									echo sprintf(__('<span class="splitted" data-char=%1$s>%1$s</span>', 'softme'),$str);
								}
							?>
						</div>
						<p class="text-center"><?php esc_html_e('Loading','softme'); ?></p>
					</div>
				</div>
			</div>
		</div>
	<?php }
	} 
endif;
add_action( 'softme_site_preloader', 'softme_site_preloader' );



/*=========================================
SoftMe Site Header
=========================================*/
if ( ! function_exists( 'softme_site_main_header' ) ) :
function softme_site_main_header() {
		get_template_part('template-parts/site','header');
} 
endif;
add_action( 'softme_site_main_header', 'softme_site_main_header' );



/*=========================================
SoftMe Header Image
=========================================*/
if ( ! function_exists( 'softme_wp_hdr_image' ) ) :
function softme_wp_hdr_image() {
	if ( get_header_image() ) : ?>
	<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="custom-header" id="custom-header" rel="home">
		<img src="<?php echo esc_url(get_header_image()); ?>" width="<?php echo esc_attr( get_custom_header()->width ); ?>" height="<?php echo esc_attr( get_custom_header()->height ); ?>" alt="<?php echo esc_attr(get_bloginfo( 'title' )); ?>">
	</a>
<?php endif;
	} 
endif;
add_action( 'softme_wp_hdr_image', 'softme_wp_hdr_image' );



/*=========================================
SoftMe Site Navigation
=========================================*/
if ( ! function_exists( 'softme_site_header_navigation' ) ) :
function softme_site_header_navigation() {
	wp_nav_menu( 
		array(  
			'theme_location' => 'primary_menu',
			'container'  => '',
			'menu_class' => 'dt_navbar-mainmenu',
			'fallback_cb' => 'WP_Bootstrap_Navwalker::fallback',
			'walker' => new WP_Bootstrap_Navwalker()
			 ) 
		);
	} 
endif;
add_action( 'softme_site_header_navigation', 'softme_site_header_navigation' );



/*=========================================
SoftMe Site Search
=========================================*/
if ( ! function_exists( 'softme_site_main_search' ) ) :
function softme_site_main_search() {
	$softme_hs_hdr_search 	= get_theme_mod( 'softme_hs_hdr_search','1'); 
	$softme_search_result 	= get_theme_mod( 'softme_search_result','post');
	if($softme_hs_hdr_search=='1'):	
?>
<li class="dt_navbar-search-item">
	<button class="dt_navbar-search-toggle"><i class="fas fa-search" aria-hidden="true"></i></button>
	<div class="dt_search search--header">
		<form method="get" class="dt_search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>" aria-label="<?php esc_attr_e( 'search again', 'softme' ); ?>">
			<label for="dt_search-form-1">
				 <?php if($softme_search_result=='product' && class_exists('WooCommerce')):	?>
					<input type="hidden" name="post_type" value="product" />
				 <?php endif; ?>
				<span class="screen-reader-text"><?php esc_html_e( 'Search for:', 'softme' ); ?></span>
				<input type="search" id="dt_search-form-1" class="dt_search-field" placeholder="<?php esc_attr_e( 'search Here', 'softme' ); ?>" value="" name="s" />
			</label>
			<button type="submit" class="dt_search-submit search-submit"><i class="fas fa-search" aria-hidden="true"></i></button>
		</form>
		<button type="button" class="dt_search-close"><i class="fas fa-long-arrow-alt-up" aria-hidden="true"></i></button>
	</div>
</li>
<?php endif;
	} 
endif;
add_action( 'softme_site_main_search', 'softme_site_main_search' );



/*=========================================
SoftMe WooCommerce Cart
=========================================*/
if ( ! function_exists( 'softme_woo_cart' ) ) :
function softme_woo_cart() {
	$softme_hs_hdr_cart 	= get_theme_mod( 'softme_hs_hdr_cart','1'); 
	if($softme_hs_hdr_cart=='1' && class_exists( 'WooCommerce' )):	
	?>
	<li class="dt_navbar-cart-item">
		<a href="javascript:void(0);" class="dt_navbar-cart-icon">
			<span class="cart_icon">
				<i class="fas fa-shopping-cart" aria-hidden="true"></i>
			</span>
			<?php 
				$count = WC()->cart->cart_contents_count;
				
				if ( $count > 0 ) {
				?>
					 <strong class="cart_count"><?php echo esc_html( $count ); ?></strong>
				<?php 
				}
				else {
					?>
					<strong class="cart_count"><?php  esc_html_e('0','softme'); ?></strong>
					<?php 
				}
		?>
		</a>
		<div class="dt_navbar-shopcart">
			<?php get_template_part('woocommerce/cart/mini','cart'); ?>
		</div>
	</li>
	<?php endif; 
	} 
endif;
add_action( 'softme_woo_cart', 'softme_woo_cart' );


 /**
 * Add WooCommerce Cart Icon With Cart Count (https://isabelcastillo.com/woocommerce-cart-icon-count-theme-header)
 */
function softme_woo_add_to_cart_fragment( $fragments ) {
	
    ob_start();
    $count = WC()->cart->cart_contents_count; 
    ?> 
	<?php 
		$count = WC()->cart->cart_contents_count;
		
		if ( $count > 0 ) {
		?>
			 <strong class="cart_count"><?php echo esc_html( $count ); ?></strong>
		<?php 
		}
		else {
			?>
			<strong class="cart_count"><?php esc_html_e('0','softme'); ?></strong>
			<?php 
		}
	?>
	<?php
 
    $fragments['.cart_count'] = ob_get_clean();
     
    return $fragments;
}
add_filter( 'woocommerce_add_to_cart_fragments', 'softme_woo_add_to_cart_fragment' );


/*=========================================
SoftMe My Account
=========================================*/
if ( ! function_exists( 'softme_hdr_account' ) ) {
	function softme_hdr_account() {	
		$softme_hs_hdr_account 		= get_theme_mod( 'softme_hs_hdr_account','1');
		if($softme_hs_hdr_account=='1'): ?>
			<li class="dt_navbar-user-item">
				<?php if(is_user_logged_in()): ?>
					<a href="<?php echo esc_url(wp_logout_url( home_url())); ?>" class="dt_user_btn"><i class="fas fa-user"></i></a>
				<?php else: ?>
					<a href="<?php echo esc_url(wp_login_url( home_url())); ?>" class="dt_user_btn"><i class="fas fa-user"></i></a>
				<?php endif; ?>
			</li>
		<?php endif;
	}
}
add_action( 'softme_hdr_account', 'softme_hdr_account' );


/*=========================================
SoftMe Site Logo
=========================================*/
if ( ! function_exists( 'softme_site_logo' ) ) :
function softme_site_logo() {
		if(has_custom_logo())
			{	
				the_custom_logo();
			}
			else { 
			?>
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="site--title">
				<h4 class="site-title">
					<?php 
						echo esc_html(get_bloginfo('name'));
					?>
				</h4>
			</a>	
		<?php 						
			}
		?>
		<?php
			$softme_description = get_bloginfo( 'description');
			if ($softme_description) : ?>
				<p class="site-description"><?php echo esc_html($softme_description); ?></p>
		<?php endif;
	} 
endif;
add_action( 'softme_site_logo', 'softme_site_logo' );



/*=========================================
SoftMe Mobile Logo
=========================================*/
if ( ! function_exists( 'softme_site_mobile_logo' ) ) :
function softme_site_mobile_logo() {
		$softme_mobile_logo 	= get_theme_mod( 'softme_mobile_logo',esc_url(get_template_directory_uri() .'/assets/images/logo.png')); 
		if(!empty($softme_mobile_logo)){ ?>
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="custom-logo-link"><img  src="<?php echo esc_url( $softme_mobile_logo ); ?>" class="custom-logo"></a>
		<?php }else{ ?>
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="site--title">
				<h4 class="site-title">
					<?php 
						echo esc_html(get_bloginfo('name'));
					?>
				</h4>
			</a>	
		<?php } 
			$softme_description = get_bloginfo( 'description');
			if ($softme_description) : ?>
				<p class="site-description"><?php echo esc_html($softme_description); ?></p>
		<?php endif;
	} 
endif;
add_action( 'softme_site_mobile_logo', 'softme_site_mobile_logo' );


/*=========================================
SoftMe Footer Widget
=========================================*/
if ( ! function_exists( 'softme_footer_widget' ) ) :
function softme_footer_widget() {
	?>
	<div class="dt_footer_middle">
		<div class="pattern-layer">
			<div class="pattern-1"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/shape/white_curved_line.png"></div>
			<div class="pattern-2"></div>
		 </div>
		<div class="dt-container">
			<div class="dt-row dt-g-lg-4 dt-g-5">
				<?php if ( is_active_sidebar( 'softme-footer-widget-1' ) ) : ?>
					<div class="dt-col-lg-3 dt-col-sm-6 dt-col-12 wow fadeInUp animated" data-wow-delay="00ms" data-wow-duration="1500ms">
						<?php dynamic_sidebar( 'softme-footer-widget-1'); ?>
					</div>
				<?php endif; ?>
				
				<?php if ( is_active_sidebar( 'softme-footer-widget-2' ) ) : ?>
					<div class="dt-col-lg-3 dt-col-sm-6 dt-col-12 wow fadeInUp animated" data-wow-delay="100ms" data-wow-duration="1500ms">
						<?php dynamic_sidebar( 'softme-footer-widget-2'); ?>	
					</div>
				<?php endif; ?>
				
				<?php if ( is_active_sidebar( 'softme-footer-widget-3' ) ) : ?>
					<div class="dt-col-lg-3 dt-col-sm-6 dt-col-12 wow fadeInUp animated" data-wow-delay="200ms" data-wow-duration="1500ms">
						<?php dynamic_sidebar( 'softme-footer-widget-3'); ?>
					</div>
				<?php endif; ?>
				
				<?php if ( is_active_sidebar( 'softme-footer-widget-4' ) ) : ?>
					<div class="dt-col-lg-3 dt-col-sm-6 dt-col-12 wow fadeInUp animated" data-wow-delay="300ms" data-wow-duration="1500ms">
						<?php dynamic_sidebar( 'softme-footer-widget-4'); ?>
					</div>
				<?php endif; ?>	
			</div>
		</div>
	</div>
	<?php 
	 } 
endif;
add_action( 'softme_footer_widget', 'softme_footer_widget' );


/*=========================================
SoftMe Footer Bottom
=========================================*/
if ( ! function_exists( 'softme_footer_bottom' ) ) :
function softme_footer_bottom() {
	?>
	<div class="dt_footer_copyright">
		<div class="dt-container">
			<div class="dt-row dt-g-4 dt-mt-0">
				<div class="dt-col-md-12 dt-col-sm-12 dt-text-sm-center dt-text-center">
					<?php do_action('softme_footer_copyright_data'); ?>
				</div>
			</div>
		</div>
	</div>
	<?php
	} 
endif;
add_action( 'softme_footer_bottom', 'softme_footer_bottom' );

/*=========================================
SoftMe Footer Copyright
=========================================*/
if ( ! function_exists( 'softme_footer_copyright_data' ) ) :
function softme_footer_copyright_data() {
	$softme_footer_copyright_text = get_theme_mod('softme_footer_copyright_text','Copyright &copy; [current_year] [site_title] | Powered by [theme_author]');
	?>
	<?php if(!empty($softme_footer_copyright_text)): 
			$softme_copyright_allowed_tags = array(
				'[current_year]' => date_i18n('Y'),
				'[site_title]'   => get_bloginfo('name'),
				'[theme_author]' => sprintf(__('<a href="#">Desert Themes</a>', 'softme')),
			);
	?>
		<div class="dt_footer_copyright-text">
			<?php
				echo apply_filters('softme_footer_copyright', wp_kses_post(softme_str_replace_assoc($softme_copyright_allowed_tags, $softme_footer_copyright_text)));
			?>
		</div>
<?php endif;
	} 
endif;
add_action( 'softme_footer_copyright_data', 'softme_footer_copyright_data' );


/*=========================================
SoftMe Scroller
=========================================*/
if ( ! function_exists( 'softme_top_scroller' ) ) :
function softme_top_scroller() {
	$softme_hs_scroller_option	=	get_theme_mod('softme_hs_scroller_option','1');
?>		
	<?php if ($softme_hs_scroller_option == '1') { ?>
		<button type="button" id="dt_uptop" class="dt_uptop">
			<svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
				<path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" style="transition: stroke-dashoffset 10ms linear 0s; stroke-dasharray: 307.919, 307.919; stroke-dashoffset: -0.0171453;"></path>
			</svg>
		</button>
	<?php }
	} 
endif;
add_action( 'softme_top_scroller', 'softme_top_scroller' );