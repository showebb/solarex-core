<?php 

namespace Solarex\Core\Widgets;

use Carbon_Fields\Widget;
use Carbon_Fields\Field;

class FollowUsWidget extends Widget {

    function __construct() {
        // Setup widget name, description, and fields
        $this->setup( 
            'follow_us_widget', 
            __('Follow Us', 'Solerex'), 
            __('A widget to display social media links', 'Solerex'), 
            array(
                Field::make( 'text', 'follow_us_widget_title', __('Title', 'Solerex') )
                    ->set_default_value( __('Follow Us', 'Solerex') ),
                Field::make( 'text', 'follow_us_widget_facebook', __('Facebook URL', 'Solerex') ),
                Field::make( 'text', 'follow_us_widget_twitter', __('Twitter URL', 'Solerex') ),
                Field::make( 'text', 'follow_us_widget_linkedin', __('LinkedIn URL', 'Solerex') ),
                Field::make( 'text', 'follow_us_widget_youtube', __('YouTube URL', 'Solerex') ),
                Field::make( 'text', 'follow_us_widget_instagram', __('Instagram URL', 'Solerex') ),
            )
        );
    }

    function front_end( $args, $instance ) {
        echo $args['before_widget'];

        // Title
        $title = !empty($instance['follow_us_widget_title']) ? $instance['follow_us_widget_title'] : __('Follow Us', 'Solerex');
        if (!empty($title)) {
            echo $args['before_title'] . esc_html($title) . $args['after_title'];
        }

        // Social Media Links
        echo '<div class="social-links">';
        if (!empty($instance['follow_us_widget_facebook'])) {
            echo '<a href="' . esc_url($instance['follow_us_widget_facebook']) . '" class="me-3" target="_blank"><i class="fab fa-facebook-f"></i></a>';
        }
        if (!empty($instance['follow_us_widget_twitter'])) {
            echo '<a href="' . esc_url($instance['follow_us_widget_twitter']) . '" class="me-3" target="_blank"><i class="fab fa-twitter"></i></a>';
        }
        if (!empty($instance['follow_us_widget_linkedin'])) {
            echo '<a href="' . esc_url($instance['follow_us_widget_linkedin']) . '" class="me-3" target="_blank"><i class="fab fa-linkedin-in"></i></a>';
        }
        if (!empty($instance['follow_us_widget_youtube'])) {
            echo '<a href="' . esc_url($instance['follow_us_widget_youtube']) . '" class="me-3" target="_blank"><i class="fab fa-youtube"></i></a>';
        }
        if (!empty($instance['follow_us_widget_instagram'])) {
            echo '<a href="' . esc_url($instance['follow_us_widget_instagram']) . '" class="me-3" target="_blank"><i class="fab fa-instagram"></i></a>';
        }
        echo '</div>';

        echo $args['after_widget'];
    }
}