<?php

namespace Solarex\Core;

class SolarexPostTypes
{

    public function __construct()
    {
        $this->registerSolarexPostTypes();
    }

    public function registerSolarexPostTypes()
    {
        register_post_type('solarex_services', array(
            'labels' => array(
                'name' => __('Services', 'solarex-core'),
                'single_name' => __('Service', 'solarex-core'),
                'add_new' => __('Add New Service', 'solarex-core'),
                'add_new_item' => __('Add New Service', 'solarex-core'),
                'new_item' => __('New Service', 'solarex-core'),

            ),
            'has_archive' => true,
            'rewrite' => ['slug' => 'services'],
            'supports' => array('title', 'editor', 'thumbnail'),
            'public' => true,
        ));

        register_post_type('solarex_team', array(
            'labels' => array(
                'name' => __('Team', 'solarex-core'),
                'single_name' => __('Team', 'solarex-core'),
                'add_new' => __('Add New Team', 'solarex-core'),
                'add_new_item' => __('Add New Team', 'solarex-core'),
                'new_item' => __('New Team', 'solarex-core'),
            ),
            'supports' => array('title','editor', 'thumbnail'),
            'public' => true,
        ));
        register_post_type('solarex_testimonial', array(
            'labels' => array(
                'name' => __('Testimonial', 'solarex-core'),
                'single_name' => __('Testimonial', 'solarex-core'),
                'add_new' => __('Add New Testimonial', 'solarex-core'),
                'add_new_item' => __('Add New Testimonial', 'solarex-core'),
                'new_item' => __('New Testimonial', 'solarex-core'),
            ),
            'supports' => array('title', 'editor'),
            'public' => true,
            'menu_icon' => 'dashicons-admin-comments',
        ));
        register_post_type('solarex_template', array(
            'labels' => array(
                'name' => __('Solarex Templates', 'solarex-core'),
                'single_name' => __('Template', 'solarex-core'),
                'add_new' => __('Add New Template', 'solarex-core'),
                'add_new_item' => __('Add New Template', 'solarex-core'),
                'new_item' => __('New Template', 'solarex-core'),
            ),
            'supports' => array('title', 'editor', 'thumbnail'), // 'editor' for Elementor
            'public' => true,
            'show_in_rest' => true, // Required for Elementor
            'rewrite' => ['slug' => 'templates'],
            'menu_icon' => 'dashicons-open-folder',
        ));
        
    }
}
