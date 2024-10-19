<?php
function softme_site_selective_partials( $wp_customize ){	
	// softme_hdr_btn_lbl
	$wp_customize->selective_refresh->add_partial( 'softme_hdr_btn_lbl', array(
		'selector'            => '.dt_header .dt_navbar-button-item .dt-btn',
		'settings'            => 'softme_hdr_btn_lbl',
		'render_callback'  => 'softme_hdr_btn_lbl_render_callback',
	) );
	
	// softme_hdr_contact_ttl
	$wp_customize->selective_refresh->add_partial( 'softme_hdr_contact_ttl', array(
		'selector'            => '.dt_header .dt_navbar-info-contact .contact__body.one .title',
		'settings'            => 'softme_hdr_contact_ttl',
		'render_callback'  => 'softme_hdr_contact_ttl_render_callback',
	) );
	
	// softme_hdr_contact_txt
	$wp_customize->selective_refresh->add_partial( 'softme_hdr_contact_txt', array(
		'selector'            => '.dt_header .dt_navbar-info-contact .contact__body.one .description',
		'settings'            => 'softme_hdr_contact_txt',
		'render_callback'  => 'softme_hdr_contact_txt_render_callback',
	) );
	
	// softme_hdr_contact_ttl2
	$wp_customize->selective_refresh->add_partial( 'softme_hdr_contact_ttl2', array(
		'selector'            => '.dt_header .dt_navbar-info-contact .contact__body.two .title',
		'settings'            => 'softme_hdr_contact_ttl2',
		'render_callback'  => 'softme_hdr_contact_ttl2_render_callback',
	) );
	
	// softme_hdr_contact_txt2
	$wp_customize->selective_refresh->add_partial( 'softme_hdr_contact_txt2', array(
		'selector'            => '.dt_header .dt_navbar-info-contact .contact__body.two .description',
		'settings'            => 'softme_hdr_contact_txt2',
		'render_callback'  => 'softme_hdr_contact_txt2_render_callback',
	) );
	
	// softme_hdr_contact_ttl3
	$wp_customize->selective_refresh->add_partial( 'softme_hdr_contact_ttl3', array(
		'selector'            => '.dt_header .dt_navbar-info-contact .contact__body.three .title',
		'settings'            => 'softme_hdr_contact_ttl3',
		'render_callback'  => 'softme_hdr_contact_ttl3_render_callback',
	) );
	
	// softme_hdr_contact_txt3
	$wp_customize->selective_refresh->add_partial( 'softme_hdr_contact_txt3', array(
		'selector'            => '.dt_header .dt_navbar-info-contact .contact__body.three .description',
		'settings'            => 'softme_hdr_contact_txt3',
		'render_callback'  => 'softme_hdr_contact_txt3_render_callback',
	) );
	
	// softme_footer_copyright_text
	$wp_customize->selective_refresh->add_partial( 'softme_footer_copyright_text', array(
		'selector'            => '.dt_footer_copyright-text',
		'settings'            => 'softme_footer_copyright_text',
		'render_callback'  => 'softme_footer_copyright_text_render_callback',
	) );	
	}
add_action( 'customize_register', 'softme_site_selective_partials' );