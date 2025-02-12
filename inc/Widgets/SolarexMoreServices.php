<?php
namespace Solarex\Core\Widgets;

use Carbon_Fields\Widget;
use Carbon_Fields\Field;

class SolarexMoreServices extends Widget
{
    function __construct()
    {
        // Set up the widget with name and description
        $this->setup('solarex_more_services_widget', 'Solarex More Services', 'A widget to display more services', array(
            Field::make('text', 'solarex_more_services_widget_title', 'Title')
                ->set_default_value('More Services'), // Default title
        ));
    }

    function front_end($args, $instance)
    {
        // echo $args['before_widget'];
        echo '<div class="more-services">';
        // Title
        $title = !empty($instance['solarex_more_services_widget_title']) ? $instance['solarex_more_services_widget_title'] : __('More Services', 'Solerex');
        if (!empty($title)) {
            echo $args['before_title'] . esc_html($title) . $args['after_title'];
        }

        // Query to fetch all services from the 'solarex_services' custom post type
        $query = new \WP_Query(array(
            'post_type' => 'solarex_services',
            'posts_per_page' => -1, // Get all services
            'post_status' => 'publish',
        ));

        if ($query->have_posts()) {

            while ($query->have_posts()) {
                $query->the_post();
                $service_name = get_the_title();
                $service_url = get_permalink();

                // Render the service links
                echo '<a href="' . esc_url($service_url) . '" class="btn d-flex justify-content-between w-100 mb-3 bg-white p-3">';
                echo esc_html($service_name) . ' <i class="fas fa-arrow-right"></i>';
                echo '</a>';
            }

            wp_reset_postdata();
        } else {
            echo '<p>No services found.</p>';
        }
        echo '</div>';
        // echo $args['after_widget'];
    }
}
