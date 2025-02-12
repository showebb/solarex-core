<?php
namespace Solarex\Core\Widgets;

use Carbon_Fields\Widget;
use Carbon_Fields\Field;

class SolarexPrefooterHome extends Widget
{
    function __construct()
    {
        $this->setup('SolarexPrefooterHome', 'Solarex Prefooter Home', 'A widget to display a customizable pre-footer for the home page', array(
            Field::make('text', 'solarex_prefooter_title', 'Main Title')
                ->set_default_value('Special Features <br>& Exclusive Offers'),
            Field::make('textarea', 'solarex_prefooter_description', 'Main Description')
                ->set_default_value('Explore our exclusive offers and see how we support your solar journey at every stage. Enjoy flexible financing, long-term warranties, and a rewarding referral program.'),
            Field::make('text', 'solarex_prefooter_button_text', 'Button Text')
                ->set_default_value('Book a Free Consultation'),
            Field::make('text', 'solarex_prefooter_button_url', 'Button URL')
                ->set_default_value('#'),
            Field::make('image', 'solarex_prefooter_background_image', 'Background Image'),

            Field::make('complex', 'feature_boxes', 'Feature Boxes')
                ->add_fields(array(
                    Field::make('text', 'feature_title', 'Feature Title')
                        ->set_default_value('Default Feature Title'),
                    Field::make('textarea', 'feature_description', 'Feature Description')
                        ->set_default_value('Default description for this feature.'),
                    Field::make('image', 'feature_image', 'Feature Image'),
                ))
                ->set_min(3)
                ->set_max(3),
        ));
    }

    function front_end($args, $instance)
    {
        $title = !empty($instance['solarex_prefooter_title']) ? $instance['solarex_prefooter_title'] : 'Special Features <br>& Exclusive Offers';
        $description = !empty($instance['solarex_prefooter_description']) ? $instance['solarex_prefooter_description'] : 'Explore our exclusive offers and see how we support your solar journey at every stage.';
        $button_text = !empty($instance['solarex_prefooter_button_text']) ? $instance['solarex_prefooter_button_text'] : 'Book a Free Consultation';
        $button_url = !empty($instance['solarex_prefooter_button_url']) ? $instance['solarex_prefooter_button_url'] : '#';
        $background_image_id = !empty($instance['solarex_prefooter_background_image']) ? $instance['solarex_prefooter_background_image'] : '';
        $background_image_url = $background_image_id ? wp_get_attachment_image_url($background_image_id, 'full') : 'https://placehold.co/1920x560';

        $feature_boxes = !empty($instance['feature_boxes']) ? $instance['feature_boxes'] : array();

        echo '<div class="global-cta py-5" style="background-image: linear-gradient(180deg, rgba(0, 0, 0, 0), rgb(0, 0, 0)), url(' . esc_url($background_image_url) . '); background-size: cover;">';
        echo '    <div class="container">';
        echo '        <div class="row">';
        echo '            <div class="col-md-8">';
        echo '                <h2 class="text-white pb-5">' . wp_kses_post($title) . '</h2>';
        echo '            </div>';
        echo '            <div class="col-md-4">';
        echo '                <p class="text-white mb-md-5">' . esc_html($description) . '</p>';
        echo '                <div><a href="' . esc_url($button_url) . '" class="primary-button">' . esc_html($button_text) . '</a></div>';
        echo '            </div>';
        echo '        </div>';

        echo '        <div class="row g-4 mt-5">';
        foreach ($feature_boxes as $feature_box) {
            $feature_title = !empty($feature_box['feature_title']) ? $feature_box['feature_title'] : 'Default Feature Title';
            $feature_description = !empty($feature_box['feature_description']) ? $feature_box['feature_description'] : 'Default Feature Description';
            $feature_image_id = !empty($feature_box['feature_image']) ? $feature_box['feature_image'] : '';
            $feature_image_url = $feature_image_id ? wp_get_attachment_image_url($feature_image_id, 'thumbnail') : 'https://placehold.co/120x140';

            echo '<div class="col-md-4">';
            echo '    <div class="d-flex bg-white p-4">';
            echo '        <div>';
            echo '            <h5>' . esc_html($feature_title) . '</h5>';
            echo '            <p>' . esc_html($feature_description) . '</p>';
            echo '        </div>';
            echo '        <img src="' . esc_url($feature_image_url) . '" class="img-fluid" alt="Feature Image" style="width: 120px; height: 140px;">';
            echo '    </div>';
            echo '</div>';
        }
        echo '        </div>';
        echo '    </div>';
        echo '</div>';
    }
}
