<?php 

namespace Solarex\Core\Widgets;

use Carbon_Fields\Widget;
use Carbon_Fields\Field;

class FooterInfoWidget extends Widget {

    function __construct() {
        $this->setup( 'footer_info_widget', 'Footer Info', 'A widget to display company information links', array(
            Field::make( 'text', 'footer_info_widget_title', 'Title' )
                ->set_default_value( 'Company Info' ),
            Field::make( 'complex', 'footer_info_widget_links', 'Links' )
                ->set_layout( 'tabbed-horizontal' )
                ->add_fields( array(
                    Field::make( 'text', 'footer_info_widget_link_title', 'Title' ),
                    Field::make( 'text', 'footer_info_widget_link_url', 'URL' ),
                ) )
                ->set_default_value( array(
                    array( 'footer_info_widget_link_title' => 'About Us', 'footer_info_widget_link_url' => '#' ),
                    array( 'footer_info_widget_link_title' => 'Careers', 'footer_info_widget_link_url' => '#' ),
                    array( 'footer_info_widget_link_title' => 'Press', 'footer_info_widget_link_url' => '#' ),
                ) ),
        ) );
    }
    
    function front_end( $args, $instance ) {
        // echo $args['before_widget'];

        // Title
        $title = !empty($instance['footer_info_widget_title']) ? $instance['footer_info_widget_title'] : __('Company Info', 'Solerex');
        if (!empty($title)) {
            echo $args['before_title'] . esc_html($title) . $args['after_title'];
        }

        // Links
        echo '<ul class="list-unstyled">';
        foreach($instance['footer_info_widget_links'] as $link) {
            echo '<li class="mb-2"><a href="' . esc_url($link['footer_info_widget_link_url']) . '">' . esc_html($link['footer_info_widget_link_title']) . '</a></li>';
        }
        echo '</ul>';

        // echo $args['after_widget'];
    }
}
