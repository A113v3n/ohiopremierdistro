<?php
/**
 * Child functions and definitions.
 */
add_filter( 'kava-theme/assets-depends/styles', 'worky_styles_depends' );
add_action( 'jet-theme-core/register-config', 'worky_core_config' );
add_action( 'init', 'worky_plugins_wizard_config', 9 );
add_action( 'init', 'worky_data_importer_config', 9 );
add_action( 'tgmpa_register', 'worky_register_required_plugins' );
/**
 * Enqueue styles.
 */
function worky_styles_depends( $deps ) {
	$parent_handle = 'kava-parent-theme-style';
	wp_register_style(
		$parent_handle,
		get_template_directory_uri() . '/style.css',
		array(),
		kava_theme()->version()
	);
	$deps[] = $parent_handle;
	return $deps;
}
/**
 * Register JetThemeCore config
 *
 * @param  [type] $manager [description]
 * @return [type]          [description]
 */
function worky_core_config( $manager ) {
	$manager->register_config(
		array(
			'dashboard_page_name' => esc_html__( 'Worky', 'worky' ),
			'library_button'      => false,
			'menu_icon'           => 'dashicons-admin-generic',
			'api'                 => array( 'enabled' => false ),
			'guide'               => array(
				'title'   => __( 'Learn More About Your Theme', 'jet-theme-core' ),
				'links'   => array(
					'documentation' => array(
						'label'  => __('Check documentation', 'jet-theme-core'),
						'type'   => 'primary',
						'target' => '_blank',
						'icon'   => 'dashicons-welcome-learn-more',
						'desc'   => __( 'Get more info from documentation', 'jet-theme-core' ),
						'url'    => 'http://documentation.zemez.io/wordpress/index.php?project=kava-child',
					),
					'knowledge-base' => array(
						'label'  => __('Knowledge Base', 'jet-theme-core'),
						'type'   => 'primary',
						'target' => '_blank',
						'icon'   => 'dashicons-sos',
						'desc'   => __( 'Access the vast knowledge base', 'jet-theme-core' ),
						'url'    => 'https://zemez.io/wordpress/support/knowledge-base',
					),
				),
			)
		)
	);
}
/**
 * Register Jet Plugins Wizards config
 * @return [type] [description]
 */
function worky_plugins_wizard_config() {
	if ( ! is_admin() ) {
		return;
	}
	if ( ! function_exists( 'jet_plugins_wizard_register_config' ) ) {
		return;
	}
	jet_plugins_wizard_register_config( array(
		'license' => array(
			'enabled' => false,
		),
		'plugins' => array(
			'jet-data-importer' => array(
				'name'   => esc_html__( 'Jet Data Importer', 'worky' ),
				'source' => 'remote',
				'path'   => 'https://github.com/ZemezLab/jet-data-importer/archive/master.zip',
				'access' => 'base',
				),			
			'elementor' => array(
				'name'   => esc_html__( 'Elementor', 'worky' ),
				'access' => 'base',
				),
			'kava-extra' => array(
				'name'   => esc_html__( 'Kava Extra', 'worky' ),
				'source' => 'remote',
				'path'   => 'https://github.com/ZemezLab/kava-extra/archive/master.zip',
				'access' => 'base',
				),
			'jet-blocks' => array(
				'name'   => esc_html__( 'Jet Blocks For Elementor', 'worky' ),
				'source' => 'remote',
				'path'   => 'https://monstroid.zemez.io/download/jet-blocks.zip',
				'access' => 'skins',
				),
			'jet-blog' => array(
				'name'   => esc_html__( 'Jet Blog For Elementor', 'worky' ),
				'source' => 'remote',
				'path'   => 'https://monstroid.zemez.io/download/jet-blog.zip',
				'access' => 'skins',
				),
			'jet-elements' => array(
				'name'   => esc_html__( 'Jet Elements For Elementor', 'worky' ),
				'source' => 'remote',
				'path'   => 'https://monstroid.zemez.io/download/jet-elements.zip',
				'access' => 'skins',
				),
			'jet-tabs' => array(
				'name'   => esc_html__( 'Jet Tabs', 'worky' ),
				'source' => 'remote',
				'path'   => 'https://monstroid.zemez.io/download/jet-tabs.zip',
				'access' => 'skins',
				),
			'jet-theme-core' => array(
				'name'   => esc_html__( 'Jet Theme Core', 'worky' ),
				'source' => 'remote',
				'path'   => 'https://monstroid.zemez.io/download/jet-theme-core.zip',
				'access' => 'skins',
				),
			'jet-tricks' => array(
				'name'   => esc_html__( 'Jet Tricks', 'worky' ),
				'source' => 'remote',
				'path'   => 'https://monstroid.zemez.io/download/jet-tricks.zip',
				'access' => 'skins',
				),
            'jet-menu' => array(
                'name'   => esc_html__( 'Jet Menu', 'worky' ),
                'source' => 'remote',
                'path'   => 'https://monstroid.zemez.io/download/jet-menu.zip',
                'access' => 'skins',
            ),
			'contact-form-7' => array(
				'name'   => esc_html__( 'Contact Form 7', 'worky' ),
				'access' => 'skins',
				),
			),
		'skins'   => array(
			'base' => array(
				'jet-data-importer',
				'kava-extra',
				),
			'advanced' => array(
				'default' => array(
					'full'  => array(
						'elementor',
						'jet-blocks',
						'jet-blog',
						'jet-elements',
						'jet-tabs',
						'jet-theme-core',
						'jet-tricks',
                        'jet-menu',
						'contact-form-7',
						),
					'lite'  => false,
					'demo'  => 'https://ld-wp73.template-help.com/wordpress/prod_21594/v5/',
					'thumb' => get_stylesheet_directory_uri() . '/screenshot.png',
					'name'  => esc_html__( 'Worky', 'worky' ),
					),
				),
			),
		'texts'   => array(
			'theme-name' => esc_html__( 'Worky', 'worky' ),
		)
	) );
}
/**
 * Register Jet Data Importer config
 * @return [type] [description]
 */
function worky_data_importer_config() {
	if ( ! is_admin() ) {
		return;
	}
	if ( ! function_exists( 'jet_data_importer_register_config' ) ) {
		return;
	}
	jet_data_importer_register_config( array(
		'xml' => false,
		'advanced_import' => array(
			'default' => array(
				'label'    => esc_html__( 'Worky', 'worky' ),
				'full'     => get_stylesheet_directory() . '/assets/demo-content/default/default-full.xml',
				'lite'     => false,
				'thumb'    => get_stylesheet_directory_uri() . '/assets/demo-content/default/default-thumb.jpg',
				'demo_url' => 'https://ld-wp73.template-help.com/wordpress/prod_21594/v5/',
			),
		),
		'import' => array(
			'chunk_size' => 3,
		),
		'slider' => array(
			'path' => 'https://raw.githubusercontent.com/JetImpex/wizard-slides/master/slides.json',
		),
		'export' => array(
			'options' => array(
				'site_icon',
				'elementor_cpt_support',
				'elementor_disable_color_schemes',
				'elementor_disable_typography_schemes',
				'elementor_container_width',
				'elementor_css_print_method',
				'elementor_global_image_lightbox',
				'jet-elements-settings',
				'jet_menu_options',
				'highlight-and-share',
				'stockticker_defaults',
				'wsl_settings_social_icon_set',
				'jet_page_template_conditions',
				'jet_site_conditions',
				'elementor_page_settings',
			),
			'tables' => array(),
		),
		'success-links' => array(
			'home' => array(
				'label'  => __('View your site', 'jet-date-importer'),
				'type'   => 'primary',
				'target' => '_self',
				'icon'   => 'dashicons-welcome-view-site',
				'desc'   => __( 'Take a look at your site', 'jet-data-importer' ),
				'url'    => home_url( '/' ),
			),
			'edit' => array(
				'label'  => __('Start editing', 'jet-date-importer'),
				'type'   => 'primary',
				'target' => '_self',
				'icon'   => 'dashicons-welcome-write-blog',
				'desc'   => __( 'Proceed to editing pages', 'jet-data-importer' ),
				'url'    => admin_url( 'edit.php?post_type=page' ),
			),
		),
		'slider' => array(
			'path' => 'https://raw.githubusercontent.com/ZemezLab/kava-child/master/slides.json',
		),
	) );
}
/**
 * Register Class Tgm Plugin Activation
 */
require_once('inc/classes/class-tgm-plugin-activation.php');
/**
 * Setup Jet Plugins Wizard
 */
function worky_register_required_plugins() {
	$plugins = array(
		array(
			'name'         => esc_html__( 'Jet Plugin Wizard', 'worky' ),
			'slug'         => 'jet-plugins-wizard',
			'source'       => 'https://github.com/ZemezLab/jet-plugins-wizard/archive/master.zip',
			'external_url' => 'https://github.com/ZemezLab/jet-plugins-wizard',
		),
	);
	$config = array(
		'id'           => 'worky',
		'default_path' => '',
		'menu'         => 'tgmpa-install-plugins',
		'has_notices'  => true,
		'dismissable'  => true,
		'dismiss_msg'  => '',
		'is_automatic' => true,
		'message'      => '',
	);
	tgmpa( $plugins, $config );
}

	