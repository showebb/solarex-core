<?php
/**
 * ReduxFramework Sample Config File
 * For full documentation, please visit: https://devs.redux.io/
 *
 * @package Redux Framework
 */

defined('ABSPATH') || exit;

if (!class_exists('Redux')) {
	return;
}

// This is your option name where all the Redux data is stored.
$opt_name = 'Solarex_theme_options';  // YOU MUST CHANGE THIS.  DO NOT USE 'redux_demo' IN YOUR PROJECT!!!

// Uncomment to disable demo mode.
/* Redux::disable_demo(); */  // phpcs:ignore Squiz.PHP.CommentedOutCode

$dir = __DIR__ . DIRECTORY_SEPARATOR;

/*
 * --> Used within different fields. Simply examples. Search for ACTUAL DECLARATION for field examples
 */

// Background Patterns Reader.
$sample_patterns_path = Redux_Core::$dir . '../sample/patterns/';
$sample_patterns_url = Redux_Core::$url . '../sample/patterns/';
$sample_patterns = array();

if (is_dir($sample_patterns_path)) {
	$sample_patterns_dir = opendir($sample_patterns_path);

	if ($sample_patterns_dir) {

		// phpcs:ignore Generic.CodeAnalysis.AssignmentInCondition.FoundInWhileCondition
		while (false !== ($sample_patterns_file = readdir($sample_patterns_dir))) {
			if (stristr($sample_patterns_file, '.png') !== false || stristr($sample_patterns_file, '.jpg') !== false) {
				$name = explode('.', $sample_patterns_file);
				$name = str_replace('.' . end($name), '', $sample_patterns_file);
				$sample_patterns[] = array(
					'alt' => $name,
					'img' => $sample_patterns_url . $sample_patterns_file,
				);
			}
		}
	}
}

// Used to except HTML tags in description arguments where esc_html would remove.
$kses_exceptions = array(
	'a' => array(
		'href' => array(),
	),
	'strong' => array(),
	'br' => array(),
	'code' => array(),
);

/*
 * ---> BEGIN ARGUMENTS
 */

/**
 * All the possible arguments for Redux.
 * For full documentation on arguments, please refer to: https://devs.redux.io/core/arguments/
 */
$theme = wp_get_theme(); // For use with some settings. Not necessary.

// TYPICAL → Change these values as you need/desire.
$args = array(
	// This is where your data is stored in the database and also becomes your global variable name.
	'opt_name' => $opt_name,

	// Name that appears at the top of your panel.
	'display_name' => $theme->get('Name'),

	// Version that appears at the top of your panel.
	'display_version' => $theme->get('Version'),

	// Specify if the admin menu should appear or not. Options: menu or submenu (Under appearance only).
	'menu_type' => 'menu',

	// Show the sections below the admin menu item or not.
	'allow_sub_menu' => true,

	// The text to appear in the admin menu.
	'menu_title' => esc_html__('Solerex Options', 'solarex-core'),

	// The text to appear on the page title.
	'page_title' => esc_html__('Solerex Options', 'solarex-core'),

	// Disable to create your own Google fonts loader.
	'disable_google_fonts_link' => false,

	// Show the panel pages on the admin bar.
	'admin_bar' => true,

	// Icon for the admin bar menu.
	'admin_bar_icon' => 'dashicons-portfolio',

	// Priority for the admin bar menu.
	'admin_bar_priority' => 50,

	// Sets a different name for your global variable other than the opt_name.
	'global_variable' => $opt_name,

	// Show the time the page took to load, etc. (forced on while on localhost or when WP_DEBUG is enabled).
	'dev_mode' => false,

	// Enable basic customizer support.
	'customizer' => true,

	// Allow the panel to open expanded.
	'open_expanded' => false,

	// Disable the save warning when a user changes a field.
	'disable_save_warn' => false,

	// Order where the menu appears in the admin area. If there is any conflict, something will not show. Warning.
	'page_priority' => 90,

	// For a full list of options, visit: https://codex.wordpress.org/Function_Reference/add_submenu_page#Parameters.
	'page_parent' => 'themes.php',

	// Permissions needed to access the options panel.
	'page_permissions' => 'manage_options',

	// Specify a custom URL to an icon.
	'menu_icon' => '',

	// Force your panel to always open to a specific tab (by id).
	'last_tab' => '',

	// Icon displayed in the admin panel next to your menu_title.
	'page_icon' => 'icon-themes',

	// Page slug used to denote the panel, will be based off page title, then menu title, then opt_name if not provided.
	'page_slug' => $opt_name,

	// On load save the defaults to DB before user clicks save.
	'save_defaults' => true,

	// Display the default value next to each field when not set to the default value.
	'default_show' => false,

	// What to print by the field's title if the value shown is default.
	'default_mark' => '*',

	// Shows the Import/Export panel when not used as a field.
	'show_import_export' => true,

	// The time transients will expire when the 'database' arg is set.
	'transient_time' => 60 * MINUTE_IN_SECONDS,

	// Global shut-off for dynamic CSS output by the framework. Will also disable google fonts output.
	'output' => true,

	// Allows dynamic CSS to be generated for customizer and google fonts,
	// but stops the dynamic CSS from going to the page head.
	'output_tag' => true,

	// Disable the footer credit of Redux. Please leave if you can help it.
	'footer_credit' => '',

	// If you prefer not to use the CDN for ACE Editor.
	// You may download the Redux Vendor Support plugin to run locally or embed it in your code.
	'use_cdn' => true,

	// Set the theme of the option panel.  Use 'wp' to use a more modern style, default is classic.
	'admin_theme' => 'wp',

	// Enable or disable flyout menus when hovering over a menu with submenus.
	'flyout_submenus' => true,

	// Mode to display fonts (auto|block|swap|fallback|optional)
	// See: https://developer.mozilla.org/en-US/docs/Web/CSS/@font-face/font-display.
	'font_display' => 'swap',

	// HINTS.
	'hints' => array(
		'icon' => 'el el-question-sign',
		'icon_position' => 'right',
		'icon_color' => 'lightgray',
		'icon_size' => 'normal',
		'tip_style' => array(
			'color' => 'red',
			'shadow' => true,
			'rounded' => false,
			'style' => '',
		),
		'tip_position' => array(
			'my' => 'top left',
			'at' => 'bottom right',
		),
		'tip_effect' => array(
			'show' => array(
				'effect' => 'slide',
				'duration' => '500',
				'event' => 'mouseover',
			),
			'hide' => array(
				'effect' => 'slide',
				'duration' => '500',
				'event' => 'click mouseleave',
			),
		),
	),

	// FUTURE → Not in use yet, but reserved or partially implemented.
	// Use at your own risk.
	// Possible: options, theme_mods, theme_mods_expanded, transient. Not fully functional, warning!
	'database' => '',
	'network_admin' => true,
	'search' => true,
);


Redux::set_args($opt_name, $args);

/*
 * ---> END ARGUMENTS
 */

/*
 * ---> START SECTIONS
 */

// -> START Basic Fields

// Fetch Solarex templates
$solarex_template_options = array();
$templates = get_posts(array(
	'post_type' => 'solarex_template',
	'posts_per_page' => -1,
));

if (!empty($templates)) {
	foreach ($templates as $template) {
		$solarex_template_options[$template->ID] = $template->post_title;
	}
}

// Header options settings
Redux::set_section(
	$opt_name,
	array(
		'title' => esc_html__('Header Settings', 'solarex-core'),
		'id' => 'header_opt',
		'desc' => esc_html__('These are header general settings.', 'solarex-core'),
		'icon' => 'el el-road',
		'fields' => array(
			// [
			// 	'id' => 'solarex_header_template_select',
			// 	'type' => 'select',
			// 	'title' => __('Select Header Template', 'solarex-core'),
			// 	'options' => $options,
			// 	'default' => 'default',
			// ],
			[
				'id' => 'solarex_logo',
				'type' => 'media',
				'title' => esc_html__('Site Logo', 'solarex-core'),
				'url' => false,
			],
		),
	)
);

// header bg color
Redux::set_field($opt_name, 'header_opt', array(
	'id' => 'solarex_header_bg',
	'type' => 'color',
	'title' => esc_html__('Header Background Color', 'solarex-core'),
	'default' => '#FFFFFF',
	'validate' => 'color',
));
// nav link color
Redux::set_field($opt_name, 'header_opt', array(
	'id' => 'solarex_nav_link_color',
	'type' => 'link_color',
	'title' => esc_html__('Nav Link Color', 'solarex-core'),
	'default' => array(
		'regular' => 'black',
		'hover' => '#f67d2e',
		'active' => '#f67d2e',
	),
));
// logo width
Redux::set_field($opt_name, 'header_opt', array(
	'id' => 'solarex_img_width',
	'type' => 'text',
	'title' => esc_html__('Logo Width', 'solarex-core'),
	'default' => '120',
	'validate' => array('numeric', 'not_empty'),
	'description' => __('Enter a numeric value for image width in pixels (px).', 'solarex-core'),
));

// link input field for logo
Redux::set_field($opt_name, 'header_opt', array(
	'id' => 'solarex_logo_link',
	'type' => 'text',
	'title' => esc_html__('Logo Link', 'solarex-core'),
	'default' => '',
));

// alt input field for logo
Redux::set_field($opt_name, 'header_opt', array(
	'id' => 'solarex_img_height',
	'type' => 'text',
	'title' => esc_html__('Logo Height', 'solarex-core'),
	'default' => 'auto',
	// 'validate' => array('numeric', 'not_empty'),
	'description' => __('Enter a numeric value for image height in pixels (px).', 'solarex-core'),
));

Redux::set_field($opt_name, 'header_opt', array(
	'id' => 'solarex_btn_text',
	'type' => 'text',
	'title' => esc_html__('Button Text', 'solarex-core'),
	'default' => 'Contact Us',
));

Redux::set_field($opt_name, 'header_opt', array(
	'id' => 'solarex_btn_link',
	'type' => 'text',
	'title' => esc_html__('Button Link', 'solarex-core'),
	'default' => '#',
));

Redux::set_field($opt_name, 'header_opt', array(
	'id' => 'solarex_btn_border',
	'type' => 'border',
	'title' => esc_html__('Button Border', 'solarex-core'),
	'default' => array(
		'border-color' => '#212529',
		'border-style' => 'solid',
		'border-top' => '1px',
		'border-right' => '1px',
		'border-bottom' => '1px',
		'border-left' => '1px',
	),
));

Redux::set_field($opt_name, 'header_opt', array(
	'id' => 'solarex_btn_radius',
	'type' => 'text',
	'title' => esc_html__('Button Border Radius', 'solarex-core'),
	'default' => '99999',
	'validate' => array('numeric', 'not_empty'),
	'description' => __('Enter a numeric value for border radius in pixels (px).', 'solarex-core'),
));

Redux::set_field($opt_name, 'header_opt', array(
	'id' => 'solarex_btn_typography',
	'type' => 'typography',
	'title' => esc_html__('Button Text Typography', 'solarex-core'),
	'google' => true,
	'font-backup' => true,
	'output' => array('h2.site-description'),
	'units' => 'px',
	'default' => array(
		'color' => '#FFFFFF',
		'font-style' => '400',
		'font-family' => 'Inter, sans-serif',
		'google' => true,
		'font-size' => '16px',
		'line-height' => '24px',
	),
));

Redux::set_field($opt_name, 'header_opt', array(
	'id' => 'solarex_btn_hover',
	'type' => 'color',
	'title' => esc_html__('Button Hover Text Color', 'solarex-core'),
	'default' => '#fff',
	'validate' => 'color',
));

Redux::set_field($opt_name, 'header_opt', array(
	'id' => 'solarex_btn_bg',
	'type' => 'link_color',
	'title' => esc_html__('Button BG Color', 'solarex-core'),
	'default' => array(
		'regular' => 'black',
		'hover' => '#212529',
	),
));

Redux::set_field($opt_name, 'header_opt', array(
	'id' => 'solarex_btn_padding',
	'type' => 'spacing',
	'title' => esc_html__('Button Padding', 'solarex-core'),
	'default' => array(
		'top' => '10px',
		'right' => '20px',
		'bottom' => '10px',
		'left' => '20px',
	),
	'units' => array('px', 'em'),
	'display_units' => 'px',
));




// blog options settings
Redux::set_section($opt_name, array(
	'title' => esc_html__('Blog Page', 'solarex-options'),
	'id' => 'solarex_blog_layout',
	'icon' => 'el el-edit',
	'fields' => array(
		array(
			'id' => 'blog_layout_option',
			'type' => 'image_select',
			'title' => 'Choose Blog Layout',
			'subtitle' => 'Select a layout design for your blog page.',
			'options' => array(
				'none' => array(
					'alt' => '2 Cards per Row',
					'img' => get_template_directory_uri() . '/images/no_sidebar.png',
				),
				'top' => array(
					'alt' => 'Top Sidebar + 3 Cards per Row',
					'img' => get_template_directory_uri() . '/images/top_sidebar.png',
				),
				'right' => array(
					'alt' => 'Right Sidebar + 2 Cards per Row',
					'img' => get_template_directory_uri() . '/images/right_sidebar.png',
				),
			),
			'default' => 'none',
		),
		// post header
		array(
			'id' => 'solarex_blog_post_header_type',
			'type' => 'radio',
			'title' => esc_html__('Post Header', 'solarex-options'),
			'options' => array(
				'elementor' => 'Elementor Template',
				// 'custom' => 'Default HTML template',
				'none' => 'No Post Header',
			),
			'default' => 'none',
		),
		array(
			'id' => 'solarex_elementor_template_3',
			'type' => 'select',
			'title' => esc_html__('Choose Elementor Template for all page', 'solarex-options'),
			'options' => $solarex_template_options,
			'required' => array(
				array('solarex_blog_post_header_type', '=', 'elementor'),
				array('solarex_blog_post_header_type', '!=', 'none'),
			),
		),

		array(
			'id' => 'solarex_blog_pre_footer',
			'type' => 'radio',
			'title' => esc_html__('Pre Footer', 'solarex-options'),
			'options' => array(
				'elementor' => 'Elementor Template',			
				'none' => 'No Pre Footer',
			),
			'default' => 'elementor',
		),
		array(
			'id' => 'solarex_elementor_template_4',
			'type' => 'select',
			'title' => esc_html__('Choose Elementor Template for all page', 'solarex-options'),
			'options' => $solarex_template_options,
			'required' => array(
				array('solarex_blog_pre_footer', '=', 'elementor'),
				array('solarex_blog_pre_footer', '!=', 'none'),
			),
		),

		array(
			'id' => 'solarex_blog_title_color',
			'type' => 'link_color',
			'title' => esc_html__('Title Color', 'solarex-core'),
			'default' => array(
				'regular' => 'black',
				'hover' => '#f67d2e',
			),

		),
	),
));




// Globar Styles 

Redux::set_section(
	$opt_name,
	array(
		'title' => esc_html__('Theme Styles', 'solarex-core'),
		'id' => 'styles',
		'desc' => esc_html__('These are the global styling settings.', 'solarex-core'),
		'icon' => 'el el-brush',
		'fields' => array(
			// Primary Color
			array(
				'id' => 'primary_color',
				'type' => 'color',
				'title' => esc_html__('Primary Color', 'solarex-core'),
				'default' => '#f67d2e', // Default primary color
				'validate' => 'color',
			),
			// Secondary Color
			array(
				'id' => 'secondary_color',
				'type' => 'color',
				'title' => esc_html__('Secondary Color', 'solarex-core'),
				'default' => '#70ac48', // Default secondary color
				'validate' => 'color',
			),
			// Gray Background
			array(
				'id' => 'gray_bg',
				'type' => 'color',
				'title' => esc_html__('Gray Background', 'solarex-core'),
				'default' => '#f4f4f4', // Default gray background
				'validate' => 'color',
			),
			// Primary Background
			array(
				'id' => 'primary_bg',
				'type' => 'color',
				'title' => esc_html__('Primary Background', 'solarex-core'),
				'default' => '#f67d2e', // Default primary background
				'validate' => 'color',
			),
			// Secondary Background
			array(
				'id' => 'secondary_bg',
				'type' => 'color',
				'title' => esc_html__('Secondary Background', 'solarex-core'),
				'default' => '#70ac48', // Default secondary background
				'validate' => 'color',
			),
			// like color 
			array(
				'id' => 'link_color',
				'type' => 'link_color',
				'title' => esc_html__('Button BG Color', 'solarex-core'),
				'default' => array(
					'regular' => 'black',
					'hover' => '#212529',
					'active' => '#f67d2e',
				),
			)
		),
	)
);


// service options settings
Redux::set_section($opt_name, array(
	'title' => esc_html__('Service Page Layout', 'solarex-options'),
	'id' => 'solarex_service_layout',
	'icon' => 'el el-edit',
	'fields' => array(
		// service detials with side bar using switer on off
		array(
			'id' => 'solarex_service_sidebar',
			'type' => 'switch',
			'title' => esc_html__('Sidebar', 'solarex-options'),

			'default' => true,
		),
	)
));


// footer settings
Redux::set_section($opt_name, array(
	'title' => esc_html__('Footer', 'solarex-options'),
	'id' => 'solarex_footer',
	'icon' => 'el el-arrow-right',
	'fields' => array(
		array(
			'id' => 'solarex_footer_bg',
			'type' => 'color',
			'title' => __('Footer Background Color', 'solarex-options'),
			'default' => '#000',
			'validate' => 'color',
		),
		array(
			'id' => 'solarex_copyright_text',
			'type' => 'text',
			'title' => esc_html__('Copyright Text', 'solarex-core'),
			'default' => '© 2021 Solarex. All Rights Reserved.',
		)
	),
));

// Redux::set_section($opt_name, array(
// 	'title' => esc_html__('Post Header', 'solarex-options'),
// 	'id' => 'solarex_post_header',
// 	'icon' => 'el el-align-center',
// 	'fields' => array(
// 		// Pre-footer for Home Page V1
// 		array(
// 			'id' => 'solarex_post_header_type',
// 			'type' => 'radio',
// 			'title' => esc_html__('Pre-footer', 'solarex-options'),
// 			'options' => array(
// 				'elementor' => 'Elementor Template',
// 				// 'custom' => 'Default HTML template',
// 				'none' => 'No Post Header',
// 			),
// 			'default' => 'none',
// 		),
// 		array(
// 			'id' => 'solarex_elementor_template_2',
// 			'type' => 'select',
// 			'title' => esc_html__('Choose Elementor Template for all page', 'solarex-options'),
// 			'options' => $solarex_template_options,
// 			'required' => array(
// 				array('solarex_post_header_type', '=', 'elementor'),
// 				array('solarex_post_header_type', '!=', 'none'),
// 			),
// 		),
// 	),
// ));

// Redux::set_section($opt_name, array(
//     'title'  => esc_html__('Post Header', 'solarex-options'),
//     'id'     => 'solarex_post_header',
//     'icon'   => 'el el-align-center',
//     'fields' => array(
//         array(
//             'id'      => 'solarex_post_header_type',
//             'type'    => 'radio',
//             'title'   => esc_html__('Post Header', 'solarex-options'),
//             'options' => array(
//                 'none'      => 'No Post Header',
//                 'elementor' => 'Elementor Template',
//             ),
//             'default' => 'none',
//         ),
//         array(
//             'id'       => 'solarex_elementor_template_2',
//             'type'     => 'select',
//             'title'    => esc_html__('Choose Elementor Template for all pages', 'solarex-options'),
//             'options'  => $solarex_template_options,
//             'required' => array(
//                 array('solarex_post_header_type', '=', 'elementor'),
//             ),
//         ),
//     ),
// ));



Redux::set_section($opt_name, array(
    'title'  => esc_html__('Post Header', 'solarex-options'),
    'id'     => 'solarex_post_header',
    'icon'   => 'el el-align-center',
    'fields' => array(
        array(
            'id'      => 'solarex_post_header_type',
            'type'    => 'radio',
            'title'   => esc_html__('Post Header', 'solarex-options'),
            'options' => array(
                'none'      => 'No Post Header',
                'elementor' => 'Elementor Template',
            ),
            'default' => 'elementor', // Default set to Elementor
        ),
        array(
            'id'       => 'solarex_elementor_template_2',
            'type'     => 'select',
            'title'    => esc_html__('Choose Elementor Template for all pages', 'solarex-options'),
            'options'  => !empty($solarex_template_options) ? $solarex_template_options : array('no_template' => 'No templates available'),
            'default'  => key($solarex_template_options), // Default to the first available template
            'required' => array(
                array('solarex_post_header_type', '=', 'elementor'),
            ),
        ),
    ),
));

Redux::set_section($opt_name, array(
    'title'  => esc_html__('Pre-Footer', 'solarex-options'),
    'id'     => 'solarex_pre_footer',
    'icon'   => 'el el-arrow-down',
    'fields' => array(
        array(
            'id'      => 'solarex_prefooter_type',
            'type'    => 'radio',
            'title'   => esc_html__('Pre-Footer Option', 'solarex-options'),
            'options' => array(
                'none'      => 'No Pre-Footer',
                'elementor' => 'Elementor Template',
            ),
            'default' => 'elementor', // Default set to Elementor
        ),
        array(
            'id'       => 'solarex_prefooter_template',
            'type'     => 'select',
            'title'    => esc_html__('Choose Elementor Template for Pre-Footer', 'solarex-options'),
            'options'  => !empty($solarex_template_options) ? $solarex_template_options : array('no_template' => 'No templates available'),
            'default'  => key($solarex_template_options), // Default to the first available template
            'required' => array(
                array('solarex_prefooter_type', '=', 'elementor'),
            ),
        ),
    ),
));



// custom scripts
Redux::set_section(
	$opt_name,
	array(
		'title' => esc_html__('Custom Scripts ', 'kerapy-core'),
		'id' => 'custom_scripts_opt',
		'desc' => esc_html__('These are custom scripts settings.', 'kerapy-core'),
		'icon' => 'el el-css',
		'fields' => array(
			//  custom css
			array(
				'id' => 'css_on_header',
				'type' => 'ace_editor',
				'title' => esc_html__('Custom CSS On Header', 'your-project-name'),
				'subtitle' => esc_html__('Paste your CSS code here.', 'your-project-name'),
				'mode' => 'css',
				'theme' => 'monokai',
				// 'default'  => "/* Example CSS for header */\n.selector {\n    margin: 0 auto;\n    background-color: #f8f8f8;\n    padding: 20px;\n}"
			),
			array(
				'id' => 'css_on_body_start',
				'type' => 'ace_editor',
				'title' => esc_html__('Custom CSS On Body Start', 'your-project-name'),
				'subtitle' => esc_html__('Paste your CSS code here.', 'your-project-name'),
				'mode' => 'css',
				'theme' => 'monokai',
				// 'default'  => "/* Example CSS for header */\n.selector {\n    margin: 0 auto;\n    background-color: #f8f8f8;\n    padding: 20px;\n}"
			),
			array(
				'id' => 'css_on_body_end',
				'type' => 'ace_editor',
				'title' => esc_html__('Custom CSS On Body End', 'your-project-name'),
				'subtitle' => esc_html__('Paste your CSS code here.', 'your-project-name'),
				'mode' => 'css',
				'theme' => 'monokai',
				// 'default'  => "/* Example CSS for header */\n.selector {\n    margin: 0 auto;\n    background-color: #f8f8f8;\n    padding: 20px;\n}"
			),
			// custom scripts
			array(
				'id' => 'js_on_header',
				'type' => 'ace_editor',
				'title' => esc_html__('Custom js On Header', 'your-project-name'),
				'subtitle' => esc_html__('Paste your js code here.', 'your-project-name'),
				'mode' => 'javascript',
				'theme' => 'monokai',
				// 'default'  => "/* Example JavaScript for header */\nconsole.log('Header script loaded');"
			),
			array(
				'id' => 'js_on_body_start',
				'type' => 'ace_editor',
				'title' => esc_html__('Custom js On Body Start', 'your-project-name'),
				'subtitle' => esc_html__('Paste your js code here.', 'your-project-name'),
				'mode' => 'javascript',
				'theme' => 'monokai',
				// 'default'  => "/* Example JavaScript for header */\nconsole.log('Header script loaded');"
			),
			array(
				'id' => 'js_on_body_end',
				'type' => 'ace_editor',
				'title' => esc_html__('Custom js On Body End', 'your-project-name'),
				'subtitle' => esc_html__('Paste your js code here.', 'your-project-name'),
				'mode' => 'javascript',
				'theme' => 'monokai',
				// 'default'  => "/* Example JavaScript for header */\nconsole.log('Header script loaded');"
			),

		),
	)
);
