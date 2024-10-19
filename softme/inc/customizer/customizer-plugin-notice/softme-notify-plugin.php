<?php
/*
 *  Customizer Notifications
 */
require get_template_directory() . '/inc/customizer/customizer-plugin-notice/softme-customizer-notify.php';
$softme_config_customizer = array(
    'recommended_plugins' => array( 
        'desert-companion' => array(
            'recommended' => true,
            'description' => sprintf( 
                /* translators: %s: plugin name */
                esc_html__( 'If you want to show all the features and sections of the Theme. please install and activate %s plugin', 'softme' ), '<strong>Desert Companion</strong>' 
            ),
        ),
    ),
	'recommended_actions'       => array(),
	'recommended_actions_title' => esc_html__( 'Recommended Actions', 'softme' ),
	'recommended_plugins_title' => esc_html__( 'Recommended Plugin', 'softme' ),
	'install_button_label'      => esc_html__( 'Install and Activate', 'softme' ),
	'activate_button_label'     => esc_html__( 'Activate', 'softme' ),
	'softme_deactivate_button_label'   => esc_html__( 'Deactivate', 'softme' ),
);
Softme_Customizer_Notify::init( apply_filters( 'softme_customizer_notify_array', $softme_config_customizer ) );