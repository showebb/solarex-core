<?php
namespace Solarex\Core\Widgets;

use Carbon_Fields\Widget;
use Carbon_Fields\Field;

class SolarexLetsTalk extends Widget
{
    function __construct()
    {
        $this->setup('solarex_lets_talk', 'Solarex Let\'s Talk', 'A widget to display contact details for professionals', array(
            Field::make('text', 'solarex_title', 'Title')
                ->set_default_value('Let\'s Talk To Professional'),
            Field::make('text', 'solarex_phone', 'Phone Number')
                ->set_default_value('(123) 456-7890'),
        ));
    }

    function front_end($args, $instance)
    {
        // echo $args['before_widget'];

        // Title
        $title = !empty($instance['solarex_title']) ? $instance['solarex_title'] : __('Let\'s Talk To Professional', 'Solarex');
        // if (!empty($title)) {
        //     echo $args['before_title'] . esc_html($title) . $args['after_title'];
        // }

        // Phone number
        $phone = !empty($instance['solarex_phone']) ? $instance['solarex_phone'] : __('(123) 456-7890', 'Solarex');

        // Output the HTML structure
        echo '<div class="mt-5 primary-bg p-4">';
        echo '<h6 class="mb-3 text-white">' . esc_html($title) . '</h6>';
        echo '<a href="tel:' . esc_attr($phone) . '" class="text-decoration-none text-white fs-4">';
        echo '<i class="fas fa-phone me-2"></i>' . esc_html($phone) . '</a>';
        echo '</div>';

        // echo $args['after_widget'];
    }
}
