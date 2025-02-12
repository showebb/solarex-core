<?php
namespace Solarex\Core\Widgets;

use Carbon_Fields\Widget;
use Carbon_Fields\Field;

class SolarexPrefooterMain extends Widget
{
    function __construct()
    {
        $this->setup('SolarexPrefooterMain', 'Solarex Prefooter Main', 'A widget to display a customizable pre-footer section', array(
            Field::make('text', 'solarex_main_prefooter_title', 'Title')
                ->set_default_value('Take Control of Your Energy Costs Today'),
            Field::make('text', 'solarex_main_prefooter_button_text', 'Button Text')
                ->set_default_value('Book a Free Consultation'),
            Field::make('text', 'solarex_main_prefooter_button_url', 'Button URL')
                ->set_default_value('#'),
            Field::make('image', 'solarex_main_prefooter_background_image', 'Background Image'),
        ));
    }

    function front_end($args, $instance)
    {
        $title = !empty($instance['solarex_main_prefooter_title']) ? $instance['solarex_main_prefooter_title'] : 'Take Control of Your Energy Costs Today';
        $button_text = !empty($instance['solarex_main_prefooter_button_text']) ? $instance['solarex_main_prefooter_button_text'] : 'Book a Free Consultation';
        $button_url = !empty($instance['solarex_main_prefooter_button_url']) ? $instance['solarex_main_prefooter_button_url'] : '#';
        $background_image_id = !empty($instance['solarex_main_prefooter_background_image']) ? $instance['solarex_main_prefooter_background_image'] : '';
        $background_image_url = $background_image_id ? wp_get_attachment_image_url($background_image_id, 'full') : 'https://placehold.co/1920x560';

        echo '<div class="global-cta py-5" style="background-image: linear-gradient(180deg, rgba(0, 0, 0, 0), rgb(0, 0, 0)), url(' . esc_url($background_image_url) . '); background-size: cover;">';
        echo '    <div class="container">';
        echo '        <div class="row">';
        echo '            <div class="col">';
        echo '                <h1 class="text-white pb-5">' . esc_html($title) . '</h1>';
        echo '                <div><a href="' . esc_url($button_url) . '" class="primary-button">' . esc_html($button_text) . '</a></div>';
        echo '            </div>';
        echo '        </div>';
        echo '    </div>';
        echo '</div>';
    }
}
