<?php 

namespace Solarex\Core\Widgets;

use Carbon_Fields\Widget;
use Carbon_Fields\Field;

class ResourcesWidget extends Widget {

    function __construct() {
        $this->setup( 'resources_widget', 'Resources', 'A widget to display resources links', array(
            Field::make( 'text', 'resources_widget_title', 'Title' )
                ->set_default_value( 'Resources' ),
            Field::make( 'complex', 'resources_widget_links', 'Links' )
                ->set_layout( 'tabbed-horizontal' )
                ->add_fields( array(
                    Field::make( 'text', 'resources_widget_link_title', 'Title' ),
                    Field::make( 'text', 'resources_widget_link_url', 'URL' ),
                ) )
                ->set_default_value( array(
                    array( 'resources_widget_link_title' => 'Blog', 'resources_widget_link_url' => '#' ),
                    array( 'resources_widget_link_title' => 'Case Studies', 'resources_widget_link_url' => '#' ),
                    array( 'resources_widget_link_title' => 'FAQs', 'resources_widget_link_url' => '#' ),
                ) ),
        ) );
    }

    function front_end( $args, $instance ) {
        echo $args['before_widget'];

        // Title
        $title = !empty($instance['resources_widget_title']) ? $instance['resources_widget_title'] : __('Resources', 'Solerex');
        if (!empty($title)) {
            echo $args['before_title'] . esc_html($title) . $args['after_title'];
        }

        // Links
        echo '<ul class="list-unstyled">';
        foreach($instance['resources_widget_links'] as $link) {
            echo '<li class="mb-2"><a href="' . esc_url($link['resources_widget_link_url']) . '">' . esc_html($link['resources_widget_link_title']) . '</a></li>';
        }
        echo '</ul>';

        echo $args['after_widget'];
    }
}
