<?php

// use Carbon_Fields\Toolset\WP_Toolset;

/**
 * Plugin Name: Solarex Core
 * Plugin URI: https://Solarex.com
 * Description: This is a core plugin for Solarex theme.
 * Version: 1.0
 * Author: Solarex
 * Author URI: https://Solarex.com
 * License: GPL2
 * Text Domain: solarex-core
 * Domain Path: /languages
 */

// require_once('vendor/autoload.php');
// 
if (file_exists(__DIR__ . '/vendor/autoload.php')) {
    require_once(__DIR__ . '/vendor/autoload.php');
} else {
    add_action('admin_notices', function () {
        echo '<div class="notice notice-error"><p>' . esc_html__('Solarex Core plugin requires Composer dependencies. Please run <code>composer install</code> in the plugin directory.', 'eic-core') . '</p></div>';
    });
    return;
}

use Solarex\Core\ElementorInit;
use Solarex\Core\SolarexCarbonFields;

final class Solarex_Core
{
    private static $instance;

    public static function instance()
    {
        if (!isset(self::$instance) && !(self::$instance instanceof Solarex_Core)) {
            self::$instance = new Solarex_Core;
        }

        return self::$instance;
    }

    public function __construct()
    {
        $this->define_constants();
        add_action('plugins_loaded', [$this, 'solarex_loaded']);
        add_action('init', [$this, 'solarex_init']);
        add_action('widgets_init', [$this, 'solarex_load_widgets']);
        add_action('after_setup_theme', [$this, 'solarex_crb_load']);
    }

    function solarex_crb_load()
    {
        // \Carbon_Fields\Carbon_Fields::boot();
        if (class_exists('\Carbon_Fields\Carbon_Fields')) {
            \Carbon_Fields\Carbon_Fields::boot();
            new SolarexCarbonFields();
        } else {
            add_action('admin_notices', function () {
                echo '<div class="notice notice-error"><p>' . esc_html__('Carbon Fields is not loaded. Please install it via Composer.', 'eic-core') . '</p></div>';
            });
        }
    }

    public function solarex_init()
    {
        new \Solarex\Core\SolarexPostTypes();
    }

    public function solarex_load_widgets()
    {
        new \Solarex\Core\SolarexCoreWidgets();
    }

   
    private function define_constants()
    {
        define('SOLAREX_CORE_VERSION', '1.0');
        define('SOLAREX_CORE_FILE', __FILE__);
        define('SOLAREX_CORE_PATH', dirname(SOLAREX_CORE_FILE));
        define('SOLAREX_CORE_URL', plugins_url('', SOLAREX_CORE_PATH));
        define('SOLAREX_CORE_ASSETS', SOLAREX_CORE_URL . '/assets');
    }

    public function solarex_loaded()
    {
        do_action('solarex_core_loaded');

        ElementorInit::instance();

        if (!class_exists('ReduxFramework') && file_exists(SOLAREX_CORE_PATH . '/lib/redux-framework/redux-core/framework.php')) {
            require_once(SOLAREX_CORE_PATH . '/lib/redux-framework/redux-core/framework.php');
            require_once(SOLAREX_CORE_PATH . '/lib/redux-framework/Solarex-options.php');
        }

        if (!file_exists(SOLAREX_CORE_PATH . '/lib/cmb/init.php)')) {
            require_once(SOLAREX_CORE_PATH . '/lib/cmb/init.php');
            require_once(SOLAREX_CORE_PATH . '/lib/cmb/solarex_cmb.php');
        }
    }

    public function __clone()
    {
        _doing_it_wrong(__FUNCTION__, esc_html__('Cheating huh?', 'solarex-core'), SOLAREX_CORE_PATH);
    }

    public function __wakeup()
    {
        _doing_it_wrong(__FUNCTION__, esc_html__('Cheating huh?', 'solarex-core'), SOLAREX_CORE_PATH);
    }
}

function solarex_core()
{
    return Solarex_Core::instance();
}

solarex_core();
