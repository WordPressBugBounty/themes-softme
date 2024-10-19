<?php
function softme_header_customize_settings( $wp_customize ) {
$selective_refresh = isset( $wp_customize->selective_refresh ) ? 'postMessage' : 'refresh';
	/*=========================================
	Header Settings Panel
	=========================================*/
	$wp_customize->add_panel( 
		'header_options', 
		array(
			'priority'      => 2,
			'capability'    => 'edit_theme_options',
			'title'			=> __('Header Options', 'softme'),
		) 
	);
	
	/*=========================================
	SoftMe Site Identity
	=========================================*/
	$wp_customize->add_section(
        'title_tagline',
        array(
        	'priority'      => 1,
            'title' 		=> __('Site Identity','softme'),
			'panel'  		=> 'header_options',
		)
    );
	
	// Logo Width // 
	if ( class_exists( 'SoftMe_Customizer_Range_Control' ) ) {
		$wp_customize->add_setting(
			'hdr_logo_size',
			array(
				'default'			=> '150',
				'capability'     	=> 'edit_theme_options',
				'sanitize_callback' => 'softme_sanitize_range_value',
				'transport'         => 'postMessage',
			)
		);
		$wp_customize->add_control( 
		new SoftMe_Customizer_Range_Control( $wp_customize, 'hdr_logo_size', 
			array(
				'label'      => __( 'Logo Size', 'softme' ),
				'section'  => 'title_tagline',
				 'media_query'   => true,
					'input_attr'    => array(
						'mobile'  => array(
							'min'           => 0,
							'max'           => 500,
							'step'          => 1,
							'default_value' => 150,
						),
						'tablet'  => array(
							'min'           => 0,
							'max'           => 500,
							'step'          => 1,
							'default_value' => 150,
						),
						'desktop' => array(
							'min'           => 0,
							'max'           => 500,
							'step'          => 1,
							'default_value' => 150,
						),
					),
			) ) 
		);
	} 
	
	/*=========================================
	Header Navigation
	=========================================*/	
	$wp_customize->add_section(
        'softme_hdr_nav',
        array(
        	'priority'      => 4,
            'title' 		=> __('Navigation Bar','softme'),
			'panel'  		=> 'header_options',
		)
    );
	
	/*=========================================
	SoftMe Mobile Logo
	=========================================*/
	$wp_customize->add_setting(
		'softme_mobile_logo_head'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'softme_sanitize_text',
			'priority' => 1,
		)
	);

	$wp_customize->add_control(
	'softme_mobile_logo_head',
		array(
			'type' => 'hidden',
			'label' => __('Mobile Logo','softme'),
			'section' => 'softme_hdr_nav',
		)
	);
	
	// Logo // 
    $wp_customize->add_setting( 
    	'softme_mobile_logo' , 
    	array(
			'default' 			=> esc_url(get_template_directory_uri() .'/assets/images/logo.png'),
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'softme_sanitize_url',	
			'priority' => 1,
		) 
	);
	
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize , 'softme_mobile_logo' ,
		array(
			'label'          => esc_html__( 'Mobile Logo', 'softme'),
			'section'        => 'softme_hdr_nav',
		) 
	));
	
	/*=========================================
	Header Cart
	=========================================*/	
	$wp_customize->add_setting(
		'softme_hdr_cart'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'softme_sanitize_text',
			'priority' => 1,
		)
	);

	$wp_customize->add_control(
	'softme_hdr_cart',
		array(
			'type' => 'hidden',
			'label' => __('WooCommerce Cart','softme'),
			'section' => 'softme_hdr_nav',
		)
	);
	
	
	$wp_customize->add_setting( 
		'softme_hs_hdr_cart' , 
			array(
			'default' => '1',
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'softme_sanitize_checkbox',
			'priority' => 2,
		) 
	);
	
	$wp_customize->add_control(
	'softme_hs_hdr_cart', 
		array(
			'label'	      => esc_html__( 'Hide/Show ?', 'softme' ),
			'section'     => 'softme_hdr_nav',
			'type'        => 'checkbox'
		) 
	);	
	
	
	/*=========================================
	Header Account
	=========================================*/	
	$wp_customize->add_setting(
		'softme_hdr_account'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'softme_sanitize_text',
			'priority' => 1,
		)
	);

	$wp_customize->add_control(
	'softme_hdr_account',
		array(
			'type' => 'hidden',
			'label' => __('My Account','softme'),
			'section' => 'softme_hdr_nav',
		)
	);
	
	
	$wp_customize->add_setting( 
		'softme_hs_hdr_account' , 
			array(
			'default' => '1',
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'softme_sanitize_checkbox',
			'priority' => 2,
		) 
	);
	
	$wp_customize->add_control(
	'softme_hs_hdr_account', 
		array(
			'label'	      => esc_html__( 'Hide/Show ?', 'softme' ),
			'section'     => 'softme_hdr_nav',
			'type'        => 'checkbox'
		) 
	);	
	
	/*=========================================
	Header Search
	=========================================*/	
	$wp_customize->add_setting(
		'softme_hdr_search'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'softme_sanitize_text',
			'priority' => 3,
		)
	);

	$wp_customize->add_control(
	'softme_hdr_search',
		array(
			'type' => 'hidden',
			'label' => __('Site Search','softme'),
			'section' => 'softme_hdr_nav',
		)
	);
	$wp_customize->add_setting( 
		'softme_hs_hdr_search' , 
			array(
			'default' => '1',
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'softme_sanitize_checkbox',
			'priority' => 4,
		) 
	);
	
	$wp_customize->add_control(
	'softme_hs_hdr_search', 
		array(
			'label'	      => esc_html__( 'Hide/Show ?', 'softme' ),
			'section'     => 'softme_hdr_nav',
			'type'        => 'checkbox'
		) 
	);	
	
	/*=========================================
	Sticky Header
	=========================================*/	
	$wp_customize->add_section(
        'softme_sticky_header_set',
        array(
        	'priority'      => 4,
            'title' 		=> __('Header Sticky','softme'),
			'panel'  		=> 'header_options',
		)
    );
	
	// Heading
	$wp_customize->add_setting(
		'softme_hdr_sticky'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'softme_sanitize_text',
			'priority' => 1,
		)
	);

	$wp_customize->add_control(
	'softme_hdr_sticky',
		array(
			'type' => 'hidden',
			'label' => __('Sticky Header','softme'),
			'section' => 'softme_sticky_header_set',
		)
	);
	$wp_customize->add_setting( 
		'softme_hs_hdr_sticky' , 
			array(
			'default' => '1',
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'softme_sanitize_checkbox',
			'priority' => 2,
		) 
	);
	
	$wp_customize->add_control(
	'softme_hs_hdr_sticky', 
		array(
			'label'	      => esc_html__( 'Hide/Show ?', 'softme' ),
			'section'     => 'softme_sticky_header_set',
			'type'        => 'checkbox'
		) 
	);	
}
add_action( 'customize_register', 'softme_header_customize_settings' );