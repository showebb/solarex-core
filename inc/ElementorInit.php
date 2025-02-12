<?php

namespace Solarex\Core;


use Solarex\Core\ElementorWidgets\SmallCard;
use Solarex\Core\ElementorWidgets\SolarexChooseUs;
use Solarex\Core\ElementorWidgets\SolarexBlogWidget;
use Solarex\Core\ElementorWidgets\SolarexBreadcrumb;
use Solarex\Core\ElementorWidgets\SolarexTeamMember;
use Solarex\Core\ElementorWidgets\SolarexContactInfo;
use Solarex\Core\ElementorWidgets\SolarexGalleryGrid;
use Solarex\Core\ElementorWidgets\SolarImpactSection;
use Solarex\Core\ElementorWidgets\SolarexServicesWidget;
use Solarex\Core\ElementorWidgets\SolarexTestimonialCarousel;


if (!defined('ABSPATH')) {
	exit; // Exit if accessed directly.
}

/**
 * ElementorInit class.
 *
 * The main class that initiates and runs the addon.
 *
 * @since 1.0.0
 */
final class ElementorInit
{

	/**
	 * Addon Version
	 *
	 * @since 1.0.0
	 * @var string The addon version.
	 */
	const VERSION = '1.0.0';

	/**
	 * Minimum Elementor Version
	 *
	 * @since 1.0.0
	 * @var string Minimum Elementor version required to run the addon.
	 */
	const MINIMUM_ELEMENTOR_VERSION = '3.20.0';

	/**
	 * Minimum PHP Version
	 *
	 * @since 1.0.0
	 * @var string Minimum PHP version required to run the addon.
	 */
	const MINIMUM_PHP_VERSION = '7.4';

	/**
	 * Instance
	 *
	 * @since 1.0.0
	 * @access private
	 * @static
	 * @var \Elementor_Test_Addon\Plugin The single instance of the class.
	 */
	private static $_instance = null;

	/**
	 * Instance
	 *
	 * Ensures only one instance of the class is loaded or can be loaded.
	 *
	 * @since 1.0.0
	 * @access public
	 * @static
	 * @return \Elementor_Test_Addon\Plugin An instance of the class.
	 */
	public static function instance()
	{

		if (is_null(self::$_instance)) {
			self::$_instance = new self();
		}
		return self::$_instance;

	}

	/**
	 * Constructor
	 *
	 * Perform some compatibility checks to make sure basic requirements are meet.
	 * If all compatibility checks pass, initialize the functionality.
	 *
	 * @since 1.0.0
	 * @access public
	 */
	public function __construct()
	{
		error_log('Custom Elementor category registered');
		if ($this->is_compatible()) {
			add_action('elementor/init', [$this, 'init'], 20);
		}

	}

	/**
	 * Compatibility Checks
	 *
	 * Checks whether the site meets the addon requirement.
	 *
	 * @since 1.0.0
	 * @access public
	 */
	public function is_compatible()
	{

		// Check if Elementor installed and activated
		if (!did_action('elementor/loaded')) {
			add_action('admin_notices', [$this, 'admin_notice_missing_main_plugin']);
			return false;
		}

		// Check for required Elementor version
		if (!version_compare(ELEMENTOR_VERSION, self::MINIMUM_ELEMENTOR_VERSION, '>=')) {
			add_action('admin_notices', [$this, 'admin_notice_minimum_elementor_version']);
			return false;
		}

		// Check for required PHP version
		if (version_compare(PHP_VERSION, self::MINIMUM_PHP_VERSION, '<')) {
			add_action('admin_notices', [$this, 'admin_notice_minimum_php_version']);
			return false;
		}

		return true;

	}

	/**
	 * Admin notice
	 *
	 * Warning when the site doesn't have Elementor installed or activated.
	 *
	 * @since 1.0.0
	 * @access public
	 */
	public function admin_notice_missing_main_plugin()
	{

		if (isset($_GET['activate']))
			unset($_GET['activate']);

		$message = sprintf(
			/* translators: 1: Plugin name 2: Elementor */
			esc_html__('"%1$s" requires "%2$s" to be installed and activated.', 'solarex-core'),
			'<strong>' . esc_html__('Solarex Core', 'solarex-core') . '</strong>',
			'<strong>' . esc_html__('Elementor', 'solarex-core') . '</strong>'
		);

		printf('<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message);

	}

	/**
	 * Admin notice
	 *
	 * Warning when the site doesn't have a minimum required Elementor version.
	 *
	 * @since 1.0.0
	 * @access public
	 */
	public function admin_notice_minimum_elementor_version()
	{

		if (isset($_GET['activate']))
			unset($_GET['activate']);

		$message = sprintf(
			/* translators: 1: Plugin name 2: Elementor 3: Required Elementor version */
			esc_html__('"%1$s" requires "%2$s" version %3$s or greater.', 'solarex-core'),
			'<strong>' . esc_html__('Solarex Core', 'solarex-core') . '</strong>',
			'<strong>' . esc_html__('Elementor', 'solarex-core') . '</strong>',
			self::MINIMUM_ELEMENTOR_VERSION
		);

		printf('<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message);

	}

	/**
	 * Admin notice
	 *
	 * Warning when the site doesn't have a minimum required PHP version.
	 *
	 * @since 1.0.0
	 * @access public
	 */
	public function admin_notice_minimum_php_version()
	{

		if (isset($_GET['activate']))
			unset($_GET['activate']);

		$message = sprintf(
			/* translators: 1: Plugin name 2: PHP 3: Required PHP version */
			esc_html__('"%1$s" requires "%2$s" version %3$s or greater.', 'solarex-core'),
			'<strong>' . esc_html__('Solarex Core', 'solarex-core') . '</strong>',
			'<strong>' . esc_html__('PHP', 'solarex-core') . '</strong>',
			self::MINIMUM_PHP_VERSION
		);

		printf('<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message);

	}

	/**
	 * Initialize
	 *
	 * Load the addons functionality only after Elementor is initialized.
	 *
	 * Fired by `elementor/init` action hook.
	 *
	 * @since 1.0.0
	 * @access public
	 */
	public function init()
	{
		add_action('elementor/widgets/register', [$this, 'register_widgets']);
		add_action('elementor/elements/categories_registered', [$this, 'solarex_add_elementor_widget_categories']);
	}

	/**
	 * Add Elementor Widget Categories
	 *
	 * Add custom categories to Elementor widgets.
	 *
	 * Fired by `elementor/elements/categories_registered` action hook.
	 *
	 * @param \Elementor\Elements_Manager $elements_manager Elementor elements manager.
	 */
	function solarex_add_elementor_widget_categories($elements_manager)
	{
		$elements_manager->add_category(
			'solarex-elements',
			[
				'title' => esc_html__('Solarex Elements', 'solarex-core'),
				'icon' => 'fa fa-plug',
			]
		);
	}

	/**
	 * Register Widgets
	 *
	 * Load widgets files and register new Elementor widgets.
	 *
	 * Fired by `elementor/widgets/register` action hook.
	 *
	 * @param \Elementor\Widgets_Manager $widgets_manager Elementor widgets manager.
	 */
	public function register_widgets($widgets_manager)
	{

		$widgets_manager->register(new SolarImpactSection());
		$widgets_manager->register(new SolarexBlogWidget());
		$widgets_manager->register(new SolarexTestimonialCarousel());
		$widgets_manager->register(new SolarexServicesWidget());
		$widgets_manager->register(new SolarexChooseUs());
		$widgets_manager->register(new SolarexGalleryGrid());
		$widgets_manager->register(new SolarexTeamMember());
		$widgets_manager->register(new SmallCard());
		$widgets_manager->register(new SolarexContactInfo());
		$widgets_manager->register(new SolarexBreadcrumb());

		

	}
}