<?php
/**
 * SoftMe Customizer Class
 *
 * @package SoftMe
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

 if ( ! class_exists( 'SoftMe_Customizer' ) ) :

	class SoftMe_Customizer {

		// Constructor customizer
		public function __construct() {
			add_action( 'customize_register',array( $this, 'softme_customizer_register' ) );
			add_action( 'customize_register',array( $this, 'softme_customizer_sainitization_selective_refresh' ) );
			add_action( 'customize_register',array( $this, 'softme_customizer_control' ) );
			add_action( 'customize_preview_init',array( $this, 'softme_customize_preview_js' ) );
			add_action( 'customize_controls_enqueue_scripts',array( $this, 'softme_customizer_navigation_script' ) );
			add_action( 'after_setup_theme',array( $this, 'softme_customizer_settings' ) );
		}
		
		/**
		 * Add postMessage support for site title and description for the Theme Customizer.
		 *
		 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
		 */
		public function softme_customizer_register( $wp_customize ) {
			
			$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
			$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
			$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
			$wp_customize->get_setting( 'background_color' )->transport = 'postMessage';
			$wp_customize->get_setting('custom_logo')->transport = 'refresh';
		}
		
		// Register custom controls
		public function softme_customizer_control( $wp_customize ) {
			
			$softme_control_dir =  SOFTME_THEME_INC_DIR . '/customizer/controls';
			
			// Load custom control classes.
			$wp_customize->register_control_type( 'SoftMe_Customizer_Range_Control' );
			require $softme_control_dir . '/code/softme-slider-control.php';
			require $softme_control_dir . '/code/editor/class/class-softme-page-editor.php';

		}
		
		// selective refresh.
		public function softme_customizer_sainitization_selective_refresh() {

			require SOFTME_THEME_INC_DIR . '/customizer/sanitization.php';

		}

		// Theme Customizer preview reload changes asynchronously.
		public function softme_customize_preview_js() {
			wp_enqueue_script( 'softme-customizer', SOFTME_THEME_INC_URI . '/customizer/assets/js/customizer-preview.js', array( 'customize-preview' ), SOFTME_THEME_VERSION, true );
		}
		
		public function softme_customizer_navigation_script() {
			 wp_enqueue_script( 'softme-customizer-section', SOFTME_THEME_INC_URI .'/customizer/assets/js/customizer-section.js', array("jquery"),'', true  );	
		}
		

		// Include customizer settings.
			
		public function softme_customizer_settings() {
			// Recommended Plugin
			require SOFTME_THEME_INC_DIR . '/customizer/customizer-plugin-notice/softme-notify-plugin.php';
			
			// Upsale
			require SOFTME_THEME_INC_DIR . '/customizer/controls/code/upgrade/class-customize.php';
			
			$softme_customize_dir =  SOFTME_THEME_INC_DIR . '/customizer/customizer-settings';
			require $softme_customize_dir . '/softme-header-customize-setting.php';
			 require $softme_customize_dir . '/softme-footer-customize-setting.php';
			 require $softme_customize_dir . '/softme-theme-customize-setting.php';
			require $softme_customize_dir . '/softme-typography-customize-setting.php';
			require SOFTME_THEME_INC_DIR . '/customizer/softme-selective-partial.php';
			require SOFTME_THEME_INC_DIR . '/customizer/softme-selective-refresh.php';
		}

	}
endif;
new SoftMe_Customizer();