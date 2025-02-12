<?php 

namespace Solarex\Core\Widgets;

use Carbon_Fields\Widget;
use Carbon_Fields\Field;

class CustomerSupportWidget extends Widget {

    function __construct() {
        $this->setup( 'customer_support_widget', 'Customer Support', 'A widget to display customer support links', array(
            Field::make( 'text', 'customer_support_widget_title', 'Title' )
                ->set_default_value( 'Customer Support' ),
            Field::make( 'complex', 'customer_support_widget_links', 'Links' )
                ->set_layout( 'tabbed-horizontal' )
                ->add_fields( array(
                    Field::make( 'text', 'customer_support_widget_link_title', 'Title' ),
                    Field::make( 'text', 'customer_support_widget_link_url', 'URL' ),
                ) )
                ->set_default_value( array(
                    array( 'customer_support_widget_link_title' => 'Contact Us', 'customer_support_widget_link_url' => '#' ),
                    array( 'customer_support_widget_link_title' => 'Support Center', 'customer_support_widget_link_url' => '#' ),
                    array( 'customer_support_widget_link_title' => 'Policies', 'customer_support_widget_link_url' => '#' ),
                ) ),
        ) );
    }

    function front_end( $args, $instance ) {
        echo $args['before_widget'];

        // Title
        $title = !empty($instance['customer_support_widget_title']) ? $instance['customer_support_widget_title'] : __('Customer Support', 'Solerex');
        if (!empty($title)) {
            echo $args['before_title'] . esc_html($title) . $args['after_title'];
        }

        // Links
        echo '<ul class="list-unstyled">';
        foreach($instance['customer_support_widget_links'] as $link) {
            echo '<li class="mb-2"><a href="' . esc_url($link['customer_support_widget_link_url']) . '">' . esc_html($link['customer_support_widget_link_title']) . '</a></li>';
        }
        echo '</ul>';

        echo $args['after_widget'];
    }
}
