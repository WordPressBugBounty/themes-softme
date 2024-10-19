/**
 * File customizer.js.
 *
 * Theme Customizer enhancements for a better user experience.
 *
 * Contains handlers to make Theme Customizer preview reload changes asynchronously.
 */

( function( $ ) {

	/**
     * Outputs custom css for responsive controls
     * @param  {[string]} setting customizer setting
     * @param  {[string]} css_selector
     * @param  {[array]} css_prop css property to write
     * @param  {String} ext css value extension eg: px, in
     * @return {[string]} css output
     */
    function range_live_media_load( setting, css_selector, css_prop, ext = '' ) {
        wp.customize(
            setting, function( value ) {
                'use strict';
                value.bind(
                    function( to ){
                        var values          = JSON.parse( to );
                        var desktop_value   = JSON.parse( values.desktop );
                        var tablet_value    = JSON.parse( values.tablet );
                        var mobile_value    = JSON.parse( values.mobile );

                        var class_name      = 'customizer-' + setting;
                        var css_class       = $( '.' + class_name );
                        var selector_name   = css_selector;
                        var property_name   = css_prop;

                        var desktop_css     = '';
                        var tablet_css      = '';
                        var mobile_css      = '';

                        if ( property_name.length == 1 ) {
                            var desktop_css     = property_name[0] + ': ' + desktop_value + ext + ';';
                            var tablet_css      = property_name[0] + ': ' + tablet_value + ext + ';';
                            var mobile_css      = property_name[0] + ': ' + mobile_value + ext + ';';
                        } else if ( property_name.length == 2 ) {
                            var desktop_css     = property_name[0] + ': ' + desktop_value + ext + ';';
                            var desktop_css     = desktop_css + property_name[1] + ': ' + desktop_value + ext + ';';

                            var tablet_css      = property_name[0] + ': ' + tablet_value + ext + ';';
                            var tablet_css      = tablet_css + property_name[1] + ': ' + tablet_value + ext + ';';

                            var mobile_css      = property_name[0] + ': ' + mobile_value + ext + ';';
                            var mobile_css      = mobile_css + property_name[1] + ': ' + mobile_value + ext + ';';
                        }

                        var head_append     = '<style class="' + class_name + '">@media (min-width: 320px){ ' + selector_name + ' { ' + mobile_css + ' } } @media (min-width: 720px){ ' + selector_name + ' { ' + tablet_css + ' } } @media (min-width: 960px){ ' + selector_name + ' { ' + desktop_css + ' } }</style>';

                        if ( css_class.length ) {
                            css_class.replaceWith( head_append );
                        } else {
                            $( "head" ).append( head_append );
                        }
                    }
                );
            }
        );
    }
	// Site title and description.
	wp.customize( 'blogname', function( value ) {
		value.bind( function( to ) {
			$( '.site-title' ).text( to );
		} );
	} );
	wp.customize( 'blogdescription', function( value ) {
		value.bind( function( to ) {
			$( '.site-description' ).text( to );
		} );
	} );

	// Header text color.
	wp.customize( 'header_textcolor', function( value ) {
		value.bind( function( to ) {
			if ( 'blank' === to ) {
				$( '.site-title, .site-description' ).css( {
					'clip': 'rect(1px, 1px, 1px, 1px)',
					'position': 'absolute'
				} );
			} else {
				$( '.site-title, .site-description' ).css( {
					'clip': 'auto',
					'position': 'relative'
				} );
				$( '.site-title, .site-description' ).css( {
					'color': to
				} );
			}
		} );
	} );
	
	$(document).ready(function ($) {
        $('input[data-input-type]').on('input change', function () {
            var val = $(this).val();
            $(this).prev('.cs-range-value').html(val);
            $(this).val(val);
        });
    })

	/**
	 * hdr_logo_size
	 */
	range_live_media_load( 'hdr_logo_size', '.site--logo img', [ 'max-width' ], 'px !important' );
	
	//softme_hdr_left_ttl
	wp.customize(
		'softme_hdr_left_ttl', function( value ) {
			value.bind(
				function( newval ) {
					$( '.dt_header .dt_header-topbar .widget_text.left strong.dt-mr-1' ).text( newval );
				}
			);
		}
	);
	
	//softme_hdr_email_title
	wp.customize(
		'softme_hdr_email_title', function( value ) {
			value.bind(
				function( newval ) {
					$( '.dt_header .dt_header-topbar .widget_contact.email .contact__body .title a' ).text( newval );
				}
			);
		}
	);
	
	//softme_hdr_top_ads_title
	wp.customize(
		'softme_hdr_top_ads_title', function( value ) {
			value.bind(
				function( newval ) {
					$( '.dt_header .dt_header-topbar .widget_contact.address .contact__body  h6' ).text( newval );
				}
			);
		}
	);
	
	//softme_hdr_btn_lbl
	wp.customize(
		'softme_hdr_btn_lbl', function( value ) {
			value.bind(
				function( newval ) {
					$( '.dt_header .dt_navbar-button-item .dt-btn' ).text( newval );
				}
			);
		}
	);
	
	//softme_hdr_contact_ttl
	wp.customize(
		'softme_hdr_contact_ttl', function( value ) {
			value.bind(
				function( newval ) {
					$( '.dt_header .dt_navbar-info-contact .contact__body.one .title' ).text( newval );
				}
			);
		}
	);
	
	//softme_hdr_contact_txt
	wp.customize(
		'softme_hdr_contact_txt', function( value ) {
			value.bind(
				function( newval ) {
					$( '.dt_header .dt_navbar-info-contact .contact__body.one .description' ).text( newval );
				}
			);
		}
	);
	
	//softme_hdr_contact_ttl2
	wp.customize(
		'softme_hdr_contact_ttl2', function( value ) {
			value.bind(
				function( newval ) {
					$( '.dt_header .dt_navbar-info-contact .contact__body.two .title' ).text( newval );
				}
			);
		}
	);
	
	//softme_hdr_contact_txt2
	wp.customize(
		'softme_hdr_contact_txt2', function( value ) {
			value.bind(
				function( newval ) {
					$( '.dt_header .dt_navbar-info-contact .contact__body.two .description' ).text( newval );
				}
			);
		}
	);
	
	//softme_hdr_contact_ttl3
	wp.customize(
		'softme_hdr_contact_ttl3', function( value ) {
			value.bind(
				function( newval ) {
					$( '.dt_header .dt_navbar-info-contact .contact__body.three .title' ).text( newval );
				}
			);
		}
	);
	
	//softme_hdr_contact_txt3
	wp.customize(
		'softme_hdr_contact_txt3', function( value ) {
			value.bind(
				function( newval ) {
					$( '.dt_header .dt_navbar-info-contact .contact__body.three .description' ).text( newval );
				}
			);
		}
	);
	
	//softme_about_right_ttl
	wp.customize(
		'softme_about_right_ttl', function( value ) {
			value.bind(
				function( newval ) {
					$( '.front-about .dt_siteheading .subtitle .dt_heading_inner' ).text( newval );
				}
			);
		}
	);
	
	//softme_about_right_subttl
	wp.customize(
		'softme_about_right_subttl', function( value ) {
			value.bind(
				function( newval ) {
					$( '.front-about .dt_siteheading h2.title' ).text( newval );
				}
			);
		}
	);
	
	//softme_about_right_text
	wp.customize(
		'softme_about_right_text', function( value ) {
			value.bind(
				function( newval ) {
					$( '.front-about .dt_siteheading .text p' ).text( newval );
				}
			);
		}
	);
	
	//softme_service_subttl
	wp.customize(
		'softme_service_subttl', function( value ) {
			value.bind(
				function( newval ) {
					$( '.front-service .dt_siteheading h2.title' ).text( newval );
				}
			);
		}
	);
	
	//softme_service_text
	wp.customize(
		'softme_service_text', function( value ) {
			value.bind(
				function( newval ) {
					$( '.front-service .dt_siteheading .text p' ).text( newval );
				}
			);
		}
	);
	
	//softme_features_subttl
	wp.customize(
		'softme_features_subttl', function( value ) {
			value.bind(
				function( newval ) {
					$( '.front-feature .dt_siteheading h2.title' ).text( newval );
				}
			);
		}
	);
	
	//softme_features_text
	wp.customize(
		'softme_features_text', function( value ) {
			value.bind(
				function( newval ) {
					$( '.front-feature .dt_siteheading .text p' ).text( newval );
				}
			);
		}
	);
	
	//softme_about_marque_text
	wp.customize(
		'softme_about_marque_text', function( value ) {
			value.bind(
				function( newval ) {
					$( '.front-about .marquee_wrap .marquee_text' ).text( newval );
				}
			);
		}
	);
	
	
	//softme_blog_subttl
	wp.customize(
		'softme_blog_subttl', function( value ) {
			value.bind(
				function( newval ) {
					$( '.front-posts .dt_siteheading .title' ).text( newval );
				}
			);
		}
	);
	
	//softme_blog_text
	wp.customize(
		'softme_blog_text', function( value ) {
			value.bind(
				function( newval ) {
					$( '.front-posts .dt_siteheading .text p' ).text( newval );
				}
			);
		}
	);
	
	
	//softme_protect_right_subttl
	wp.customize(
		'softme_protect_right_subttl', function( value ) {
			value.bind(
				function( newval ) {
					$( '.front-protect .dt_siteheading h2.title' ).text( newval );
				}
			);
		}
	);
	
	//softme_protect_right_text
	wp.customize(
		'softme_protect_right_text', function( value ) {
			value.bind(
				function( newval ) {
					$( '.front-protect .dt_siteheading .text p' ).text( newval );
				}
			);
		}
	);
	
	/**
	 * Container Width
	 */
	wp.customize( 'softme_site_container_width', function( value ) {
		
		value.bind( function( softme_site_container_width ) {
			var class_name      = 'softme_site_container_width'; // Used as id in gfont link
			var css_class       = $( '.' + class_name );			
			
			if (softme_site_container_width >= 768 && softme_site_container_width < 2000){
				var head_append     = '<style class="' + class_name + '">.dt-container,.dt__slider-main .owl-dots{ max-width: ' + softme_site_container_width + 'px;}.header--eight .dt-container{ max-width: calc(' + softme_site_container_width + 'px + 7.15rem);}</style>';
			}

			if ( css_class.length ) {
				css_class.replaceWith( head_append );
			} else {
				$( 'head' ).append( head_append );
			}
			
		});
		
	} );

	range_live_media_load( 'softme_breadcrumb_height_option', '.dt_pagetitle ', [ 'padding-top' ], 'rem' );
	range_live_media_load( 'softme_breadcrumb_height_option', '.dt_pagetitle ', [ 'padding-bottom' ], 'rem' );
	
	
	/**
	 * Sidebar width.
	 */
	wp.customize( 'softme_sidebar_width', function( value ) {		
            'use strict';
            value.bind(
                function( to ){
                    var class_name      = 'customizer-sidebar-width'; // Used as id in gfont link
                    var css_class       = $( '.' + class_name );

                    var sidebar_width   = to;
                    var content_width   = ( 100 - to );

                    var head_append     = '<style class="' + class_name + '">@media (min-width: 992px){#dt-sidebar { max-width: ' + sidebar_width + '%;flex-basis: ' + sidebar_width + '%; } #dt-main { max-width: ' + content_width + '%;flex-basis: ' + content_width + '%; }}</style>';

                    if ( css_class.length ) {
                        css_class.replaceWith( head_append );
                    } else {
                        $( 'head' ).append( head_append );
                    }
                }
            );
        }
    );
	
	/**
	 * Body font size
	 */
	
	range_live_media_load( 'softme_body_font_size_option', 'body', [ 'font-size' ], 'px' );
	
	/**
	 * Body Letter Spacing
	 */
	
	range_live_media_load( 'softme_body_ltr_space_option', 'body', [ 'letter-spacing' ], 'px' );
	
	/**
	 * softme_body_line_height
	 */
	range_live_media_load( 'softme_body_line_height_option', 'body', [ 'line-height' ] );
	
	/**
	 * H1 font size
	 */
	range_live_media_load( 'softme_h1_font_size_option', 'h1', [ 'font-size' ], 'px' );
	
	/**
	 * H1 line height
	 */
	range_live_media_load( 'softme_h1_line_height_option', 'h1', [ 'line-height' ] );
	
	/**
	 * H1 Letter Spacing
	 */
	 
	range_live_media_load( 'softme_h1_ltr_space_option', 'h1', [ 'letter-spacing' ], 'px' );
	
	/**
	 * H2 font size
	 */
	range_live_media_load( 'softme_h2_font_size_option', 'h2', [ 'font-size' ], 'px' );
	
	/**
	 * H2 line height
	 */
	range_live_media_load( 'softme_h2_line_height_option', 'h2', [ 'line-height' ]);
	
	/**
	 * H2 Letter Spacing
	 */
	
	range_live_media_load( 'softme_h2_ltr_space_option', 'h2', [ 'letter-spacing' ], 'px' );

	/**
	 * H3 font size
	 */
	range_live_media_load( 'softme_h3_font_size_option', 'h3', [ 'font-size' ], 'px' );
	
	/**
	 * H3 line height
	 */
	range_live_media_load( 'softme_h3_line_height_option', 'h3', [ 'line-height' ]);
	
	/**
	 * H3 Letter Spacing
	 */
	
	range_live_media_load( 'softme_h3_ltr_space_option', 'h3', [ 'letter-spacing' ], 'px' );
	
	/**
	 * H4 font size
	 */
	range_live_media_load( 'softme_h4_font_size_option', 'h4', [ 'font-size' ], 'px' );
	
	/**
	 * H4 line height
	 */
	range_live_media_load( 'softme_h4_line_height_option', 'h4', [ 'line-height' ]);
	
	/**
	 * H4 Letter Spacing
	 */
	
		range_live_media_load( 'softme_h4_ltr_space_option', 'h4', [ 'letter-spacing' ], 'px' );
	
	/**
	 * H5 font size
	 */
	range_live_media_load( 'softme_h5_font_size_option', 'h5', [ 'font-size' ], 'px' );
	
	/**
	 * H5 line height
	 */
	range_live_media_load( 'softme_h5_line_height_option', 'h5', [ 'line-height' ]);
	
	/**
	 * H5 Letter Spacing
	 */
	
	range_live_media_load( 'softme_h5_ltr_space_option', 'h5', [ 'letter-spacing' ], 'px' );
	
	/**
	 * H6 font size
	 */
	range_live_media_load( 'softme_h6_font_size_option', 'h6', [ 'font-size' ], 'px' );

	/**
	 * H6 line height
	 */
	range_live_media_load( 'softme_h6_line_height_option', 'h6', [ 'line-height' ]);
	
	/**
	 * H6 Letter Spacing
	 */
	
	range_live_media_load( 'softme_h6_ltr_space_option', 'h6', [ 'letter-spacing' ], 'px' );
	
} )( jQuery );