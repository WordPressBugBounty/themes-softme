<?php
function softme_theme_options_customize( $wp_customize ) {
$selective_refresh = isset( $wp_customize->selective_refresh ) ? 'postMessage' : 'refresh';
	$wp_customize->add_panel(
		'softme_theme_options', array(
			'priority' => 31,
			'title' => esc_html__( 'Theme Options', 'softme' ),
		)
	);
	
	/*=========================================
	General Options
	=========================================*/
	$wp_customize->add_section(
		'site_general_options', array(
			'title' => esc_html__( 'General Options', 'softme' ),
			'priority' => 1,
			'panel' => 'softme_theme_options',
		)
	);
	
	
	/*=========================================
	Preloader
	=========================================*/
	// Heading
	$wp_customize->add_setting(
		'softme_preloader_option'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'softme_sanitize_text',
			'priority' => 1,
		)
	);

	$wp_customize->add_control(
	'softme_preloader_option',
		array(
			'type' => 'hidden',
			'label' => __('Site Preloader','softme'),
			'section' => 'site_general_options',
		)
	);
	
	
	// Hide/ Show
	$wp_customize->add_setting( 
		'softme_hs_preloader_option' , 
			array(
			'default' => '1',
			'sanitize_callback' => 'softme_sanitize_checkbox',
			'capability' => 'edit_theme_options',
			'priority' => 1,
		) 
	);
	
	$wp_customize->add_control(
	'softme_hs_preloader_option', 
		array(
			'label'	      => esc_html__( 'Hide / Show Preloader', 'softme' ),
			'section'     => 'site_general_options',
			'type'        => 'checkbox'
		) 
	);
	
	/*=========================================
	Scroller
	=========================================*/
	// Heading
	$wp_customize->add_setting(
		'softme_scroller_option'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'softme_sanitize_text',
			'priority' => 3,
		)
	);

	$wp_customize->add_control(
	'softme_scroller_option',
		array(
			'type' => 'hidden',
			'label' => __('Top Scroller','softme'),
			'section' => 'site_general_options',
		)
	);
	
	// Hide/show
	$wp_customize->add_setting( 
		'softme_hs_scroller_option' , 
			array(
			'default' => '1',
			'sanitize_callback' => 'softme_sanitize_checkbox',
			'capability' => 'edit_theme_options',
			'priority' => 4,
		) 
	);
	
	$wp_customize->add_control(
	'softme_hs_scroller_option', 
		array(
			'label'	      => esc_html__( 'Hide / Show Scroller', 'softme' ),
			'section'     => 'site_general_options',
			'type'        => 'checkbox'
		) 
	);
	
	/*=========================================
	SoftMe Container
	=========================================*/
	// Heading
	$wp_customize->add_setting(
		'softme_site_container_option'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'softme_sanitize_text',
			'priority' => 6,
		)
	);

	$wp_customize->add_control(
	'softme_site_container_option',
		array(
			'type' => 'hidden',
			'label' => __('Site Container','softme'),
			'section' => 'site_general_options',
		)
	);
	
	if ( class_exists( 'SoftMe_Customizer_Range_Control' ) ) {
		//container width
		$wp_customize->add_setting(
			'softme_site_container_width',
			array(
				'default'			=> '1252',
				'capability'     	=> 'edit_theme_options',
				'sanitize_callback' => 'softme_sanitize_range_value',
				'transport'         => 'postMessage',
				'priority'      => 6,
			)
		);
		$wp_customize->add_control( 
		new SoftMe_Customizer_Range_Control( $wp_customize, 'softme_site_container_width', 
			array(
				'label'      => __( 'Container Width', 'softme' ),
				'section'  => 'site_general_options',
				 'media_query'   => false,
                'input_attr'    => array(
                    'desktop' => array(
                        'min'           => 768,
                        'max'           => 2000,
                        'step'          => 1,
                        'default_value' => 1252,
                    ),
                ),
			) ) 
		);
	}
	
	/*=========================================
	SoftMe Search Result
	=========================================*/
	
	//  Head // 
	$wp_customize->add_setting(
		'softme_search_result_head'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'softme_sanitize_text',
			'priority' => 7,
		)
	);

	$wp_customize->add_control(
	'softme_search_result_head',
		array(
			'type' => 'hidden',
			'label' => __('Search Result','softme'),
			'section' => 'site_general_options',
		)
	);
	
	//  Style
	$wp_customize->add_setting( 
		'softme_search_result' , 
			array(
			'default' => 'post',
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'softme_sanitize_select',
			'priority' => 8,
		) 
	);

	$wp_customize->add_control(
	'softme_search_result' , 
		array(
			'label'          => __( 'Search Result Page will Show ?', 'softme' ),
			'section'        => 'site_general_options',
			'type'           => 'select',
			'choices'        => 
			array(
				'post' 	=> __( 'Posts', 'softme' ),
				'product' 	=> __( 'WooCommerce Products', 'softme' ),
			) 
		) 
	);
	/*=========================================
	Breadcrumb  Section
	=========================================*/
	$wp_customize->add_section(
		'softme_site_breadcrumb', array(
			'title' => esc_html__( 'Site Breadcrumb', 'softme' ),
			'priority' => 12,
			'panel' => 'softme_theme_options',
		)
	);
	
	// Heading
	$wp_customize->add_setting(
		'softme_site_breadcrumb_option'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'softme_sanitize_text',
			'priority' => 1,
		)
	);

	$wp_customize->add_control(
	'softme_site_breadcrumb_option',
		array(
			'type' => 'hidden',
			'label' => __('Settings','softme'),
			'section' => 'softme_site_breadcrumb',
		)
	);
	
	// Breadcrumb Hide/ Show Setting // 
	$wp_customize->add_setting( 
		'softme_hs_site_breadcrumb' , 
			array(
			'default' => '1',
			'sanitize_callback' => 'softme_sanitize_checkbox',
			'capability' => 'edit_theme_options',
			'priority' => 2,
		) 
	);
	
	$wp_customize->add_control(
	'softme_hs_site_breadcrumb', 
		array(
			'label'	      => esc_html__( 'Hide / Show Section', 'softme' ),
			'section'     => 'softme_site_breadcrumb',
			'type'        => 'checkbox'
		) 
	);
	
	// Breadcrumb Content Section // 
	$wp_customize->add_setting(
		'softme_site_breadcrumb_content'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'softme_sanitize_text',
			'priority' => 5,
		)
	);

	$wp_customize->add_control(
	'softme_site_breadcrumb_content',
		array(
			'type' => 'hidden',
			'label' => __('Content','softme'),
			'section' => 'softme_site_breadcrumb',
		)
	);
	
	
	// Type
	$wp_customize->add_setting( 
		'softme_breadcrumb_type' , 
			array(
			'default' => 'theme',
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'softme_sanitize_select',
			'priority' => 5,
		) 
	);

	$wp_customize->add_control(
	'softme_breadcrumb_type' , 
		array(
			'label'          => __( 'Select Breadcrumb Type', 'softme' ),
			'description'          => __( 'You need to install and activate the respected plugin to show their Breadcrumb. Otherwise, your default theme Breadcrumb will appear. If you see error in search console, then we recommend to use Theme Breadcrumb.', 'softme' ),
			'section'        => 'softme_site_breadcrumb',
			'type'           => 'select',
			'choices'        => 
			array(
				'theme' 	=> __( 'Theme Default', 'softme' ),
				'yoast' 	=> __( 'Yoast Plugin', 'softme' ),
				'rankmath' 	=> __( 'Rank Math Plugin', 'softme' ),
				'navxt' 	=> __( 'NavXT Plugin', 'softme' ),
			) 
		) 
	);
	
	// Height // 
	$wp_customize->add_setting(
    	'softme_breadcrumb_height_option',
    	array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'softme_sanitize_range_value',
			'transport'         => 'postMessage',
			'priority' => 8,
		)
	);
	$wp_customize->add_control( 
		new SoftMe_Customizer_Range_Control( $wp_customize, 'softme_breadcrumb_height_option', 
			array(
				'label'      => __( 'Top/Bottom Padding', 'softme'),
				'section'  => 'softme_site_breadcrumb',
				'media_query'   => true,
				'input_attr'    => array(
					'mobile'  => array(
						'min'           => 0,
						'max'           => 20,
						'step'          => 1,
						'default_value' => 12,
					),
					'tablet'  => array(
						'min'           => 0,
						'max'           => 20,
						'step'          => 1,
						'default_value' => 12,
					),
					'desktop' => array(
						'min'           => 0,
						'max'           => 20,
						'step'          => 1,
						'default_value' => 12,
					),
				),
			) ) 
		);
		
	// Background // 
	$wp_customize->add_setting(
		'softme_breadcrumb_bg_options'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'softme_sanitize_text',
			'priority' => 9,
		)
	);

	$wp_customize->add_control(
	'softme_breadcrumb_bg_options',
		array(
			'type' => 'hidden',
			'label' => __('Background','softme'),
			'section' => 'softme_site_breadcrumb',
		)
	);
	
	// Background Image // 
    $wp_customize->add_setting( 
    	'softme_breadcrumb_bg_img' , 
    	array(
			'default' 			=> esc_url(get_template_directory_uri() .'/assets/images/background/page_title.jpg'),
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'softme_sanitize_url',	
			'priority' => 10,
		) 
	);
	
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize , 'softme_breadcrumb_bg_img' ,
		array(
			'label'          => esc_html__( 'Background Image', 'softme'),
			'section'        => 'softme_site_breadcrumb',
		) 
	));
	
	// Opacity // 
	if ( class_exists( 'SoftMe_Customizer_Range_Control' ) ) {
	$wp_customize->add_setting(
    	'softme_breadcrumb_img_opacity',
    	array(
	        'default'			=> '0.5',
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'softme_sanitize_range_value',
			'priority'  => 11,
		)
	);
	$wp_customize->add_control( 
	new SoftMe_Customizer_Range_Control( $wp_customize, 'softme_breadcrumb_img_opacity', 
		array(
			'label'      => __( 'Opacity', 'softme'),
			'section'  => 'softme_site_breadcrumb',
			 'media_query'   => false,
                'input_attr'    => array(
                    'desktop' => array(
                        'min'           => 0,
                        'max'           => 1,
                        'step'          => 0.1,
                        'default_value' => 0.5,
                    ),
                ),
		) ) 
	);
	}
	
	$wp_customize->add_setting(
	'softme_breadcrumb_opacity_color', 
	array(
		'default' => '#000',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_hex_color',
		'priority'  => 12,
    ));
	
	$wp_customize->add_control( 
		new WP_Customize_Color_Control
		($wp_customize, 
			'softme_breadcrumb_opacity_color', 
			array(
				'label'      => __( 'Opacity Color', 'softme'),
				'section'    => 'softme_site_breadcrumb',
			) 
		) 
	);
	
	
	
	/*=========================================
	SoftMe Sidebar
	=========================================*/
	$wp_customize->add_section(
        'softme_sidebar_options',
        array(
        	'priority'      => 8,
            'title' 		=> __('Sidebar Options','softme'),
			'panel'  		=> 'softme_theme_options',
		)
    );
	
	//  Pages Layout // 
	$wp_customize->add_setting(
		'softme_pages_sidebar_option'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'softme_sanitize_text',
			'priority' => 1,
		)
	);

	$wp_customize->add_control(
	'softme_pages_sidebar_option',
		array(
			'type' => 'hidden',
			'label' => __('Sidebar Layout','softme'),
			'section' => 'softme_sidebar_options',
		)
	);
	
	// Default Page
	$wp_customize->add_setting( 
		'softme_default_pg_sidebar_option' , 
			array(
			'default' => 'right_sidebar',
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'softme_sanitize_select',
			'priority' => 2,
		) 
	);

	$wp_customize->add_control(
	'softme_default_pg_sidebar_option' , 
		array(
			'label'          => __( 'Default Page Sidebar Option', 'softme' ),
			'section'        => 'softme_sidebar_options',
			'type'           => 'select',
			'choices'        => 
			array(
				'left_sidebar' 	=> __( 'Left Sidebar', 'softme' ),
				'right_sidebar' 	=> __( 'Right Sidebar', 'softme' ),
				'no_sidebar' 	=> __( 'No Sidebar', 'softme' ),
			) 
		) 
	);
	
	// Archive Page
	$wp_customize->add_setting( 
		'softme_archive_pg_sidebar_option' , 
			array(
			'default' => 'right_sidebar',
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'softme_sanitize_select',
			'priority' => 3,
		) 
	);

	$wp_customize->add_control(
	'softme_archive_pg_sidebar_option' , 
		array(
			'label'          => __( 'Archive Page Sidebar Option', 'softme' ),
			'section'        => 'softme_sidebar_options',
			'type'           => 'select',
			'choices'        => 
			array(
				'left_sidebar' 	=> __( 'Left Sidebar', 'softme' ),
				'right_sidebar' => __( 'Right Sidebar', 'softme' ),
				'no_sidebar' 	=> __( 'No Sidebar', 'softme' ),
			) 
		) 
	);
	
	
	// Single Page
	$wp_customize->add_setting( 
		'softme_single_pg_sidebar_option' , 
			array(
			'default' => 'right_sidebar',
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'softme_sanitize_select',
			'priority' => 4,
		) 
	);

	$wp_customize->add_control(
	'softme_single_pg_sidebar_option' , 
		array(
			'label'          => __( 'Single Page Sidebar Option', 'softme' ),
			'section'        => 'softme_sidebar_options',
			'type'           => 'select',
			'choices'        => 
			array(
				'left_sidebar' 	=> __( 'Left Sidebar', 'softme' ),
				'right_sidebar' => __( 'Right Sidebar', 'softme' ),
				'no_sidebar' 	=> __( 'No Sidebar', 'softme' ),
			) 
		) 
	);
	
	
	// Blog Page
	$wp_customize->add_setting( 
		'softme_blog_pg_sidebar_option' , 
			array(
			'default' => 'right_sidebar',
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'softme_sanitize_select',
			'priority' => 5,
		) 
	);

	$wp_customize->add_control(
	'softme_blog_pg_sidebar_option' , 
		array(
			'label'          => __( 'Blog Page Sidebar Option', 'softme' ),
			'section'        => 'softme_sidebar_options',
			'type'           => 'select',
			'choices'        => 
			array(
				'left_sidebar' 	=> __( 'Left Sidebar', 'softme' ),
				'right_sidebar' => __( 'Right Sidebar', 'softme' ),
				'no_sidebar' 	=> __( 'No Sidebar', 'softme' ),
			) 
		) 
	);
	
	// Search Page
	$wp_customize->add_setting( 
		'softme_search_pg_sidebar_option' , 
			array(
			'default' => 'right_sidebar',
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'softme_sanitize_select',
			'priority' => 5,
		) 
	);

	$wp_customize->add_control(
	'softme_search_pg_sidebar_option' , 
		array(
			'label'          => __( 'Search Page Sidebar Option', 'softme' ),
			'section'        => 'softme_sidebar_options',
			'type'           => 'select',
			'choices'        => 
			array(
				'left_sidebar' 	=> __( 'Left Sidebar', 'softme' ),
				'right_sidebar' => __( 'Right Sidebar', 'softme' ),
				'no_sidebar' 	=> __( 'No Sidebar', 'softme' ),
			) 
		) 
	);
	
	
	// WooCommerce Page
	$wp_customize->add_setting( 
		'softme_shop_pg_sidebar_option' , 
			array(
			'default' => 'right_sidebar',
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'softme_sanitize_select',
			'priority' => 6,
		) 
	);

	$wp_customize->add_control(
	'softme_shop_pg_sidebar_option' , 
		array(
			'label'          => __( 'WooCommerce Page Sidebar Option', 'softme' ),
			'section'        => 'softme_sidebar_options',
			'type'           => 'select',
			'choices'        => 
			array(
				'left_sidebar' 	=> __( 'Left Sidebar', 'softme' ),
				'right_sidebar' => __( 'Right Sidebar', 'softme' ),
				'no_sidebar' 	=> __( 'No Sidebar', 'softme' ),
			) 
		) 
	);
	
	// Company Page
	$wp_customize->add_setting( 
		'softme_company_pg_sidebar_option' , 
			array(
			'default' => 'right_sidebar',
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'softme_sanitize_select',
			'priority' => 6,
		) 
	);

	$wp_customize->add_control(
	'softme_company_pg_sidebar_option' , 
		array(
			'label'          => __( 'Company Page Sidebar Option', 'softme' ),
			'section'        => 'softme_sidebar_options',
			'type'           => 'select',
			'choices'        => 
			array(
				'left_sidebar' 	=> __( 'Left Sidebar', 'softme' ),
				'right_sidebar' => __( 'Right Sidebar', 'softme' ),
				'no_sidebar' 	=> __( 'No Sidebar', 'softme' ),
			) 
		) 
	);
	
	// Upgrade
	if ( class_exists( 'Desert_Companion_Customize_Upgrade_Control' ) ) {
		$wp_customize->add_setting(
		'softme_sidebar_option_upsale', 
		array(
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field',
			'priority' => 7,
		));
		
		$wp_customize->add_control( 
			new Desert_Companion_Customize_Upgrade_Control
			($wp_customize, 
				'softme_sidebar_option_upsale', 
				array(
					'label'      => __( 'Sidebar Features', 'softme' ),
					'section'    => 'softme_sidebar_options'
				) 
			) 
		);	
	}
	
	// Widget options
	$wp_customize->add_setting(
		'sidebar_options'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'softme_sanitize_text',
			'priority'  => 6
		)
	);

	$wp_customize->add_control(
	'sidebar_options',
		array(
			'type' => 'hidden',
			'label' => __('Options','softme'),
			'section' => 'softme_sidebar_options',
		)
	);
	// Sidebar Width 
	if ( class_exists( 'Softme_Customizer_Range_Control' ) ) {
		$wp_customize->add_setting(
			'softme_sidebar_width',
			array(
				'default'	      => esc_html__( '33', 'softme' ),
				'capability'     	=> 'edit_theme_options',
				'sanitize_callback' => 'softme_sanitize_range_value',
				'transport'         => 'postMessage',
				'priority'  => 7
			)
		);
		$wp_customize->add_control( 
		new Softme_Customizer_Range_Control( $wp_customize, 'softme_sidebar_width', 
			array(
				'label'      => __( 'Sidebar Width', 'softme' ),
				'section'  => 'softme_sidebar_options',
				 'media_query'   => false,
					'input_attr'    => array(
						'desktop' => array(
							'min'           => 25,
							'max'           => 50,
							'step'          => 1,
							'default_value' => 33,
						),
					),
			) ) 
		);
	}
	
	
}
add_action( 'customize_register', 'softme_theme_options_customize' );